<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserAds;
use App\Images;
use App\FavouriteAds;
use DB;
use App\Locations;
use Illuminate\Support\Facades\Input;



class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth:api');
    }

    public function displayAccount(){
    	
    	$id = Auth::user()->id;
    	$userAds = UserAds::where('user_id',$id)
        ->where('approved',"Approved")->get();
        $fav_Ads = FavouriteAds::where('user_id', $id)->get();

        $unApprovedAds = UserAds::where('user_id',$id)
                        ->where('approved',"Pending")->get();
  
        return view('account/account',['fav_Ads'=>$fav_Ads,'userAds'=>$userAds,'unApprovedAds'=>$unApprovedAds]);
    }

    public function displayUserAds(){
        
        $id = Auth::user()->id;
        $userAds = UserAds::where('user_id',$id)
        ->where('approved',"Approved")->get();
        $fav_Ads = FavouriteAds::where('user_id', $id)->get();

        $unApprovedAds = UserAds::where('user_id',$id)
                        ->where('approved',"Pending")->get();
       
        return view('account/account-myads',['fav_Ads'=>$fav_Ads,'userAds'=>$userAds,'unApprovedAds'=>$unApprovedAds]);
    }

    public function deleteAd($adid){
       $userId = Auth::user()->id;
       $ad = UserAds::where('user_id',$userId)
                    ->where('adid',$adid);
       $FavAd = FavouriteAds::where('user_id',$userId)
                    ->where('ad_id',$adid);           
       if($ad->delete()){
             $FavAd->delete();
             $images = Images::where('adid',$adid)->get();
            foreach($images as $image){
                @unlink("images/user_images/".$image['name1']);
            }

            $deletedImages = Images::where('adid',$adid)->delete();
            if($deletedImages){
                return "deleted!!";
            }
       }
    }

    public function deleteUnApprovedAd($adid){
        $userId = Auth::user()->id;
        $ad = UserAds::where('user_id',$userId)
                    ->where('adid',$adid);
       if($ad->delete()){
             $images = Images::where('adid',$adid)->get();
            foreach($images as $image){
                @unlink("images/user_images/".$image['name1']);
            }

            $deletedImages = Images::where('adid',$adid)->delete();
            if($deletedImages){
                return "deleted!!";
            }
       }
    }

    public function updateUserDetails($username,$email,$phonenumber){          

        DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['name'=>$username
                ,'email'=>$email
                ,'phonenumber'=>$phonenumber
                ]);
    }

    public function deleteFavAd($adId){
        $userId = Auth::user()->id;
        $ad = FavouriteAds::where('user_id',$userId)
                    ->where('ad_id',$adId);
       
       if($ad->delete()){
           return 'Ad deleted!';
       }
       else{
         return "An error occured!";
       }
    }

    public function displayFavouriteAds(){
        $id = Auth::user()->id;
        $fav_Ads = FavouriteAds::where('user_id', $id)->get();
        $userAds = UserAds::where('user_id',$id)
        ->where('approved',"Approved")->get();
       $unApprovedAds = UserAds::where('user_id',$id)
                        ->where('approved',"Pending")->get();
       
        return view('account/account-favourite-ads',['fav_Ads'=>$fav_Ads,'userAds'=>$userAds,'unApprovedAds'=>$unApprovedAds]);
    }

    public function saveAd($id){

        if(Auth::guest()){
            return "You need to log in to save an ads";
        }
        else{

            $adToSave = UserAds::where('adid', $id)->get();

            $title = $location = $price = $adid = $date = "";

            foreach($adToSave as $ad){

                $title = $ad->title;
                $location = $ad->location;
                $price = $ad->price;
                $date = $ad->created_at;
                $adid = $ad->adid;

            }

            $favouriteAd = FavouriteAds::create([

                'price'=>$price,
                'location' =>$location,
                'title' =>  $title,
                'ad_id' => $adid,
                'user_id' => Auth::user()->id,
            ]);
            return "saved";
        }  


    }

    public function editAd($adId){

        $categories = DB::table('categories')->get();       
        $subCategories = DB::table('subcategory')->get();            
       
        $userId  = Auth::user()->id;
        $adDetails = UserAds::where('adid',$adId)
                            ->where('user_id',$userId)
                            ->get();



        $images =  "";
        if(count($adDetails) > 0){
             $images = Images::where('adid', $adId)->get();
             return view('edit-ad',['categories'=>$categories , 'subCategories'=>$subCategories,'adDetails'=>$adDetails, 'images'=>$images]);
        }else{
            abort(404);
          //return back()->withInput(); 
        }
        
        
    }

    public function deleteImage($id){
        
        $images = Images::where('id',$id)->get();
        foreach($images as $image){
            @unlink("images/user_images/".$image['name1']);
        }

        $deletedImages = Images::where('id',$id)->delete();
        if($deletedImages){
            return "deleted!!";
        }
        else{
            return "Error delete image";
        }
        
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

    public function updateAd(Request $request,$adid){   


        if($request->has('phonenumber') ){          
            $this->updatePhonenumber($request->phonenumber);            
        }
        if($request->has('email') ){            
            $this->updateEmail($request->email);
        }



        $province = Input::get('province');
        $location = Input::get('township');
        $catagory = Input::get('category-group');
        $title = Input::get('Adtitle');
        $description = Input::get('textarea');
        $price = $request->Input('Price');
        $keywords = $this->generateKeyWords($catagory,$title);
        $user_id  = Auth::user()->id;
       

        $promotionPlan = 0;

        $pin = $this->generatePIN();
        
        $approved = "Approved";

        if (Input::get('optionsRadios',false)){
            $promotionPlan = Input::get('optionsRadios');
            $approved = "Pending";
        }       
              
        
        DB::table('kasiads')
                ->where('user_id',$user_id)
                ->where('adid',$adid )
                ->update(['title'=>$title
                ,'description'=>$description
                ,'catagory'=>$catagory
                ,'price'=>$price
                ,'keywords'=>$keywords
                ,'location'=>$location
                ,'featured'=>$promotionPlan
                ,'approved'=>$approved]);
               


        //checks if the user defined township exits in the database, save it if it doesn't exits.
        $getTownship = Locations::select("location as name")->where("location","LIKE","%$location%")->where('province', $province)->get();

        if(count($getTownship) < 1 ){
            $newTownship = new Locations();
            $newTownship->location = $location;
            $newTownship->province = $province;
            $newTownship->save();
        }

        
        $this->MoveUploadedFiles($request,$adid);


        if (Input::get('optionsRadios',false)){
            $promotionPlan = Input::get('optionsRadios');
            return view('posting-successful',['pin'=>$pin]);

            //send email to Admin with ads details and pin
            $subject = "Ad updated on Kasocular with promotionPlan";
            $this->sendEmailToAdmin($subject, $email, $name, $title,$subcategory, $phonenumber,$description, $pin,$promotionPlan);
            
    
        }else {
            return view('posting-successful');            
        }       
        

        
        //return View('postfreead');
    }

    public function displayPendingAds(){
        $id = Auth::user()->id;
        $fav_Ads = FavouriteAds::where('user_id', $id)->get();
        $userAds = UserAds::where('user_id',$id) 
                    ->where('approved',"Approved")->get();       
        $unApprovedAds = UserAds::where('user_id',$id)
                        ->where('approved',"Pending")->get();
       
        return view('account/account-pending-approval-ads',['fav_Ads'=>$fav_Ads,'userAds'=>$userAds,'unApprovedAds'=>$unApprovedAds]);

    }

   

    public function MoveUploadedFiles($request,$adid){

        $image = "image";
        for($i=1; $i<=5; $i++){ 
            
            if ($request->hasFile($image.$i)) {

                $imageTmpName = $request->file($image.$i);
                
                $fileName = $imageTmpName->getClientOriginalName();


            
                $dir = "images/user_images/".$fileName;
                // $directory = "images/user_images";

                //rename the file if it already exists in the specified directory
                if (file_exists($dir)){
                    $fileName = $i.$fileName;
                    //$request->file('image'.$i)->move($directory, $fileName);
                    echo "The file exists";
                }
                $this->resizeImage($request, $fileName, $imageTmpName,$image.$i);
            

                $img = new Images();
                $img->name1 = $fileName;
                $img->adid = $adid;
                $img->save();


                
            }
            
        }

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

    


    public function generateKeyWords($catagory,$title){
        
        $keywords = "";
   
        if( $catagory == "Houses for sale" ){
            $keywords = "Houses For sale house indlu izindlu  $title";
        }
        else if($catagory == "Houses to rent" ){
            $keywords = "Houses to rent house to rent rent $title";
        }
        else if($catagory == "Shacks for sale" ){
            $keywords = "Shacks for sale shack ityotyombe for sale bhangalo $title";
        }
        else if($catagory == "Shacks to rent" ){
            $keywords = "Shacks for sale shack ityotyombe for sale bhangalo $title";
        }
        else if($catagory == "smartphones" ){
            $keywords = "phones cellphone phone mobilephones mobilephone smartphone smartphones $title";
        }
        else if($catagory == "Cars" ){
            $keywords = "car cars vehicle  $title";
        }
        else if($catagory == "Lost and found" ){
            $keywords = "Lost found   $title";
        }
        else if($catagory == "Jobs" ){
            $keywords = "Job Jobs Job opportunities   $title";
        }
        else if($catagory == "Clothing" ){
            $keywords = "clothes   $title";
        }
        else if($catagory == "Job seekers" ){
            $keywords = "Jobs   $title";
        }
        else if($catagory == "Clothing" ){
            $keywords = "clothes $title";
        }
        else
            $keywords = " $catagory  $title";

        return $keywords;
    }



}
