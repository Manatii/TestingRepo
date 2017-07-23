<?php

namespace App\Http\Controllers;

use App\ads;
use App\UserAds;
use App\Locations;
use App\SubCategories;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Middleware;

class AdsController extends Controller
{

	
    
  	public function home(){
  		$ads = ads::all();
      	return view('home', ['ads' => $ads]);
  	}

    public function displayAllAds(){
    	$ads = DB::table('kasiads')
         ->where('approved',"Approved")
         ->Paginate(3)
         ->get();
    	$catagories = DB::table('catagories')->get();
    	return view('ads', ['ads' => $ads], ['catagories'=>$catagories]);
    }

    public function getLocations($province){

        //in case a province comes in this format: Western Cape,suburbs/Western Cape, Townships
        $province = explode(",", $province);
        $province =  $province[0];
        $locations = DB::table('locations')
        ->where('province',$province)->orderBy('location', 'asc')->get();
    
        return json_encode($locations);
    }

    public function getSuburbsByProvince($province){
        $province = explode(",", $province);
        $province =  $province[0]; 

         $sububs = DB::table('surbubs')
        ->where('province','like', $province)->orderBy('location', 'asc')->get();
         return json_encode($sububs);
    }

    public function getSponsoredAds(){
       $ads = userAds::where('featured','sponsored')
                            ->where('approved',"Approved")
                            ->orderBy('created_at', 'desc')
                            ->Paginate(13);
        return $ads;
    }

    public function getMainCategories(){

        $main_categories = DB::table('categories')->get();
    
        return json_encode($main_categories);
    }
    public function displayAdsByLocAndItem(Request $request){

        
        $this->validate($request, [
              'city' => 'required|max:31',
              'searchItem' => 'required|max:27',
        ]);

        $location = $_GET['city'];
        $location = str_replace("-", " ", $location);      

        $searchItem = $_GET['searchItem'];
        $searchItem = str_replace("-", " ", $searchItem);
      	$searchValues = preg_split('/\s+/', $searchItem, -1, PREG_SPLIT_NO_EMPTY); 
        
        $no_ads_message = "";

        $ads = userAds::where(function ($q) use ($searchValues){
            foreach ($searchValues as $value) {
                $q->orWhere('keywords', 'like', "%{$value}%");
              }
            })->where('approved',"Approved")
              ->where('location', 'like','%'.$location.'%')
              ->orderBy('created_at', 'desc')
              ->Paginate(13);

            if($location == "All Locations"){
                 $ads = userAds::where(function ($q) use ($searchValues) {
              foreach ($searchValues as $value) {
                $q->orWhere('keywords', 'like', "%{$value}%");
              }
            })->where('approved',"Approved")            
              ->orderBy('created_at', 'desc')
                //->toSql();
              ->Paginate(3);
            }    

            if(count($ads) < 1){
               
            $no_ads_message = "Sorry, but we didn't find any ads that match your seach. You may refine your seach using the search fields above";
            }

            $nuImages  = $this->countNuImages($ads);      

              //get province
            $province = DB::table('locations')
                        ->where('province', $location)->first();

             if(count($province) > 0){

                $province = $province->province;
             }    

      		if(count($province) < 1 ){
              $prov =  DB::table('locations')
                          ->where('location', $location)->get();
              
              foreach ($prov as $provnce) {
                  $province = $provnce->province;
              }
          }

          if($province == null){
                $province = 'Western Cape';
                $locations = DB::table('locations')
                           ->where('province', $province)
                           ->get();
          }

          $locations = Locations::where('province','like', $province)
                           ->get();

                
          
          $catagories = DB::table('catagories')->get();

           $locationFound = $this->checkIfLocationExists($location);
          
             $heading = "<a href='#' class='current'><span>Ads related to your seach in</span></a><span class='cityName'>".ucfirst($location)."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                      data-toggle='modal'> <span
                                                  class='caret'></span> change location</a>";        
          
         
               
          $adsPerTownship = $this->countAdsPerLocation($locations);
          	
      		return view('ads', ['ads'=>$ads,'location'=>$location],['searchItem'=>$searchItem,
      				'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message]);


      }


    public function checkIfLocationExists($location){
        $query = DB::table('locations')
                    ->where('location',$location)
                    ->get();

        if(count($query) <1 ){
          $query = DB::table('surbubs')
                    ->where('location',$location)
                    ->get();
        }

        if(count($query) < 1 && $location != "Western Cape"){
           return "not found";          
        }
        else{
          return "found";
        }



    }

     public function displayAdsByCat($category, $province){
        //in case a province comes in this format: Western Cape,suburbs/Western Cape, Townships
        $province = explode(",", $province);
        $province =  $province[0];

        $category = str_replace("-", " ", $category);
        $province = str_replace("-", " ", $province);
        $category = str_replace("and", "&", $category);
        
        $catagories = DB::table('catagories')->get();
        $locations = DB::table('locations')->where('province',$province)->get();

        $adsPerTownship = $this->countAdsPerLocation($locations);   
		
    		$heading = $this->displayHeading($location=null,$category,$province = null,$township=null);
    		$no_ads_message = "";
            $ads = userAds::where('catagory','like', $category)
                            ->where('approved',"Approved")
                            ->orderBy('created_at', 'desc')
                            ->Paginate(13);
            //dd($ads);
        if(count($ads) < 1){
            $no_ads_message = "Sorry, but there are currently no ads under this category. don't panic, this website is new";
        }

        $nuImages  = $this->countNuImages($ads);     

        return view('ads', ['ads' => $ads,'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'no_ads_message'=>$no_ads_message,
                'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message]);


    }


    public function displayAdsByMainCategory($main_catagory, Request $r){
    
        $main_catagory = str_replace("-", " ", $main_catagory); 

        $categories = DB::table('subcategory')->
        where('category_id',$main_catagory)->get();
        $locations = DB::table('locations')->get();
        $adsPerTownship = $this->countAdsPerLocation($locations);
        $province = Input::get('searchItem');        

        $categories = $this->Categories();
        $subCategories = $this->subCategories($categories);
        $catagories = DB::table('catagories')->get();          

        $heading = $this->displayHeading($location=null,$main_catagory,$province = null,$township=null);
           
        $no_ads_message  = "";
        $ads = userAds::where('main_catagory','like', $main_catagory)
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->Paginate(13);
        if(count($ads) < 1){
            $no_ads_message = "Sorry, but there are currently no ads under this category. don't panic, this website is new";
        }
            
        $nuImages  = $this->countNuImages($ads);
      
        return view('ads', ['ads'=>$ads,'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 
               'heading'=>$heading,'nuImages'=>$nuImages,'no_ads_message'=>$no_ads_message]);
        
    }

    public function topAdsAndBargain(){
        $ads = userAds::where('featured', "bagain")
            ->where('approved',"Approved")
            ->orWhere('featured', "agent-ad")
            ->limit(8)
            ->get();

            return $ads;

    }

    public function displayAdsByItemCatLocProv($searchItem,$loc,$catagory,$province){  

        //the province comes in this format: western-cape-townships ...
        //converts the province into an array and removes 'townships'
        //from the array and converts the array to a normal string...:  Western Cape
        //dd($province);
        $province = explode("-", $province);

        //==========================================================
            //gets the last element on the array:township/suburb
        $locationCategory = "";
        foreach ($province as $prov) {
            $locationCategory = $prov;
            if($locationCategory === 'townships'){
                $locationCategory = 'township';
            }else{
                $locationCategory = 'suburb';
            }
        }
        //===========================================================

       // dd($townshipOrSuburb);
        array_pop($province);
        $province  = implode(" ", $province);    
        
        $searchItem = str_replace("-", " ", $searchItem);
        $suburbOrTownship = str_replace("-"," ", $loc);
        $suburbOrTownship = str_replace("-", " ", $suburbOrTownship);
        $catagory = str_replace("-"," ", $catagory);
        $province = str_replace("-", " ", $province);

        $catagory = str_replace('&amp;', '&', $catagory);
        $searchValues = preg_split('/\s+/', $searchItem, -1, PREG_SPLIT_NO_EMPTY);

        $no_ads_message = "";
       
       // dd($catagory."---".$suburbOrTownship."---".$province);
        $ads = userAds::where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('keywords', 'like', "%{$value}%");
          }
        })->where('catagory','like', $catagory)
          ->where('location','like', $suburbOrTownship)
          ->where('province','like', $province)
          ->where('approved',"Approved")
          ->orderBy('created_at', 'desc')
         ->Paginate(13);
      
        //ignore the province...search by item category and and township
        if(count($ads) < 1 &&  $province == "all provinces"){
            $ads = userAds::where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('keywords', 'like', "%{$value}%");
          }
        })->where('catagory','like', $catagory)
          ->where('location','like', $suburbOrTownship)
          ->where('approved',"Approved")
          ->orderBy('created_at', 'desc')
          ->Paginate(13);
        }  
        if(count($ads) < 1){
            $no_ads_message = "Sorry, but we there are currrently no ".$catagory." in ".ucfirst($suburbOrTownship).", don't panic this website is new.";
        }

        $provinces = DB::table('locations')
            ->where('province','like', '%'.$province.'%')
            ->get();

        $locations = " ";
        if($locationCategory === "township"){
            $locations = DB::table('locations')
                        ->where('province', $province)
                        ->get();
        }
        else{
            $locations = DB::table('surbubs')
            ->where('province','like', '%'.$province.'%')
            ->get();
        }
     
        $adsPerTownship = $this->countAdsPerLocation($locations); 
        $nuImages  = $this->countNuImages($ads);       
        $heading = $this->displayHeading($location = null,$catagory,$province,$suburbOrTownship);

        return view('ads', ['ads'=>$ads,'province'=>$province],['searchItem'=>$searchItem,
                'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message]);
    }

     public function displayAdsByItemMainCatLocProv($searchItem,$loc,$main_catagory,$province){

       
         //the province comes in this format: western-cape-townships ...
        //converts the province into an array and removes 'townships'
        //from the array and converts the array to a normal string...:  Western Cape
        //dd($province);
        $province = explode("-", $province);

        //==========================================================
            //gets the last element on the array:township/suburb
        $townshipOrSuburb = "";
        foreach ($province as $prov) {
            $townshipOrSuburb = $prov;
            if($townshipOrSuburb === 'townships'){
                $townshipOrSuburb = 'township';
            }else{
                $townshipOrSuburb = 'suburb';
            }
        }          //  dd($townshipOrSuburb);
        array_pop($province);
        $province  = implode(" ", $province); 
        
        $locations = " ";      
        if($townshipOrSuburb === "township"){
            $locations = DB::table('locations')
                        ->where('province', $province)
                        ->get();
        }
        else{
            $locations = DB::table('surbubs')
            ->where('province','like', '%'.$province.'%')
            ->get();
        }    

        $searchItem = str_replace("-", " ", $searchItem);
        $townshipOrSuburb = str_replace("-"," ", $loc);
        $townshipOrSuburb = str_replace("-", " ", $townshipOrSuburb);
        $main_catagory = str_replace("-"," ", $main_catagory);
        $province = str_replace("-", " ", $province);

        $main_catagory = str_replace('&amp;', '&', $main_catagory);
        $searchValues = preg_split('/\s+/', $searchItem, -1, PREG_SPLIT_NO_EMPTY);
        $no_ads_message = "";     

        $ads = userAds::where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('keywords', 'like', "%{$value}%");
          }
        })->where('main_catagory','like', $main_catagory)
          ->where('location','like', $townshipOrSuburb)
          ->where('approved',"Approved")
          ->orderBy('created_at', 'desc')
           // ->toSql();
         ->Paginate(13);
           
        if(count($ads) < 1){
            $no_ads_message = "Sorry, but we there are currrently no ".$main_catagory." in ".ucfirst($townshipOrSuburb).", don't panic this website is new.";
        }

        $provinces = DB::table('locations')
            ->where('province','like', '%'.$province.'%')
            ->get();   
        
        $adsPerTownship = $this->countAdsPerLocation($locations); 
        $nuImages  = $this->countNuImages($ads);       
        $heading = $this->displayHeading($location = null,$main_catagory,$province,$townshipOrSuburb);

        return view('ads', ['ads'=>$ads,'province'=>$province],['searchItem'=>$searchItem,
                'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message]);
    }

	public function displayAdsByItemCatProv(){
    
      $catagory = Input::get('category');
      $searchItem = Input::get('searchItem');
  		$province = Input::get('prov');

      //in case a province comes in this format: Western Cape,suburbs/Western Cape, Townships
      $province = explode(",", $province);
      $townshipOrSuburb = "";
      
      foreach ($province as $prov) {
            $townshipOrSuburb = $prov;
            if($townshipOrSuburb === 'townships'){
                $townshipOrSuburb = 'township';
            }else if($townshipOrSuburb === 'suburbs'){
                $townshipOrSuburb = 'suburb';
            }             
      }
        
      //sets the province to a single value
      $province =  $province[0];   
      $searchValues = preg_split('/\s+/', $searchItem, -1, PREG_SPLIT_NO_EMPTY); 
        
      $no_ads_message = "";
      $ads = userAds::where(function ($q) use ($searchValues) {
        foreach ($searchValues as $value) {
          $q->orWhere('keywords', 'like', "%{$value}%");
        }
      })->where('catagory','like', '%'.$catagory.'%')
        ->where('province','like', '%'.$province.'%')
        ->where('approved',"Approved")
        ->where('location_category',$townshipOrSuburb)
        ->orderBy('created_at', 'desc')                  
        ->Paginate(13);
        
        $locations = " ";
        if($townshipOrSuburb === "township"){
            $locations = DB::table('locations')
                        ->where('province', $province)
                        ->get();
        }
        else{
            $locations = DB::table('surbubs')
            ->where('province','like', '%'.$province.'%')
            ->get();
        }

        $province = Input::get('prov');
        if(count($ads) < 1 && $province == 'Western Cape,All'){
             $ads = userAds::where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('keywords', 'like', "%{$value}%");
          }
            })->where('catagory','like', '%'.$catagory.'%')
            ->where('approved',"Approved")
            ->orderBy('created_at', 'desc')
            ->Paginate(13);
        }
       
        if(count($ads) < 1){
            $no_ads_message = "Sorry, but we didn't find any ads that match your search criteria, don't panic this website is new.";
        }        

        $main_categories = DB::table('catagories')->get();
        $adsPerTownship = $this->countAdsPerLocation($locations);
        $adsPerCategory = $this->countAdsPerCatagory($main_categories);
    	  $nuImages  = $this->countNuImages($ads);
        $province = Input::get('prov');
        $heading = $this->displayHeading($location = null,$catagory,$province,$township=null);
        
        //dd($searchItem."--".$catagory."--".$province);
		    return view('ads', ['ads'=>$ads,'province'=>$province],['searchItem'=>$searchItem,'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages,'province'=>$province, 'no_ads_message'=>$no_ads_message]);
	}

    public function displayAdsSubCategories($category, Request $r){

    	$category = str_replace("-", " ", $category);
      $locations = DB::table('locations')->get();
    	$adsPerTownship = $this->countAdsPerLocation($locations);
    	$province = Input::get('searchItem');    	

    	$heading = $this->displayHeading($location=null,$category,$province = null,$township=null);      	
      $ads = userAds::where('catagory','like', $category)
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
			            ->Paginate(13);

		  $nuImages  = $this->countNuImages($ads);
		  $adsPerCatagory = $this->countAdsPerCatagory($catagories);
		
      return view('sub-category', ['ads' => $ads,
				'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship,'heading'=>$heading,'nuImages'=>$nuImages]);

    }

    public function countNuImages($ads){
      	$nuImages = array();
      	foreach($ads as $ad){
      		  $adId = $ad->adid;
            $images = DB::table('images')
  			                ->where('adid', $adId)
  			                ->get();
                 
            $countImages = $images->count();
  			   array_push($nuImages, $countImages);
      	}

      	return $nuImages;
    }

    public function displayHeading($location,$catagory,$province, $suburbOrTownship){
    	if($location != null && $province==Null && $catagory == null ){
    		return "<a href='#' class='current'><span>All ads in</span></a><span class='cityName'>". $location."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span> change location</a>";
    	}
    	else if($location == null && $catagory != null && $province!=null && $suburbOrTownship==null ){
    		return "<a href='#' class='current'><span>".ucfirst($catagory)." in</span></a><span class='cityName'>". $province ."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span> change location</a>";
    	}
        else if($location == null && $catagory != null && $province!=null && $suburbOrTownship !=null){
            return "<a href='#' class='current'><span>".ucfirst($catagory) ." in</span></a><span class='cityName'>".ucfirst($suburbOrTownship)."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span> change location</a>";
        }
        else if($catagory != null && $location == null && $province == null && $suburbOrTownship == null){
            return "<a href='#' class='current'><span>". ucfirst($catagory ) ." in</span></a><span class='cityName'>Wetern Cape, All locations</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span> change location</a>";
        }        
        else if($catagory == null && $location == null && $province != null && $suburbOrTownship == null){
            return "<a href='#' class='current'><span> Ads in</span></a><span class='cityName'>All Provinces</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span>  change location</a>";
        }        
    	else{
    		return "<a href='#' class='current'><span>Ads in</span></a><span class='cityName'> Western Cape</span>";
    	}


    }

     public function Categories(){
        $categories = DB::table('categories')->get();

       
        return $categories;

    }

    public function displayAdsbyLoc($location){

    	$location = str_replace("-", " ", $location);

        //filter by province (if location is a Privince)       	
    	$locations = DB::table('locations')->where('province',$location)->get();
      
      //if location is not a Province
      if(count($locations) < 1){

            //if location is a township
          $township = DB::table('locations')->where('location',$location)->first();
            //grab a province from the results of the above query

          if(count($township) >0){
                $province = $township->province;
                //return locations
                $locations = DB::table('locations')->where('province',$province)->get();
          }          
             
          //if location is a suburb, repeat the above algorythem to get suburbs
          if(count($locations) < 1){
                $surbub = DB::table('surbubs')->where('location',$location)->first();
                if(count($surbub) > 0){
                    $province = $surbub->province;
                    $locations = DB::table('surbubs')->where('province',$province)->get();
                }           
          }                     
    } 
        
    //when a hacker messes with my website by entering a gabbige location 
    //on the url bar...take him to the previous page with valid location
    if(count($locations) < 1){
      return back()->withInput();
    }

    $adsPerTownship = $this->countAdsPerLocation($locations);
    $heading = $this->displayHeading($location,$catagory = null,$province = null, $township=null);
    
    $no_ads_message = "";
    $ads = userAds::where('location','like', $location)
                          ->where('approved',"Approved")
                          ->orderBy('created_at', 'desc')
			              ->Paginate(1);

		if(count($ads) < 1){
            $no_ads_message = 'Sorry but there are currently no ads in '.ucfirst($location). ". Don't panic this website is new";
        }
       

		$nuImages  = $this->countNuImages($ads);
        return view('ads', ['ads' => $ads,
				'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship,'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message]);
    }

    public function countAdsPerCatagory($catagories){
    	$adsPerCatagory = array();
    	foreach($catagories as $catagory){
    		$catagory = $catagory->catagory;


    		$adsPerCat = DB::table('kasiads')
			->where('keywords','like', "%".$catagory."%")
             ->where('approved',"Approved")
			 ->get();



               
       	    $countCatagories = $adsPerCat->count();
			array_push($adsPerCatagory, $countCatagories);
    	}

    	return $adsPerCatagory;
    }

    public function countAdsPerLocation($locations){
    	$adsPerTownship = array();
    	foreach($locations as $location){
    		$location = $location->location;
    		$adsPerLoc = DB::table('kasiads')
			->where('location','like', "%".$location."%")
            ->where('approved',"Approved")
			 ->get();
               
       	    $countLocations = $adsPerLoc->count();
			array_push($adsPerTownship, $countLocations);
    	}

    	return $adsPerTownship;
    }

   

    public function subCategories(){
       $subCategories = DB::table('subcategory')->get();
       return $subCategories;
    }

    public function getSubCategoriesById($category_id){
        
        $subCategories = SubCategories::where('category_id',$category_id)->get();
        foreach($subCategories as $subCat){

            $adsPerSubCat = UserAds::where('catagory',$subCat->subcategory_name)->get();
            $subCat->nu_ads = count($adsPerSubCat);
        }
        return json_encode($subCategories);
    }

	public function displayAds(Request $request){

        $no_ads_message = "";        
		$ads = userAds::where('approved',"Approved")
                       ->orderBy('created_at', 'desc')
                       ->orderBy('created_at', 'desc')
                       ->Paginate(3); 

		$locations = DB::table('locations')
                        ->where('province', 'Western Cape')
                        ->get();

        $adsPerTownship = $this->countAdsPerLocation($locations);

        $nuImages  = $this->countNuImages($ads);
        $heading = $this->displayHeading($location=null,$catagory = null,$province = "All Provinces", $township = null);

    	return view('ads', ['ads' => $ads,'locations'=>$locations,'adsPerTownship'=>$adsPerTownship, 'nuImages'=>$nuImages,'heading'=>$heading,'no_ads_message'=>$no_ads_message]);
	}


   
}
