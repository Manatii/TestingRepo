<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAds;
use Auth;
use App\Images;
use App\Locations;
use App\Provinces;
use App\Surbub;
use View;
use DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Validator;
use Mail;


class postAdsConroller extends Controller
{

	

    public function subCategories(){
       $subCategories = DB::table('subcategory')
            ->get();
        return $subCategories;
    }
    
     public function newAd(Request $request){
     	 $categories = DB::table('categories')->get();       
       
         $subCategories = DB::table('subcategory')
            ->get();

      
        
		return View('postfreead', ['categories'=>$categories , 'subCategories'=>$subCategories]);

    }
    public function autoComplete(Request $request){

    	$data = Locations::select("location as name")->where("location","LIKE","%{$request->input('keyword')}%")->limit(7)->get();


    	$provinces = Provinces::select("province as name")->where("province","LIKE","%{$request->input('keyword')}%")->limit(7)->get();   	
    	$suburbs = Surbub::select("location as name")->where("location","LIKE","%{$request->input('keyword')}%")->limit(7)->get();	
    		$data = json_encode($data);


    		

    		$data = json_decode($data);
    		foreach ($provinces as $province) {
    			$data[] = ['name' => $province->name];
    		}

    		foreach ($suburbs as $suburb) {
    			$data[] = ['name' => $suburb->name];
    		}
    		
    		$data  = json_encode($data);
    		

    		$data = json_decode($data);  	
    	
    		
    		if(!empty($data)) {

		
    			$i=0;
			foreach($data as $country){
				$i++;
				$province = "'".$country->name."'";
				echo'<div style ="width:100%;" class = "autocomplete-suggestion col-lg-12" data-index="'.$i.'" onClick="selectCountry('.$province.');">';
				echo "<span style = 'margin-left:30px;'>".$country->name."</span></div>";
			}

			
    		
    	}
    }


    public function autoCompleteTownship(Request $request){

    	$data = Locations::select("township as name")->where("township","LIKE","%{$request->input('query')}%")->where('province', $request->input('province'))->get();
		return response()->json($data);       
    	
    }


    public function generatePIN($digits = 4){
	    $i = 0; //counter
	    $pin = ""; //our default pin is blank.
	    while($i < $digits){
	        //generate a random number between 0 and 9.
	        $pin .= mt_rand(0, 9);
	        $i++;
	    }
	    return $pin;
	}

    public function postAd(Request $request){ 


    	//Backend validation just in case someone tinker with my front-end validation code.
    	$this->validate($request, [
			'image1' => 'image',
			'image2' => 'image',
			'image3' => 'image',
			'image4' => 'image',
			'image5' => 'image',
			'image6' => 'image',
			'township' => 'required|max:35',
			'Adtitle' => 'required|max:45',
			'textarea' => 'required',			
		]);

      

    	if($request->has('phonenumber') ){  
    		$this->validate($request, [
				'phonenumber' => 'required|max:10', 
			]);

        	$this->updatePhonenumber($request->phonenumber);        	
        }

        if($request->has('email') ){    		
        	$this->updateEmail($request->email);
    	}

    	$province = Input::get('province');
    	$location =	Input::get('township');
    	$catagory = Input::get('category-group');
    	$promotionPlan = null;
   
    

    	$catagory = explode('#', $catagory);

    	$main_catagory = $catagory[0];



    	$subcategory = $catagory[1];


    	$title = Input::get('Adtitle');
    	$description = Input::get('textarea');
    	$price = $request->Input('Price');
		$keywords = $this->generateKeyWords($catagory,$title);
		$user_id  = Auth::user()->id;
		$email = Auth::user()->email;




		$promotionPlan = "None";
		$approved = "Approved";
		$negotiable = "";

		$pin = $this->generatePIN();
		

		if (Input::get('optionsRadios',false)){
			$promotionPlan = Input::get('optionsRadios');
			$approved = "Pending";
		}

		if (Input::get('negotiable',false)){
			$negotiable = Input::get('negotiable');
			//dd($negotiable);
		}		
		
		//generating a prefix for the ad Id   
		$pref = substr($title,0,3);
		$adId = uniqid("$pref");

		$userAd = new UserAds();

		$township = DB::table('locations')->where('location',$location)
				->get();

		if(count($township)>0){

			$userAd->location_category = "township";
		
		}else{
			
			$userAd->location_category = "suburb";
		}

		$userAd->adid = $adId;
		$userAd->title = $title;
		$userAd->description = $description;
		$userAd->catagory = $subcategory;
		$userAd->price = $price;
		$userAd->negotiable = $negotiable;
		$userAd->keywords = $keywords;			
		$userAd->province = $province;
		$userAd->featured = $promotionPlan;
		$userAd->location = $location;
		$userAd->approved = $approved;
		$userAd->user_id = $user_id;
		$userAd->main_catagory = $main_catagory;
	    
	    $userAd->save();
        //checks if the user defined township exits in the database, save it if it doesn't exits.
		

		
		$this->MoveUploadedFiles($request,$adId);
		$name = Auth::user()->name;
		$phonenumber = Auth::user()->phonenumber;

		$subject = "New ad posted on kasocular";
		
		
		//$this->sendEmailToAdmin($subject, $email, $name, $title,$subcategory, $phonenumber,$description, $pin,$promotionPlan);


		if (Input::get('optionsRadios',false)){
			$promotionPlan = Input::get('optionsRadios');
			return view('posting-successful',['pin'=>$pin]);
		}else{
    		return redirect('posting-successful');    		
		}       
    	
    }

    public function updatePhonenumber($phonenumber){

    	DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['phonenumber' => $phonenumber]);

    }

    public function updateEmail($email){

    	DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['email' => $email]);

    }

    public function MoveUploadedFiles($request,$adid){

    	$image = "image";
    	for($i=1; $i<=6; $i++){ 
			
			if ($request->hasFile($image.$i)) {

				$imageTmpName = $request->file($image.$i);
	    		
	    		$fileName = $imageTmpName->getClientOriginalName();

	    		$dir = "images/user_images/".$fileName;
				// $directory = "images/user_images";
				
				//rename the file if it already exists in the specified directory
				if (file_exists($dir)){
					$fileName = $i.$fileName;
					//$request->file('image'.$i)->move($directory, $fileName);
					//echo "The file exists";
				}
				$this->resizeImage($request, $fileName, $imageTmpName,$image.$i);
				
				$img = new Images();
				$img->name1 = $fileName;
				$img->adid = $adid;
				$img->save();
			}
    	}
	}

    public function sendEmailToAdmin($subject, $userEmail, $userName, $AdTitle, $AdCategory, $phonenumber, $description,$pin,$promotionPlan){
			Mail::send('sendMailToAdmin', ['userName'=>$userName, 'email'=>$userEmail, 'phonenumber'=>$phonenumber, 'title'=> $AdTitle, 'category'=>$AdCategory, 'msg'=>$description,'promotionPlan'=>$promotionPlan, 'pin'=>$pin], function ($m){

            $m->from('innothetechgeek@gmail.com','kasocularuser');
            $to = 'kasocular@gmail.com';         	
           
			$email = Auth::user()->email;
			$userName = Auth::user()->name;
			$subject = "";
			$promotionPlan  = "";

			if (Input::get('optionsRadios',false)){
				$promotionPlan = Input::get('optionsRadios');

			}	
	    	if($promotionPlan == null){
	    	 	 $subject = "New ad posted on kasocular";
	    	}else{
	    		 $subject = "New Promoted ad posted on kasocular";
	    	}

            $m->to($to, 'kasocularAdmin')->subject($subject);
            $m->replyTo($email, $userName);
        });

    }

    public function resizeImage($request,$image,$tempname,$inputName){
    	$extension = $request->file($inputName)->getClientOriginalExtension();

    	$src = "";
    	
    	$extension = strtolower($extension);
		if($extension=="jpg" || $extension=="jpeg" )
		{
		$uploadedfile = $tempname;
		$src = imagecreatefromjpeg($uploadedfile);
		}
		else if($extension=="png")
		{
		$uploadedfile = $tempname;
		$src = imagecreatefrompng($uploadedfile);
		}
		else 
		{
		$src = imagecreatefromgif($uploadedfile);
		}

		/// Target dimensions
		$max_width = 800;
		$max_height = 600;

		// Get current dimensions
		$old_width  = imagesx($src);
		$old_height = imagesy($src);

		// Calculate the scaling we need to do to fit the image inside our frame
		$scale      = min($max_width/$old_width, $max_height/$old_height);

		// Get the new dimensions
		$new_width  = ceil($scale*$old_width);
		$new_height = ceil($scale*$old_height);

		// Create new empty image
		$new = imagecreatetruecolor($new_width, $new_height);

		// Resize old image into new
		imagecopyresampled($new, $src, 
		    0, 0, 0, 0, 
		    $new_width, $new_height, $old_width, $old_height);
					$filename = "images/user_images/".$image;



		//$filename = "user_data/".$image;
		//$filename1 = "resized/small".$image;

		imagejpeg($new,$filename,100);
		imagejpeg($new,$filename,100);

		imagedestroy($src);
		imagedestroy($new);
					
}

    


    public function generateKeyWords($catagory, $title){
    	
    	$keywords = "";

    	
    	$main_catagory = $catagory[0];
    	$catagory = $catagory[1];

   
	   	if( $catagory == "Houses & Flats For Sale" ){
		    $keywords = "indlu izindlu  $title $main_catagory $catagory";
	   	}
	   	else if($catagory == "Houses & Flats For Rent" ){
		    $keywords = "$title $main_catagory $catagory";
	   	}
	   	else if($catagory == "Shacks for sale" ){
			$keywords = "ityotyombe for sale bhangalo $title $main_catagory $catagory";
	   	}
	   	else if($catagory == "Shacks to rent" ){
			$keywords = "ityotyombe for sale bhangalo $title $main_catagory $catagory";
		}
		else if($catagory == "smartphones" ){
			$keywords = "$main_catagory phones cellphone phone mobilephones mobilephone smartphone smartphones $title $catagory";
		}
		else if($catagory == "Cars" ){
			$keywords = "$main_catagory car cars vehicle  $title $catagory";
		}
		else if($catagory == "Lost and found" ){
			$keywords = "Lost found   $title $main_catagory $catagory";
		}
		else if($catagory == "Jobs" ){
			$keywords = "$title $main_catagory $catagory";
		}
		else if($catagory == "Clothing" ){
			$keywords = "clothes   $title $main_catagory $catagory";
		}
		else if($catagory == "Job seekers" ){
			$keywords = "Jobs   $title $main_catagory $catagory";
		}
		else if($catagory == "Clothing" ){
			$keywords = "clothes $title $main_catagory $catagory";
		}
		else
			$keywords = " $catagory  $title $main_catagory";

		return $keywords;
    }
}
