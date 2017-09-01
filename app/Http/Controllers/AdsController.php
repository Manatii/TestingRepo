<?php

namespace App\Http\Controllers;

use App\ads;
use App\UserAds;
use App\SponsoredAdsExtender;
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
      dd("HI hi hi");
      $functionName = "displayAdsByLocAndItem";
      //dd("In function: ".$functionName);  
    	$ads = DB::table('kasiads')
         ->where('approved',"Approved")
         ->Paginate(16)
         ->get();

        


    	$catagories = DB::table('catagories')->get();
    	return view('updatedAds', ['ads' => $ads,'sponsored'=>$sponsoredAds,'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds
        ,'bargains'=>$bargains,'nuSponsoredAds'=>$nuSponsoredAds,'nuBargains'=>$nuBargains], ['catagories'=>$catagories]);
    }

    public function getLocations($province){

        //in case a province comes in this format: Western Cape,suburbs/Western Cape, Townships
        $province = explode(",", $province);
        $province =  $province[0];
        $locations = DB::table('locations')
        ->where('province',$province)
        ->orderBy('location', 'asc')
        ->get();
    
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
      $no_ads_message = "";
      $ads = userAds::where('approved',"Approved")
                      ->where('featured',"Sponsored")
                      ->orderBy('created_at', 'desc')
                      ->orderBy('created_at', 'desc')
                      ->Paginate(16); 

    $locations = DB::table('locations')
                        ->where('province', 'Western Cape')
                        ->get();

        $adsPerTownship = $this->countAdsPerLocation($locations);

        $nuImages  = $this->countNuImages($ads);
        $heading = $this->displayHeading($location=null,$catagory = null,$province = "All Provinces", $township = null);

        $SEOkeywords = $this->generateSEOKeyWords($ads);
        $SEOkeywords = explode(",",  $SEOkeywords);

        $i = 0;
        $pageTitle = "";
        foreach ($SEOkeywords as $keyword){

             if($i <=10 && !substr_count($keyword, "shacks") && !substr_count($keyword, "tv") && !substr_count($keyword, "dvd")){
                
                $occurances = substr_count($pageTitle,$keyword);
                if($occurances == 0){
                   $pageTitle.=$keyword.",";
                }              
             }            
             $i++;
         }

        $pageTitle = $pageTitle." and...for sale";
        $SEOkeywords = implode(",",$SEOkeywords);  
        
        $pageTitle = "Find $pageTitle in Western Cape | Wcocular";
        $pageDescription = "$SEOkeywords for sale in Western Cape. Find second hand goods online with Kasocular";
        $keywords = "$SEOkeywords for sale in $location";   

      return view('updatedAds', ['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'keywords'=>$keywords,'ads' => $ads,'locations'=>$locations,'adsPerTownship'=>$adsPerTownship, 'nuImages'=>$nuImages,'heading'=>$heading,'no_ads_message'=>$no_ads_message]);
    }

    public function getMainCategories(){

        $main_categories = DB::table('categories')->get();
    
        return json_encode($main_categories);
    }
    public function displayAdsByLocAndItem(Request $request){

          $functionName = "displayAdsByLocAndItem";

          $location = strtolower($_GET['location']);
          $searchItem = $_GET['searchItem'];          
          $location = str_replace("-", " ", $location);    
          $searchItem = str_replace("-", " ", $searchItem);
        	$searchValues = preg_split('/\s+/', $searchItem, -1, PREG_SPLIT_NO_EMPTY); 
          
          $no_ads_message = "";       

          $location = strtolower($location);
          $locationField = "";
          $categoryField = "";
          $categoryFilter = "";

          if(strstr($searchItem,"houses") && strstr($searchItem,"rent") || strstr($searchItem,"house") && strstr($searchItem,"rent") ){
              $categoryField = 'catagory';
              $categoryFilter = 'houses & flats for rent';
          }else if(strstr($searchItem,"houses") && strstr($searchItem,"sale") || strstr($searchItem,"house") && strstr($searchItem,"sale")){
              $categoryField = 'catagory';
              $categoryFilter = 'houses & flats for sale';
          }
          else if(strstr($searchItem,"shacks") && strstr($searchItem,"rent") || strstr($searchItem,"shack") && strstr($searchItem,"rent")){
              $categoryField = 'catagory';
              $categoryFilter = 'Shacks to Rent';                        
          }else if(strstr($searchItem,"shacks") && strstr($searchItem,"sale") || strstr($searchItem,"shack") && strstr($searchItem,"sale")){
              $categoryField = 'catagory';
              $categoryFilter = 'Shacks for sale';
          }else{
               $categoryField = "province";
               $categoryFilter = "Western Cape";
          }

          if($location == "all locations"){
              $locationField = "province";
              $filter  = "Western Cape";     
          }else if($location == "all locations,suburbs"){
              $locationField = "location_category";
              $filter = "suburb";
          }else if ($location == "all locations,townships"){
              $locationField = "location_category";
              $filter = "township";
          }else{
              $locationField = "location";
              $filter = $location;
          }      

          $searchItem = str_replace("-", " ", $searchItem);     
          $searchValues = preg_split('/\s+/',$searchItem, -1, PREG_SPLIT_NO_EMPTY);        
        
          $ads = userAds::where(function ($q) use ($searchValues){
            foreach ($searchValues as $value) {
                $q->orWhere('keywords', 'like', "%{$value}%");
              }
            })->where($locationField,$filter)
              ->where($categoryField,$categoryFilter)
              ->where('approved',"Approved")
              ->orderBy('created_at', 'asc')
              ->Paginate(16);

          $bargainsAndSponsoredAds = $this->getBargainsAndSponsoredAdsBySearchItem($searchItem,$location);
          $sponsoredAds = $bargainsAndSponsoredAds['sponsoredAds'];
          $sponsoredAdsPagination = $bargainsAndSponsoredAds['sponsoredAdsPagination'];
          $nuSponsoredAds = $bargainsAndSponsoredAds['nuSponsoredAds'];
          $firstGallerySponsoredAds = $bargainsAndSponsoredAds['firstGallerySponsoredAds'];
          $secondGallerySponsoredAds =  $bargainsAndSponsoredAds['secondGallerySponsoredAds'];


          $bargains = $bargainsAndSponsoredAds['bargains'];
          $bargainsPagination = $bargainsAndSponsoredAds['bargainsPagination'];
          $nuBargains = $bargainsAndSponsoredAds['nuBargains'];   

          $nuImages  = $this->countNuImages($ads);  
          $nuImagesBargains  = $this->countNuImages($bargains);
          $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds);     

          $location = ucfirst($location);
          if(count($ads) < 1){
               
            $no_ads_message = "Sorry, but we didn't find any ads that match your seach in $location. You may refine your seach using the search fields above";
          }


        $noBargainsMessage = "";
        if($nuBargains < 1){
          $noBargainsMessage = "Sorry, but we didn't find any bargains that match your search in $location.";
        }

        $noSponsoredAdsMessage = "";
        if($nuSponsoredAds < 1){
            $noSponsoredAdsMessage  = "Sorry, but we didn't find any sponsored ads that match your search in $location.";
        }  
                
          
        $catagories = DB::table('catagories')->get();

        $locationFound = $this->checkIfLocationExists($location);
        $heading = "<a href='#' class='current'><span>Ads related to your seach in</span></a><span class='cityName'>".ucfirst($location)."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                      data-toggle='modal'> <span
                                                  class='caret'></span> change location</a>";   
          
         
        $locationCategory = '';
        $query = DB::table('kasiads')
                           ->where('location', $location)
                           ->get();    

        foreach ($query as $key) {
           $locationCategory =  $key->location_category;
        }

        $locations = "";
        if($locationCategory == "township"){
            $locations = DB::table('locations')
                           ->get();
        }else{
            $locations = DB::table('surbubs')
                           ->get();
        }

        $adsPerTownship = $this->countAdsPerLocation($locations);

        $SEOkeywords = $this->generateSEOKeyWords($ads);

         $location = ucfirst($location);
         $SEOkeywords = ucfirst($SEOkeywords);
         if($location == "All locations" || $location ==  "All locations,suburbs"){
            $location = "Western Cape";
         }else if($location == "All locations,townships"){
           $location = "Western Cape townships";
         } 

         if($SEOkeywords == null){
          $SEOkeywords = "Second hand goods";
         }
         $pageTitle = "Classified ads in $location | Wcocular";
         $pageDescription = "$SEOkeywords for sale in $location. Find second hand goods online with Kasocular";
         $keywords = "$SEOkeywords for sale in $location";  

        $location = urlencode($_GET['location']);
        $searchItem = urlencode($_GET['searchItem']);
        $requestURI = "?location=$location&searchItem=$searchItem";
        $ads->setPath($requestURI);        

        return view('updatedAds', ['firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds,'sponsoredAds'=>$sponsoredAds,'sponsoredAdsPagination'=>$sponsoredAdsPagination,'nuSponsoredAds'=>$nuSponsoredAds,'bargains'=>$bargains,'nuBargains'=>$nuBargains,'nuImagesBargains'=>$nuImagesBargains,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'noBargainsMessage'=>$noBargainsMessage,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,'ads'=>$ads,'pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'keywords'=>$keywords,'location'=>$location,
              'locations'=>$locations,'bargainsPagination'=>$bargainsPagination,'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message,'location'=>$location,'searchItem'=>$searchItem,'searchItem'=>$searchItem]);

      }

      public function displayAdsByLocationModalSearchItem(Request $request,$location,$searchItem){

        $functionName = "displayAdsByLocAndItem";

        $location = str_replace("-", " ", $location);    
        $searchItem = str_replace("-", " ", $searchItem);
        $searchValues = preg_split('/\s+/', $searchItem, -1, PREG_SPLIT_NO_EMPTY); 

        $locationField = "location";
        $locationFilter = $location;

        if($location == "all locations suburbs"){
            $locationField = "location_category";
            $locationFilter = "suburb";
            $locationTitle = "All locations, suburbs";
        }
        else if($location == "all locations townships"){
            $locationField = "location_category";
            $locationFilter = "township";
            $locationTitle = "All locations, townships";
        }
        
        $no_ads_message = "";       

        $ads = userAds::where(function ($q) use ($searchValues){
            foreach ($searchValues as $value) {
                $q->orWhere('keywords', 'like', "%{$value}%");
              }
            })->where('approved',"Approved")
              ->where($locationField, 'like','%'.$locationFilter.'%')
              ->orderBy('created_at', 'desc')
              ->Paginate(16);

            if($location == "All Locations,suburbs" || $location == "All locations,suburbs"){
                 $ads = userAds::where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                  $q->orWhere('keywords', 'like', "%{$value}%");
                }
                })->where('approved',"Approved")
                  ->where('location_category',"suburb")           
                  ->orderBy('created_at', 'desc')
                  ->Paginate(16);
            }
            else if($location == "All Locations,townships" || $location == "All locations,townships"){
               $ads = userAds::where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                  $q->orWhere('keywords', 'like', "%{$value}%");
                }
                })->where('approved',"Approved")
                  ->where('location_category',"township")           
                  ->orderBy('created_at', 'desc')
                    //->toSql();
                  ->Paginate(16);
          }else{
              if($location == "All Locations" || $location == "All locations"){
                  $searchItem = strtolower($_GET['searchItem']);

                   $AdditionalFilter = ";";
                   if(strstr($searchItem,"houses") && strstr($searchItem,"rent") || strstr($searchItem,"house") && strstr($searchItem,"rent") ){
                       $ads = userAds::where('catagory','houses & flats for rent')->Paginate(16);
                   }else if(strstr($searchItem,"houses") && strstr($searchItem,"sale") || strstr($searchItem,"house") && strstr($searchItem,"sale")){
                       $ads = userAds::where('catagory','houses & flats for sale')->Paginate(16);
                   }
                   else if(strstr($searchItem,"shacks") && strstr($searchItem,"rent") || strstr($searchItem,"shack") && strstr($searchItem,"rent")){
                       $ads = userAds::where('catagory','Shacks to Rent')->Paginate(16);
                   }else if(strstr($searchItem,"shacks") && strstr($searchItem,"sale") || strstr($searchItem,"shack") && strstr($searchItem,"sale")){
                       $ads = userAds::where('catagory','Shacks for sale')->Paginate(16);
                   }
                   else{
                      $ads = userAds::where(function ($q) use ($searchValues){
                      foreach ($searchValues as $value){
                        $q->orWhere('keywords', 'like', "%$value%");
                      }
                      })->where('approved',"Approved")
                         //$AdditionalFilter            
                      ->orderBy('created_at', 'desc')
                      ->Paginate(16);
                   }                   
                  //dd($ads);
                 $ads->appends(['search'=>$searchItem]);
              }
          } 

          $bargainsAndSponsoredAds = $this->getBargainsAndSponsoredAdsBySearchItem($searchItem,$location);
          $sponsoredAds = $bargainsAndSponsoredAds['sponsoredAds'];
          $sponsoredAdsPagination = $bargainsAndSponsoredAds['sponsoredAdsPagination'];
          $nuSponsoredAds = $bargainsAndSponsoredAds['nuSponsoredAds'];
          $firstGallerySponsoredAds = $bargainsAndSponsoredAds['firstGallerySponsoredAds'];
          $secondGallerySponsoredAds =  $bargainsAndSponsoredAds['secondGallerySponsoredAds'];


          $bargains = $bargainsAndSponsoredAds['bargains'];
          $bargainsPagination = $bargainsAndSponsoredAds['bargainsPagination'];
          $nuBargains = $bargainsAndSponsoredAds['nuBargains'];   

          $nuImages  = $this->countNuImages($ads);  
          $nuImagesBargains  = $this->countNuImages($bargains);
          $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds);     

          $location = ucfirst($location);
          if(count($ads) < 1){
               
            $no_ads_message = "Sorry, but we didn't find any ads that match your seach in $location. You may refine your seach using the search fields above";
          }


        $noBargainsMessage = "";
        if($nuBargains < 1){
          $noBargainsMessage = "Sorry, but we didn't find any bargains that match your search in $location.";
        }

        $noSponsoredAdsMessage = "";
        if($nuSponsoredAds < 1){
            $noSponsoredAdsMessage  = "Sorry, but we didn't find any sponsored ads that match your search in $location.";
        }  
                
          
        $catagories = DB::table('catagories')->get();

        $locationFound = $this->checkIfLocationExists($location);
        $heading = "<a href='#' class='current'><span>Ads related to your seach in</span></a><span class='cityName'>".ucfirst($location)."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                      data-toggle='modal'> <span
                                                  class='caret'></span> change location</a>";   
          
         
        $locationCategory = '';
        $query = DB::table('kasiads')
                           ->where('location', $location)
                           ->get();    

        foreach ($query as $key) {
           $locationCategory =  $key->location_category;
        }

        $locations = "";
        if($locationCategory == "township"){
            $locations = DB::table('locations')
                           ->get();
        }else{
            $locations = DB::table('surbubs')
                           ->get();
        }

        $adsPerTownship = $this->countAdsPerLocation($locations);

        $SEOkeywords = $this->generateSEOKeyWords($ads);

         $location = ucfirst($location);
         $SEOkeywords = ucfirst($SEOkeywords);
         if($location == "All locations" || $location ==  "All locations,suburbs"){
            $location = "Western Cape";
         }else if($location == "All locations,townships"){
           $location = "Western Cape townships";
         } 

         if($SEOkeywords == null){
          $SEOkeywords = "Second hand goods";
         }
         $pageTitle = "Classified ads in $location | Wcocular";
         $pageDescription = "$SEOkeywords for sale in $location. Find second hand goods online with Kasocular";
         $keywords = "$SEOkeywords for sale in $location";  

        $requestURI = "?location=$location&searchItem=$searchItem";
        $ads->setPath($requestURI);


        

          return view('updatedAds', ['firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds,'sponsoredAds'=>$sponsoredAds,'sponsoredAdsPagination'=>$sponsoredAdsPagination,'nuSponsoredAds'=>$nuSponsoredAds,'bargains'=>$bargains,'nuBargains'=>$nuBargains,'nuImagesBargains'=>$nuImagesBargains,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'noBargainsMessage'=>$noBargainsMessage,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,'ads'=>$ads,'pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'keywords'=>$keywords,'location'=>$location,
              'locations'=>$locations,'bargainsPagination'=>$bargainsPagination,'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message,'location'=>$location,'searchItem'=>$searchItem,'searchItem'=>$searchItem,'location'=>$location,'searchItem'=>$searchItem]);

      }

      public function generatePageTitleForMainCategory($mainCategory){
          //dd($mainCategory);
          $pageTitle = "";
          $mainCategory = strtolower($mainCategory);
          if($mainCategory == "vehicles"){
             $pageTitle = "Used Cars for sale";
          }else if ($mainCategory == "property"){
             $pageTitle = "Houses to Rent and Houses for sale";
          }else{
              $pageTitle = "Computers Laptops and Mobile phones...";
          }
          return $pageTitle;
      }

      public function generateSEOKeyWords($ads){

          $subcategoryForSEO = "";
          $SEOkeywords ="";
         
          foreach($ads as $ad){
              $subcategoryForSEO = $ad->catagory;
              $subCategories = DB::table('subcategory')
                                  ->where('subcategory_name',$subcategoryForSEO)
                                  ->get();
              $i = 0;
              foreach ($subCategories as $subcategory){
                  $subcategoryForSEO = strtolower($subcategoryForSEO);

                  $subcategoryForSEO = str_replace("for sale", "", $subcategoryForSEO)."#";
                  $occurances = substr_count($SEOkeywords, $subcategoryForSEO); 

                  if ($occurances === 0){
                      $nuWords = str_word_count($SEOkeywords);
                      //echo $nuWords."</br>";

                      if($nuWords<22){
                          $subCat = strtolower($subcategory->subcategory_name);
                          if($subCat == "cars"){
                              $subCat = "used ".$subCat;
                          }
                          else if($subCat == "mobile phones" || $subCat == "Computers,Laptops & Software"){
                              $subCat = "second hand ".$subCat;
                          }
                          if($subCat != "vacation rentals"){
                             $subCat = str_replace("for sale", "", $subCat)."#";
                             $SEOkeywords .= $subCat;
                          }
                      }                           
                  }
              }  
          }  
          
          $SEOkeywords =  explode("#", $SEOkeywords);
          array_pop($SEOkeywords);
          $SEOkeywords =  implode(",", $SEOkeywords);
          $SEOkeywords = str_replace(",", ",", $SEOkeywords);
          $isLastWordJobs = strpos($SEOkeywords, "jobs");
          
          $SEOkeywords =  explode(",", $SEOkeywords);
          // dd($SEOkeywords);
          $lastIndex = count($SEOkeywords);            

          if(strstr($SEOkeywords[$lastIndex-1], "rent") || strstr($SEOkeywords[$lastIndex-1], "jobs")){
           // dd($SEOkeywords[$lastIndex]);
            $firstWord =  $SEOkeywords[0];
            $SEOkeywords[0] = $SEOkeywords[$lastIndex-1];
            $SEOkeywords[$lastIndex-1] =  $firstWord;         
            $SEOkeywords = $SEOkeywords; 

          }

          if(count($SEOkeywords) > 1){
              foreach ($SEOkeywords as $keyword){
                if($keyword == $SEOkeywords[$lastIndex-1]){
                  $SEOkeywords[$lastIndex-1]= "and ".$keyword;                  
                }
              } 
          }       
        
          $SEOkeywords = implode(",", $SEOkeywords);
          $SEOkeywords =  explode(",", $SEOkeywords);
          //array_shift($SEOkeywords);
          $SEOkeywords = implode(",", $SEOkeywords);       
          
          //dd($SEOkeywords);
          return $SEOkeywords;
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

     public function displayAdsByCat($category){

        $functionName = "displayAdsByCat";
       // dd("In function: ".$functionName);    

        $category = str_replace("-", " ", $category);
        $category = str_replace("and", "&", $category);

        $bargainsAndSponsoredAds = $this->getBargainsAndSponsoredAds($category);

        $sponsoredAds = $bargainsAndSponsoredAds['sponsoredAds'];
        $sponsoredAdsPagination = $bargainsAndSponsoredAds['sponsoredAdsPagination'];
        $nuSponsoredAds = $bargainsAndSponsoredAds['nuSponsoredAds'];

        $bargains = $bargainsAndSponsoredAds['bargains'];
        $bargainsPagination = $bargainsAndSponsoredAds['bargainsPagination'];
        $nuBargains = $bargainsAndSponsoredAds['nuBargains'];
        $firstGallerySponsoredAds = $bargainsAndSponsoredAds['firstGallerySponsoredAds'];
        $secondGallerySponsoredAds = $bargainsAndSponsoredAds['secondGallerySponsoredAds'];

        $locations = DB::table('surbubs')->get();
        
        $catagories = DB::table('catagories')->get(); 
        
        $adsPerTownship = $this->countAdsPerLocation($locations);		
    		$heading = $this->displayHeading($location=null,$category,$locationCategory = null,$township=null);
    		
        $no_ads_message = "";
        $noBargainsMessage = "";
        $noSponsoredAdsMessage  = "";

        $ads = userAds::where('catagory','like', $category)
                            ->where('approved',"Approved")
                            ->orderBy('created_at', 'desc')
                            ->Paginate(16);
            //dd($ads);
        if(count($ads) < 1){
            $no_ads_message = "Sorry, but there are currently no ads under this category. don't panic, this website is new";
        }    

        if($nuBargains < 1){
          $noBargainsMessage = "Sorry, but there are currently no bargains under this category.";
        }

        if($nuSponsoredAds < 1){
            $noSponsoredAdsMessage  = "Sorry, but there are currently no sponsored ads under this category.";
        }     


        $nuImages  = $this->countNuImages($ads);
        $nuImagesBargains  = $this->countNuImages($bargains);
        $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds);

        $storedKeyword = $category;
        $storedCategory = $category; 

         if($category != "jobs"){
            $category = "$category for Sale";
        }


        $category = ucfirst($category);
        $pageTitle = "$category in Western Cape | Wcocular";
        $pageDescription = "Find $category in Western Cape with Wcocular in minutes. We have $category, posted by users from across the Western Cape";
        $keywords = "$category in Western Cape";   

      

        return view('updatedAds', ['firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds,'sponsoredAds'=>$sponsoredAds,'sponsoredAdsPagination'=>$sponsoredAdsPagination,'nuSponsoredAds'=>$nuSponsoredAds,'bargains'=>$bargains,'nuBargains'=>$nuBargains,'nuImagesBargains'=>$nuImagesBargains,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'noBargainsMessage'=>$noBargainsMessage,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,'storedKeyword'=>$storedKeyword,'storedCategory'=>$storedKeyword,'ads' => $ads, 'pageTitle'=>$pageTitle, 'pageDescription'=>$pageDescription,'keywords'=>$keywords, 'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'no_ads_message'=>$no_ads_message,
                'heading'=>$heading,'nuImages'=>$nuImages,'noBargainsMessage'=>$noBargainsMessage,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'bargainsPagination'=>$bargainsPagination,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage]);
    }

    public function displayAdsByMainCategory($main_catagory,Request $request){

        $functionName = "displayAdsByMainCategory";
       // dd("at line 459, function: ".$functionName);
    
        $main_catagory = str_replace("-", " ", $main_catagory); 
        $main_catagory = str_replace("and", "&", $main_catagory); 

        $categories = DB::table('subcategory')->
        where('category_id',$main_catagory)->get();       
       
        $bargainsAndSponsoredAds = $this->getBargainsAndSponsoredAds($main_catagory);

        $sponsoredAds = $bargainsAndSponsoredAds['sponsoredAds'];

        $sponsoredAdsPagination = $bargainsAndSponsoredAds['sponsoredAdsPagination'];
        $nuSponsoredAds = $bargainsAndSponsoredAds['nuSponsoredAds'];

        $bargains = $bargainsAndSponsoredAds['bargains'];
        $bargainsPagination = $bargainsAndSponsoredAds['bargainsPagination'];
        $nuBargains = $bargainsAndSponsoredAds['nuBargains'];
        $firstGallerySponsoredAds = $bargainsAndSponsoredAds['firstGallerySponsoredAds'];
        $secondGallerySponsoredAds = $bargainsAndSponsoredAds['secondGallerySponsoredAds'];
        
        $categories = $this->Categories();
        $subCategories = $this->subCategories($categories);
        $catagories = DB::table('catagories')->get();          

        $heading = $this->displayHeading($location=null,$main_catagory,$locationCategory = null,$township=null);
        $nuAds  = ""; 
        $no_ads_message  = "";
        $noBargainsMessage = "";
        $noSponsoredAdsMessage  = "";

        $ads = userAds::where('main_catagory', $main_catagory)
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->Paginate(16);           
        
        $nuAds =  count($ads);     
        
        if($nuAds< 1){
            $no_ads_message = "Sorry, but there are currently no ads under this category. Don't panic, this website is new";
        }      

        if($nuBargains < 1){
          $noBargainsMessage = "Sorry, but there are currently no bargains under this category.";
        }

        if($nuSponsoredAds < 1){
            $noSponsoredAdsMessage  = "Sorry, but there are currently no sponsored ads under this category.";
        }  
        
        $nuImages  = $this->countNuImages($ads);
        $nuImagesBargains  = $this->countNuImages($bargains);
        $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds);

        $nuSponsoredAdsImages  = $this->countNuImages($sponsoredAds); 

        $pageDescriptionWords = $this->pageDescriptionWords($main_catagory);     

        $main_catagory = strtolower($main_catagory);
        $SEOkeywords = $this->generateSEOKeyWords($ads);
        //dd($main_catagory);

        if($main_catagory != "jobs" && $main_catagory != "services"){
           $SEOkeywords = "$SEOkeywords for sale";
        }

        $locations  = DB::table('surbubs')
                     ->orderBy('location','asc')
                     ->get();   
        $adsPerTownship = $this->countAdsPerLocation($locations); 

        $PageTitle = $this->generatePageTitleForMainCategory($main_catagory );

        $pageTitle = "$PageTitle in Western Cape | Wcocular";
        $pageDescription = "Find $SEOkeywords in Western Cape with Wcocular in minutes. We have ads related your search, posted by users from across the Western Cape";
        $keywords = "$SEOkeywords in Western Cape";

        $storedKeyword = $main_catagory;
        $storedMainCategory = $main_catagory;

       // dd($storedKeyword);

        return view('updatedAds', ['sponsoredAds'=>$sponsoredAds,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'nuImagesBargains'=>$nuImagesBargains,'sponsoredAdsPagination'=>$sponsoredAdsPagination, 'bargainsPagination'=>$bargainsPagination,'sponsoredAds'=>$sponsoredAds,'bargains'=>$bargains,'nuBargains'=>$nuBargains,'nuSponsoredAds'=>$nuSponsoredAds,'nuAds'=>$nuAds,'noBargainsMessage'=>$noBargainsMessage,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,'nuAds'=>$nuAds,'nuSponsoredAds'=>$nuSponsoredAds,'storedKeyword'=>$storedKeyword,'storedMainCategory'=>$storedMainCategory,'ads'=>$ads,'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 
               'heading'=>$heading,'pageDescription'=>$pageDescription,'pageTitle'=>$pageTitle,'keywords'=>$keywords, 'nuImages'=>$nuImages,'no_ads_message'=>$no_ads_message,'nuImages'=>$nuImages,'noBargainsMessage'=>$noBargainsMessage,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'nuImagesBargains'=>$nuImagesBargains,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'bargainsPagination'=>$bargainsPagination,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,
               'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds]);
        
    }

    //gets executed when a user view ads by category, location or main_category
    public function getBargainsAndSponsoredAds($filter){

      $functionName = "getBargainsAndSponsoredAds";
      //dd("at line 546 546, function: ".$functionName);

        $locationField = "location";
        $LocationFilter = $filter;

        if($filter == "all locations suburbs"){
            $locationField = "location_category";
            $LocationFilter = "suburb";
            $locationTitle = "All locations, suburbs";
        }
        else if($filter == "all locations townships"){
            $locationField = "location_category";
            $LocationFilter = "township";
            $locationTitle = "All locations, townships";
        }       

          $sponsoredAds = userAds::where('catagory',$filter)
                          ->where('featured','sponsored')
                          ->orWhere('main_catagory', $filter)
                          ->where('featured','sponsored')
                          ->orWhere($locationField,$LocationFilter)
                          ->where('featured','sponsored')
                          ->orderBy('created_at', 'asc')
                          ->Paginate(16);

          $firstGallerySponsoredAds = userAds::where('catagory',$filter)
                          ->where('featured','sponsored')
                          ->orWhere('main_catagory', $filter)
                          ->where('featured','sponsored')
                          ->orWhere($locationField,$LocationFilter)
                          ->where('featured','sponsored')
                          ->orderBy('created_at', 'desc')
                          ->get(); 

          $secondGallerySponsoredAds  = userAds::where('catagory',$filter)
                          ->where('featured','sponsored')
                          ->orWhere('main_catagory', $filter)
                          ->where('featured','sponsored')
                          ->orWhere($locationField,$LocationFilter)
                          ->where('featured','sponsored')
                          ->orderBy('created_at', 'asc')
                          ->get();  

          $requestURI = "?sponsored=y";
          $sponsoredAds->setPath($requestURI);
          $sponsoredAdsPagination = $sponsoredAds->links();
          $nuSponsoredAds = $sponsoredAds->total(); 

          $pageNumber = "";
          if(isset($_GET['page'])){
            $pageNumber = $_GET['page'];
          }                     
         
          if($pageNumber > $sponsoredAds->lastPage()){

              $sponsoredAds = userAds::where('catagory',$filter)
                          ->where('featured','sponsored')
                          ->orWhere('main_catagory', $filter)
                          ->where('featured','sponsored')
                          ->orWhere($locationField,$LocationFilter)
                          ->where('featured','sponsored')
                          ->orderBy('created_at', 'desc')
                          ->take(1)
                          ->get();
              //avoids laravel from displaying zero in the pagination
              //remove this line, see what heppens
              if($nuSponsoredAds < 1){
                  $sponsoredAdsPagination = "";
              }

          }
                 
          $bargains = userAds::where('catagory',$filter)
                          ->where('featured','bargain')
                          ->orWhere('main_catagory', $filter)
                          ->where('featured','bargain')
                          ->orWhere($locationField,$LocationFilter)
                          ->where('featured','bargain')
                          ->orderBy('created_at', 'desc')
                          ->Paginate(16);

          $requestURI = "?bargains=y";
          $bargains->setPath($requestURI);
          $bargainsPagination = $bargains->links();
          $nuBargains = $bargains->total(); 

          if($pageNumber > $bargains->lastPage()){

              $bargains = userAds::where('catagory',$filter)
                          ->where('featured','bargain')
                          ->orWhere('main_catagory', $filter)
                          ->where('featured','bargain')
                          ->orWhere($locationField,$LocationFilter)
                          ->where('featured','bargain')
                          ->orderBy('created_at', 'desc')
                          ->take(1)
                          ->get();
              
              //avoid laravel from displaying zero in the pagination
              //remove this line,see what happens
              if($nuBargains <1){
                 $bargainsPagination = "";
              }
          }

        return $sponsoredAdsAndBargains = array('sponsoredAds'=>$sponsoredAds,
                                                'sponsoredAdsPagination'=>$sponsoredAdsPagination,
                                                'nuSponsoredAds'=>$nuSponsoredAds,
                                                'bargains'=>$bargains,
                                                'bargainsPagination'=>$bargainsPagination,
                                                'nuBargains'=>$nuBargains,
                                                'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,
                                                'secondGallerySponsoredAds'=>$secondGallerySponsoredAds
                                              );
    }

    public function getBargainsAndSponsoredAdsBySearchItem($searchItem,$location){

        $functionName = "getBargainsAndSponsoredAdsBySearchItem";
        // dd("at: ".$functionName);
        $location = strtolower($location);
        $locationField = "";
        $categoryField = "";
        $categoryFilter = "";

        if(strstr($searchItem,"houses") && strstr($searchItem,"rent") || strstr($searchItem,"house") && strstr($searchItem,"rent") ){
            $categoryField = 'catagory';
            $categoryFilter = 'houses & flats for rent';
        }else if(strstr($searchItem,"houses") && strstr($searchItem,"sale") || strstr($searchItem,"house") && strstr($searchItem,"sale")){
            $categoryField = 'catagory';
            $categoryFilter = 'houses & flats for sale';
        }
        else if(strstr($searchItem,"shacks") && strstr($searchItem,"rent") || strstr($searchItem,"shack") && strstr($searchItem,"rent")){
            $categoryField = 'catagory';
            $categoryFilter = 'Shacks to Rent';                        
        }else if(strstr($searchItem,"shacks") && strstr($searchItem,"sale") || strstr($searchItem,"shack") && strstr($searchItem,"sale")){
            $categoryField = 'catagory';
            $categoryFilter = 'Shacks for sale';
        }else{
             $categoryField = "province";
             $categoryFilter = "Western Cape";
        }

 
        if($location == "all locations"){
            $locationField = "province";
            $filter  = "Western Cape";     
        }else if($location == "all locations,suburbs"){
            $locationField = "location_category";
            $filter = "suburb";
        }else if ($location == "all locations,townships"){
            $locationField = "location_category";
            $filter = "township";
        }else{
            $locationField = "location";
            $filter = $location;
        }      

        $searchItem = str_replace("-", " ", $searchItem);     
        $searchValues = preg_split('/\s+/',$searchItem, -1, PREG_SPLIT_NO_EMPTY);        
        
          $firstGallerySponsoredAds = userAds::where(function ($q) use ($searchValues){
            foreach ($searchValues as $value) {
                $q->orWhere('keywords', 'like', "%{$value}%");
              }
            })->where($locationField,$filter)
              ->where($categoryField,$categoryFilter)
              ->where('approved',"Approved")
              ->where('featured','sponsored')
              ->orderBy('created_at', 'desc')
              ->get();

          $secondGallerySponsoredAds = userAds::where(function ($q) use ($searchValues){
            foreach ($searchValues as $value) {
                $q->orWhere('keywords', 'like', "%{$value}%");
              }
            })->where($locationField,$filter)
              ->where($categoryField,$categoryFilter)
              ->where('approved',"Approved")
              ->where('featured','sponsored')
              ->orderBy('created_at', 'asc')
              ->get();

          $sponsoredAds = userAds::where(function ($q) use ($searchValues){
            foreach ($searchValues as $value) {
                $q->orWhere('keywords', 'like', "%{$value}%");
              }
            })->where($locationField,$filter)
            ->where('featured','sponsored')
            ->where($categoryField,$categoryFilter)  
            ->where('approved',"Approved")
            ->orderBy('created_at', 'desc')
            ->Paginate(16);


          $requestURI = "?location=$location&searchItem=$searchItem&sponsored=y";
          $sponsoredAds->setPath($requestURI);
          $sponsoredAdsPagination = $sponsoredAds->links();
          $nuSponsoredAds = $sponsoredAds->total();

          
          $pagenumber = "";
          if(isset($_GET['page'])){
             $pagenumber = $_GET['page'];
          }

          if($pagenumber > $sponsoredAds->lastPage()){

              $sponsoredAds =  userAds::where(function ($q) use ($searchValues){
                        foreach ($searchValues as $value) {
                            $q->orWhere('keywords', 'like', "%{$value}%");
                          }
                        })->where($locationField, $filter)
                          ->where($categoryField,$categoryFilter)
                          ->where('approved',"Approved")
                          ->where('featured','sponsored')
                          ->orderBy('created_at', 'desc')                         
                          ->take(1)
                          ->get();             
             // $nuSponsoredAds = count($sponsoredAds);
              if($nuSponsoredAds < 1){
                  $sponsoredAdsPagination = "";
              }

               // dd($nuSponsoredAds);

          }

          $bargains = userAds::where(function ($q) use ($searchValues){
                                foreach ($searchValues as $value) {
                                    $q->orWhere('keywords', 'like', "%{$value}%");
                                  }
                                })->where($locationField, $filter)
                                  ->where($categoryField,$categoryFilter)
                                  ->where('approved',"Approved")
                                  ->where('featured','bargain')
                                  ->orderBy('created_at', 'desc') 
                                  ->Paginate(16);

          $requestURI = "?location=$location&searchItem=$searchItem&bargains=y";
      
          $bargains->setPath($requestURI);
          $bargainsPagination = $bargains->links();
          $nuBargains = $bargains->total();     
          
          if($pagenumber > $bargains->lastPage()){
              $bargains = userAds::where(function ($q) use ($searchValues){
                                foreach ($searchValues as $value) {
                                    $q->orWhere('keywords', 'like', "%{$value}%");
                                  }
                                })->where($locationField, $filter)
                                  ->where($categoryField,$categoryFilter)
                                  ->where('approved',"Approved")
                                  ->where('featured','bargain')
                                  ->orderBy('created_at','desc') 
                                  ->take(1)
                                  ->get();
              //$nuBargains = count($bargains);
              if($nuBargains < 1){
                  $bargainsPagination = "";
              }
          }   
      return $sponsoredAdsAndBargains = array('sponsoredAds'=>$sponsoredAds,
                                                'sponsoredAdsPagination'=>$sponsoredAdsPagination,
                                                'nuSponsoredAds'=>$nuSponsoredAds,
                                                'bargains'=>$bargains,
                                                'bargainsPagination'=>$bargainsPagination,
                                                'nuBargains'=>$nuBargains,
                                                'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,
                                                'secondGallerySponsoredAds'=>$secondGallerySponsoredAds
                                                );

    }

    public function getLocationsByLocationCategory($locationCategory,$locationCategory){

        $locations  = "";
        //dd($locationCategory);
        if($locationCategory == "all locations"){
          $locations = DB::table('surbubs')
          ->orderBy('location','asc')
          ->get();
          
        }else if($locationCategory === "township"){
            $locations = DB::table('locations')
                        ->where('province', $locationCategory)
                        ->orderBy('location','asc')
                        ->get();
        }
        else{
            $locations = DB::table('surbubs')
            ->where('province','like', '%'.$locationCategory.'%')
            ->orderBy('location','asc')
            ->get();
        }  

        return $locations;
    }

    public function pageDescriptionWords($main_catagory){

        $pageDescriptionWords = "";
        if($main_catagory == "Vehicles" || $main_catagory == "vehicles"){
           $pageDescriptionWords = " Used cars,Car Parts,Motorbike Parts,and Vintage Cars for sale";
        }else if($main_catagory == "shacks" || $main_catagory == "shacks"){
           $pageDescriptionWords = "shack for sale and Shacks to rent";
        }else if($main_catagory == "Property" || $main_catagory == "property"){
           $pageDescriptionWords = "Property for sale and property to rent";
        }else{
           $pageDescriptionWords = $main_catagory;
        }   
        
      return $pageDescriptionWords;   
    }

    public function topAdsAndBargain(){
        $ads = userAds::where('featured', "bagain")
            ->where('approved',"Approved")
            ->orWhere('featured', "agent-ad")
            ->limit(8)
            ->get();

            return $ads;

    }

    public function getBargainsAndSponsoredAdsByItemCatLocCategory($searchItem,$catagory,$locationCategory){
        
        $category = strtolower($_GET['category']);
        $categoryField = "catagory";
        $categoryFilter = $category;

        $mainCategories  = DB::table('categories')->get();
        foreach ($mainCategories as $mainCategory){
            if($category == strtolower($mainCategory->category)){
                 $categoryField = "main_catagory";
            }
        }

        if($category == "all categories"){
          $categoryField = "approved";
          $categoryFilter = "Approved";
        }

        $field = "";
        $filter = "";
        if($locationCategory == "all locations"){
          $field = "province";
          $filter = "Western Cape";
        }else{
          $field = "location_category";
          $filter = $locationCategory;
        }

        if(strstr($searchItem,"houses") && strstr($searchItem,"rent") || strstr($searchItem,"house") && strstr($searchItem,"rent") ){
            $categoryField = 'catagory';
            $categoryFilter = 'houses & flats for rent';
        }else if(strstr($searchItem,"houses") && strstr($searchItem,"sale") || strstr($searchItem,"house") && strstr($searchItem,"sale")){
            $categoryField = 'catagory';
            $categoryFilter = 'houses & flats for sale';
        }
        else if(strstr($searchItem,"shacks") && strstr($searchItem,"rent") || strstr($searchItem,"shack") && strstr($searchItem,"rent")){
            $categoryField = 'catagory';
            $categoryFilter = 'Shacks to Rent';                        
        }else if(strstr($searchItem,"shacks") && strstr($searchItem,"sale") || strstr($searchItem,"shack") && strstr($searchItem,"sale")){
            $categoryField = 'catagory';
            $categoryFilter = 'Shacks for sale';
        }else{
             $categoryField = "province";
             $categoryFilter = "Western Cape";
        }

      $searchValues = preg_split('/\s+/', $searchItem, -1, PREG_SPLIT_NO_EMPTY);    

       $sponsoredAds = userAds::where(function ($q) use ($searchValues) {
                      foreach ($searchValues as $value) {
                        $q->orWhere('keywords', 'like', "%{$value}%");
                      }
                      })->where($categoryField,'like','%'.$categoryFilter.'%')
                        ->where($field, $filter)
                        ->where('featured','sponsored')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->Paginate(16);                 

        $firstGallerySponsoredAds = userAds::where(function ($q) use ($searchValues) {
                      foreach ($searchValues as $value) {
                        $q->orWhere('keywords', 'like', "%{$value}%");
                      }
                      })->where($categoryField,'like','%'.$categoryFilter.'%')
                        ->where($field, $filter)
                        ->where('featured','sponsored')
                        ->where("approved","Approved")
                        ->orderBy('created_at', 'desc')
                        ->get();

        $secondGallerySponsoredAds = userAds::where(function ($q) use ($searchValues) {
                      foreach ($searchValues as $value) {
                        $q->orWhere('keywords', 'like', "%{$value}%");
                      }
                      })->where($categoryField,'like','%'.$categoryFilter.'%')
                        ->where($field, $filter)
                        ->where('featured','sponsored')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'asc')
                        ->get();

          $sItem = "";

          if(isset($_GET['searchItem'])){
             $sItem = $_GET['searchItem'];
           }
         
          $loc = "";
          if(isset($_GET['location'])){
              $loc = $_GET['location']; 
          }

          $requestURI = "?searchItem=$sItem&category=$catagory&location-cat=$locationCategory&sponsored=y";
          $sponsoredAds->setPath($requestURI);
          $sponsoredAdsPagination = $sponsoredAds->links();
          $nuSponsoredAds = $sponsoredAds->total();
         
          $pageNumber = "";
          if(isset($_GET['page'])){
              $pageNumber = $_GET['page'];
          }
          
          if($pageNumber > $sponsoredAds->lastPage()){
                $sponsoredAds = userAds::where(function ($q) use ($searchValues){
                    foreach ($searchValues as $value) {
                      $q->orWhere('keywords', 'like', "%{$value}%");
                    }
                    })->where($categoryField,'like','%'.$categoryFilter.'%')
                      ->where($field, $filter)
                      ->where('featured','sponsored')
                      ->where('approved',"Approved")
                      ->orderBy('created_at', 'desc')
                      ->take(16)
                      ->get();
             
              if($nuSponsoredAds < 1 ){ 
                  $sponsoredAdsPagination = "";                
              }

          }



          $bargains = userAds::where(function ($q) use ($searchValues) {
                          foreach ($searchValues as $value) {
                            $q->orWhere('keywords', 'like', "%{$value}%");
                          }
                          })->where($categoryField,'like','%'.$categoryFilter.'%')
                        ->where($field, $filter)
                        ->where('featured','bargain')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->Paginate(16);

          $requestURI = "?searchItem=$sItem&category=$catagory&location-cat=$locationCategory&&bargains=y";
          $bargains->setPath($requestURI);
          $bargainsPagination = $bargains->links();
          $nuBargains = $bargains->total();           
          
          if($pageNumber > $bargains->lastPage()){
              $bargains = userAds::where(function ($q) use ($searchValues) {
                          foreach ($searchValues as $value) {
                            $q->orWhere('keywords', 'like', "%{$value}%");
                          }
                          })->where($categoryField,'like','%'.$categoryFilter.'%')
                         ->where($field, $filter)
                        ->where('featured','bargain')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->take(16)
                        ->get();
              // $nuBargains = count($bargains);
               if($nuBargains < 1){
                  $bargainsPagination = "";
               }
          }

          return $sponsoredAdsAndBargains = array('sponsoredAds'=>$sponsoredAds,
                                                'sponsoredAdsPagination'=>$sponsoredAdsPagination,
                                                'nuSponsoredAds'=>$nuSponsoredAds,
                                                'bargains'=>$bargains,
                                                'bargainsPagination'=>$bargainsPagination,
                                                'nuBargains'=>$nuBargains,
                                                'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,
                                                'secondGallerySponsoredAds'=>$secondGallerySponsoredAds
                                                );

    }

    public function getBargainsAndSponsoredAdsByCatLocation($catagory,$location){

        $locationField = "location";
        $locationFilter = $location;

        if($location == "all locations suburbs"){
            $locationField = "location_category";
            $locationFilter = "suburb";
            $locationTitle = "All locations, suburbs";
        }
        else if($location == "all locations townships"){
            $locationField = "location_category";
            $locationFilter = "township";
            $locationTitle = "All locations, townships";
        }
        
        $sponsoredAds = userAds::where('catagory',$catagory)
                        ->where($locationField,$locationFilter)
                        ->where('featured','sponsored')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->Paginate(16);                 

     
        $firstGallerySponsoredAds = userAds::where('catagory','like', '%'.$catagory.'%')
                        ->where($locationField,$locationFilter)
                        ->where('featured','sponsored')
                        ->where("approved","Approved")
                        ->orderBy('created_at', 'desc')
                        ->get();

        $secondGallerySponsoredAds = userAds::where('catagory','like', '%'.$catagory.'%')
                        ->where($locationField,$locationFilter)
                        ->where('featured','sponsored')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'asc')
                        ->get();

          $sItem = "";

          if(isset($_GET['searchItem'])){
             $sItem = $_GET['searchItem'];
           }
         
          $loc = "";
          if(isset($_GET['location'])){
              $loc = $_GET['location']; 
          }
        
          $requestURI = "?sponsored=y";
          $sponsoredAds->setPath($requestURI);
          $sponsoredAdsPagination = $sponsoredAds->links();
          $nuSponsoredAds = $sponsoredAds->total();

          $pageNumber = "";
          if(isset($_GET['page'])){
              $pageNumber = $_GET['page'];

          }
          if($pageNumber > $sponsoredAds->lastPage()){

              $sponsoredAds = userAds::where('catagory','like', '%'.$catagory.'%')
                        ->where($locationField,$locationFilter)
                        ->where('featured','sponsored')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->take(16)
                        ->get();
             
              if($nuSponsoredAds < 1 ){ 
                  $sponsoredAdsPagination = "";                
              }

          }

          $bargains = userAds::where('catagory',$catagory)
                        ->where('featured','bargain')
                        ->where($locationField,$locationFilter)
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->Paginate(16);

          $requestURI = "?bargains=y";
          $bargains->setPath($requestURI);
          $bargainsPagination = $bargains->links();
          $nuBargains = $bargains->total();           
          
          if($pageNumber > $bargains->lastPage()){
           //
              $bargains = userAds::where('catagory',$catagory)
                           ->where($locationField,$locationFilter)
                        ->where('featured','bargain')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->take(4)
                        ->get();
              // $nuBargains = count($bargains);
               if($nuBargains < 1){
                  $bargainsPagination = "";
               }
          }

          return $sponsoredAdsAndBargains = array('sponsoredAds'=>$sponsoredAds,
                                                'sponsoredAdsPagination'=>$sponsoredAdsPagination,
                                                'nuSponsoredAds'=>$nuSponsoredAds,
                                                'bargains'=>$bargains,
                                                'bargainsPagination'=>$bargainsPagination,
                                                'nuBargains'=>$nuBargains,
                                                'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,
                                                'secondGallerySponsoredAds'=>$secondGallerySponsoredAds
                                                );

    }

    public function getBargainsAndSponsoredAdsByItemMainCatLoc($category,$location){

        $location = str_replace("-"," ",$location);
        $locationField = "location";
        $locationFilter = $location;

        if($location == "all locations suburbs"){
            $locationField = "location_category";
            $locationFilter = "suburb";
            $locationTitle = "All locations, suburbs";
        }
        else if($location == "all locations townships"){
            $locationField = "location_category";
            $locationFilter = "township";
            $locationTitle = "All locations, townships";
        }

        $sponsoredAds = userAds::where('main_catagory',$category)
                        ->where($locationField,$locationFilter)
                        ->where('featured','sponsored')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->Paginate(16);                 

        $firstGallerySponsoredAds = userAds::where('main_catagory','like', '%'.$category.'%')
                        ->where($locationField,$locationFilter)
                        ->where('featured','sponsored')
                        ->where("approved","Approved")
                        ->orderBy('created_at', 'desc')
                        ->get();

        $secondGallerySponsoredAds = userAds::where('main_catagory','like', '%'.$category.'%')
                        ->where($locationField,$locationFilter)
                        ->where('featured','sponsored')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'asc')
                        ->get();

        
          $requestURI = "?sponsored=y";
          $sponsoredAds->setPath($requestURI);
          $sponsoredAdsPagination = $sponsoredAds->links();
          $nuSponsoredAds = $sponsoredAds->total();



          $pageNumber = "";
          if(isset($_GET['page'])){
              $pageNumber = $_GET['page'];

          }

           if($pageNumber > $sponsoredAds->lastPage()){

              $sponsoredAds = userAds::where('main_catagory','like', '%'.$category.'%')
                        ->where('featured','sponsored')
                        ->where($locationField,$locationFilter)
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->take(16)
                        ->get();
             
              if($nuSponsoredAds < 1 ){ 
                  $sponsoredAdsPagination = "";                
              }

          }

          $bargains = userAds::where('main_catagory',$category)
                          ->where('location',$location)
                        ->where('featured','bargain')
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
                        ->Paginate(16);

          $requestURI = "?bargains=y";
          $bargains->setPath($requestURI);
          $bargainsPagination = $bargains->links();
          $nuBargains = $bargains->total();           
          
          if($pageNumber > $bargains->lastPage()){
           //
              $bargains = userAds::where('main_catagory',$category)
                          ->where($locationField,$locationFilter)
                          ->where('featured','bargain')
                          ->where('approved',"Approved")
                          ->orderBy('created_at', 'desc')
                          ->take(4)
                          ->get();
              // $nuBargains = count($bargains);
               if($nuBargains < 1){
                  $bargainsPagination = "";
               }
          }

          return $sponsoredAdsAndBargains = array('sponsoredAds'=>$sponsoredAds,
                                                'sponsoredAdsPagination'=>$sponsoredAdsPagination,
                                                'nuSponsoredAds'=>$nuSponsoredAds,
                                                'bargains'=>$bargains,
                                                'bargainsPagination'=>$bargainsPagination,
                                                'nuBargains'=>$nuBargains,
                                                'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,
                                                'secondGallerySponsoredAds'=>$secondGallerySponsoredAds
                                                );

    }

    public function displayAdsByMainCatLoc($catagory,$loc){  

        $no_ads_message = "";
       // dd($searchItem."--".$loc."--".$suburbOrTownship."--".$catagory."--".$locationCategory);
       // dd($catagory."---".$suburbOrTownship."---".$locationCategory);
        $location = str_replace("-"," ",$loc);
        $locationField = "location";
        $locationFilter = $location;

        $locationTitle = $location;
        if($location == "all locations suburbs"){
            $locationField = "location_category";
            $locationFilter = "suburb";
            $locationTitle = "All locations, suburbs";
        }
        else if($location == "all locations townships"){
            $locationField = "location_category";
            $locationFilter = "township";
            $locationTitle = "All locations, townships";
        }

        $ads = userAds::where('main_catagory','like', '%'.$catagory.'%')
          ->where($locationField,'like', '%'.$locationFilter.'%')
          ->where('approved',"Approved")
          ->orderBy('created_at', 'desc')
          ->Paginate(16);  

        $bargainsAndSponsoredAds = $this->getBargainsAndSponsoredAdsByItemMainCatLoc($catagory,$location);

        $sponsoredAds = $bargainsAndSponsoredAds['sponsoredAds'];
        $sponsoredAdsPagination = $bargainsAndSponsoredAds['sponsoredAdsPagination'];
        $nuSponsoredAds = $bargainsAndSponsoredAds['nuSponsoredAds'];

        $bargains = $bargainsAndSponsoredAds['bargains'];
        $bargainsPagination = $bargainsAndSponsoredAds['bargainsPagination'];
        $nuBargains = $bargainsAndSponsoredAds['nuBargains'];
        $firstGallerySponsoredAds = $bargainsAndSponsoredAds['firstGallerySponsoredAds'];
        $secondGallerySponsoredAds = $bargainsAndSponsoredAds['secondGallerySponsoredAds'];

        $noBargainsMessage = "";
        $location = ucfirst($loc);

        if($nuBargains < 1){                 
            $noBargainsMessage = "Sorry, but there are currently no bargains under this category in $locationTitle.";
        }

        $noSponsoredAdsMessage = "";
        if($nuSponsoredAds < 1){
            $noSponsoredAdsMessage  = "Sorry, but there are currently no sponsored ads under this category in $locationTitle.";
        }   

        if(count($ads) < 1){
            $no_ads_message = "Sorry, but we there are currrently no ".$catagory." in ".ucfirst($loc).", don't panic this website is new.";
        }

        $locations = DB::table('surbubs')
        ->orderBy('location','asc')
        ->get();
      
     
        $adsPerTownship = $this->countAdsPerLocation($locations); 
        $nuImages  = $this->countNuImages($ads); 
        $nuImagesBargains  = $this->countNuImages($bargains);
        $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds);
       // ($location == null && $catagory != null && $locationCategory!=null && $suburbOrTownship !=null)      
        $heading =  "<a href='#' class='current'><span>".ucfirst($catagory)." in</span></a><span class='cityName'>". $location ."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                  data-toggle='modal'> <span
                                              class='caret'></span> change location</a>";

        $storedKeyword = $catagory;
        $storedMainCategory = $catagory; 

        $catagory = ucfirst($catagory);
        $loc = ucfirst($loc);
        $pageTitle = "$catagory for sale in $loc, Western Cape | Wcocular";
        $pageDescription = "$catagory for sale in $loc, Western Cape. Find $catagory in Western Cape with Kasocular wherever you are whenever you want.";
        $keywords = "$catagory for sale in $loc, Western Cape";

        return view('updatedAds', ['firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds,'sponsoredAds'=>$sponsoredAds,'bargainsPagination'=>$bargainsPagination,'sponsoredAdsPagination'=>$sponsoredAdsPagination,'nuSponsoredAds'=>$nuSponsoredAds,'bargains'=>$bargains,'nuBargains'=>$nuBargains,'nuImagesBargains'=>$nuImagesBargains,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'noBargainsMessage'=>$noBargainsMessage,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,'storedMainCategory'=>$storedMainCategory,'storedKeyword'=>$storedKeyword,'ads'=>$ads,'pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'keywords'=>$keywords],['locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message]);
     }

     public function displayAdsByCatLoc($category,$loc){
        
        $location = str_replace("-"," ",$loc);
        $locationField = "location";
        $locationFilter = $location;

        $locationTitle = $location;
        if($location == "all locations suburbs"){
            $locationField = "location_category";
            $locationFilter = "suburb";
            $locationTitle = "All locations, suburbs";
        }
        else if($location == "all locations townships"){
            $locationField = "location_category";
            $locationFilter = "township";
            $locationTitle = "All locations, townships";
        }
    
      
        $locations = DB::table('surbubs')
            ->orderBy('location','asc')
            ->get();

        $loc = str_replace("-", " ", $loc);
        $category = str_replace("-"," ", $category);

        $no_ads_message = "";     

        //dd($searchItem."--".$townshipOrSuburb."--".$main_catagory."--".$province);

        $ads = userAds::where('catagory','like','%'.$category.'%')
          ->where($locationField,$locationFilter)
          ->where('approved',"Approved")
          ->orderBy('created_at', 'desc')
          ->Paginate(16);

        $bargainsAndSponsoredAds = $this->getBargainsAndSponsoredAdsByCatLocation($category,$location);

        $sponsoredAds = $bargainsAndSponsoredAds['sponsoredAds'];
        $sponsoredAdsPagination = $bargainsAndSponsoredAds['sponsoredAdsPagination'];
        $nuSponsoredAds = $bargainsAndSponsoredAds['nuSponsoredAds'];

        $bargains = $bargainsAndSponsoredAds['bargains'];
        $bargainsPagination = $bargainsAndSponsoredAds['bargainsPagination'];
        $nuBargains = $bargainsAndSponsoredAds['nuBargains']; 
        $firstGallerySponsoredAds = $bargainsAndSponsoredAds['firstGallerySponsoredAds'];
        $secondGallerySponsoredAds = $bargainsAndSponsoredAds['secondGallerySponsoredAds'];

        $noBargainsMessage = "";
        $nuBargains = count($bargains);
        $location = ucfirst($loc);
        if($nuBargains < 1){                 
            $noBargainsMessage = "Sorry, but there are currently no bargains under this category in $locationTitle.";
        }
       
        $noSponsoredAdsMessage = "";
        if($nuSponsoredAds < 1){
            $noSponsoredAdsMessage  = "Sorry, but there are currently no sponsored ads under this category in $locationTitle.";
        }

        $nuAds = count($ads);
        if($nuAds < 1){
            $no_ads_message = "Sorry, but we there are currrently no ".$category." in ".ucfirst($loc).", don't panic this website is new.";
        }

        $adsPerTownship = $this->countAdsPerLocation($locations); 
        $nuImages  = $this->countNuImages($ads); 
        $nuImagesBargains  = $this->countNuImages($bargains);
        $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds);  

        $locationCategory = null;     
        $heading = "<a href='#' class='current'><span>".ucfirst($category) ." in</span></a><span class='cityName'>".ucfirst($loc)."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span> change location</a>";

        //displayAdsByItemCatLoc
         
         $SEOkeywords = $this->generateSEOKeyWords($ads);

         $pageTitle = "Second hand goods for sale Western Cape | Wcocular";
         $pageDescription = "$SEOkeywords for sale in $location. Find second hand goods online with Kasocular";
         $keywords = "$SEOkeywords for sale in $location"; 

         $storedCategory = $category;



        return view('updatedAds', ['firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'nuImagesBargains'=>$nuImagesBargains,'sponsoredAdsPagination'=>$sponsoredAdsPagination, 'bargainsPagination'=>$bargainsPagination,'sponsoredAds'=>$sponsoredAds,'bargains'=>$bargains,'nuBargains'=>$nuBargains,'nuSponsoredAds'=>$nuSponsoredAds,'noBargainsMessage'=>$noBargainsMessage,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,'nuAds'=>$nuAds,'nuSponsoredAds'=>$nuSponsoredAds,'storedCategory'=>$storedCategory,'pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'keywords'=>$keywords,'ads'=>$ads,'locationCategory'=>$locationCategory],['locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages, 'no_ads_message'=>$no_ads_message]);
    }

	public function displayAdsByItemCatLocCategory(Request $request){

      $category = strtolower($_GET['category']);
      $categoryField = "catagory";
      $categoryFilter = $category;

      $mainCategories  = DB::table('categories')->get();

      foreach ($mainCategories as $mainCategory){
        if($category == strtolower($mainCategory->category)){
             $categoryField = "main_catagory";
        }
      }

      if($category == "all categories"){
          $categoryField = "approved";
          $categoryFilter = "Approved";
      }

      $searchItem = $_GET['searchItem'];
      $locationCategory = strtolower(Input::get('location-cat')); 
      if($locationCategory === "townships"){
          $locationCategory = "township";

      }else if ($locationCategory === "suburbs"){
          $locationCategory = "suburb";
      } 

      $locationField = "location_category";
      $locationFilter = "";
      if($locationCategory == "all locations"){
          $locationField = "province";
          $locationFilter = "Western Cape";
      }else{
          $locationField= "location_category";
          $locationFilter = $locationCategory;
      }

      if(strstr($searchItem,"houses") && strstr($searchItem,"rent") || strstr($searchItem,"house") && strstr($searchItem,"rent") ){
            $categoryField = 'catagory';
            $categoryFilter = 'houses & flats for rent';
        }else if(strstr($searchItem,"houses") && strstr($searchItem,"sale") || strstr($searchItem,"house") && strstr($searchItem,"sale")){
            $categoryField = 'catagory';
            $categoryFilter = 'houses & flats for sale';
        }
        else if(strstr($searchItem,"shacks") && strstr($searchItem,"rent") || strstr($searchItem,"shack") && strstr($searchItem,"rent")){
            $categoryField = 'catagory';
            $categoryFilter = 'Shacks to Rent';                        
        }else if(strstr($searchItem,"shacks") && strstr($searchItem,"sale") || strstr($searchItem,"shack") && strstr($searchItem,"sale")){
            $categoryField = 'catagory';
            $categoryFilter = 'Shacks for sale';
        }else{
             $categoryField = "province";
             $categoryFilter = "Western Cape";
        }

     
      
      $searchValues = preg_split('/\s+/', $searchItem, -1, PREG_SPLIT_NO_EMPTY);    

      $no_ads_message = "";
      $ads = userAds::where(function ($q) use ($searchValues) {
        foreach ($searchValues as $value) {
          $q->orWhere('keywords', 'like', "%{$value}%");
        }
      })->where($categoryField,'like', '%'.$categoryFilter.'%')
        ->where($locationField,'like', '%'.$locationFilter.'%')
        ->where('approved',"Approved")        
        ->orderBy('created_at', 'desc')
        ->Paginate(16);
        
        $locations = " ";
        if($locationCategory === "township"){
            $locations = DB::table('locations')
                        ->orderBy('location', "asc")
                        ->get();
        }
        else{
            $locations = DB::table('surbubs')
            ->orderBy('location', "asc")
            ->get();
        }
        $searchItem = $_GET['searchItem'];
        $bargainsAndSponsoredAds = $this->getBargainsAndSponsoredAdsByItemCatLocCategory($searchItem,$category,$locationCategory);
        $sponsoredAds = $bargainsAndSponsoredAds['sponsoredAds'];
        $sponsoredAdsPagination = $bargainsAndSponsoredAds['sponsoredAdsPagination'];
        $nuSponsoredAds = $bargainsAndSponsoredAds['nuSponsoredAds'];
        $firstGallerySponsoredAds = $bargainsAndSponsoredAds['firstGallerySponsoredAds'];
        $secondGallerySponsoredAds = $bargainsAndSponsoredAds['secondGallerySponsoredAds'];

        $bargains = $bargainsAndSponsoredAds['bargains'];
        $bargainsPagination = $bargainsAndSponsoredAds['bargainsPagination'];
        $nuBargains = $bargainsAndSponsoredAds['nuBargains']; 



        $noBargainsMessage = "";
        if($nuBargains < 1){ 
            $locationCategory = ucfirst($locationCategory);             
            $noBargainsMessage = "Sorry, but there are currently no bargains under this category in $locationCategory.";
        }

        $noSponsoredAdsMessage = "";
        if($nuSponsoredAds < 1){
            $locationCategory = ucfirst($locationCategory); 
            $noSponsoredAdsMessage  = "Sorry, but there are currently no sponsored ads under this category in $locationCategory.";
        } 
       
        if(count($ads) < 1){
            $no_ads_message = "Sorry, but we didn't find any ads that match your search criteria, don't panic this website is new.";
        }        

        $main_categories = DB::table('catagories')->get();
        $adsPerTownship = $this->countAdsPerLocation($locations);
        $adsPerCategory = $this->countAdsPerCatagory($main_categories);

    	  $nuImages  = $this->countNuImages($ads);
        $nuImagesBargains  = $this->countNuImages($bargains);
        $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds); 

        $locationCategory = Input::get('location-cat');
        $heading =  $heading = "<a href='#' class='current'><span>Ads related to your seach in Western Cape, </span></a><span class='cityName'>".ucfirst($locationCategory)."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                      data-toggle='modal'> <span
                                                  class='caret'></span> change location</a>";   
        
        $SEOkeywords = $this->generateSEOKeyWords($ads);

        $searchItem = $_GET['searchItem'];

        $category = urlencode($category);
      //  dd($catagory);
        $requestURI = "?searchItem=$searchItem&category=$category&location-cat=$locationCategory";
        $ads->setPath($requestURI);

       $pageTitle = "Second hand good for Sale in Western Cape | Wcocular";
       $pageDescription = "$SEOkeywords for sale in All locations, $locationCategory. Find second hand goods online with Kasocular";
       $keywords = "$SEOkeywords for sale in All locations, $locationCategory";  

       return view('updatedAds', ['searchItem'=>$searchItem,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds,'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'sponsoredAds'=>$sponsoredAds,'sponsoredAdsPagination'=>$sponsoredAdsPagination,'nuSponsoredAds'=>$nuSponsoredAds,'bargains'=>$bargains,'nuBargains'=>$nuBargains,'nuImagesBargains'=>$nuImagesBargains,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'noBargainsMessage'=>$noBargainsMessage,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,'pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,
          'keywords'=>$keywords,'ads'=>$ads,'locationCategory'=>$locationCategory,'searchItem'=>$searchItem,'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'heading'=>$heading,'nuImages'=>$nuImages,'no_ads_message'=>$no_ads_message,'noBargainsMessage'=>$noBargainsMessage,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'bargainsPagination'=>$bargainsPagination,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage]);
	}

    public function displayAdsSubCategories($category, Request $r){

    	$category = str_replace("-", " ", $category);
      $locations = DB::table('locations')
       ->orderBy('location', "asc")
       ->get();
    	$adsPerTownship = $this->countAdsPerLocation($locations);
    	$locationCategory = Input::get('searchItem');    	

    	$heading = $this->displayHeading($location=null,$category,$locationCategory = null,$township=null);      	
      $ads = userAds::where('catagory','like', $category)
                        ->where('approved',"Approved")
                        ->orderBy('created_at', 'desc')
			            ->Paginate(16);

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

    public function displayHeading($location,$catagory,$locationCategory, $suburbOrTownship){
    	if($location != null && $locationCategory==Null && $catagory == null ){
    		return "<a href='#' class='current'><span>All ads in</span></a><span class='cityName'>".ucfirst($location)."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span> change location</a>";
    	}
    	else if($location == null && $catagory != null && $locationCategory!=null && $suburbOrTownship==null ){
          $prefix = "";
          if($locationCategory != "All locations"){
              $prefix  = "All locations - ";
          }

      		return "<a href='#' class='current'><span>".ucfirst($catagory)." in</span></a><span class='cityName'> $prefix". $locationCategory ."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                  data-toggle='modal'> <span
                                              class='caret'></span> change location</a>";
    	}
        else if($location == null && $catagory != null && $locationCategory!=null && $suburbOrTownship !=null){
            return "<a href='#' class='current'><span>".ucfirst($catagory) ." in</span></a><span class='cityName'>".ucfirst($suburbOrTownship)."</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span> change location</a>";
        }
        else if($catagory != null && $location == null && $locationCategory == null && $suburbOrTownship == null){
            return "<a href='#' class='current'><span>". ucfirst($catagory ) ." in</span></a><span class='cityName'>Wetern Cape, All locations</span> <a href='#selectRegion' id='dropdownMenu1'
                                                                                data-toggle='modal'> <span
                                            class='caret'></span> change location</a>";
        }        
        else if($catagory == null && $location == null && $locationCategory != null && $suburbOrTownship == null){
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

        $bargainsAndSponsoredAds = $this->getBargainsAndSponsoredAds($location);

        $sponsoredAds = $bargainsAndSponsoredAds['sponsoredAds'];
        $sponsoredAdsPagination = $bargainsAndSponsoredAds['sponsoredAdsPagination'];
        $nuSponsoredAds = $bargainsAndSponsoredAds['nuSponsoredAds'];

        $firstGallerySponsoredAds = $bargainsAndSponsoredAds['firstGallerySponsoredAds'];
        $secondGallerySponsoredAds = $bargainsAndSponsoredAds['secondGallerySponsoredAds'];



        $bargains = $bargainsAndSponsoredAds['bargains'];
        $bargainsPagination = $bargainsAndSponsoredAds['bargainsPagination'];
        $nuBargains = $bargainsAndSponsoredAds['nuBargains'];

        $locations = DB::table('locations')
                ->where('province',$location)
                ->orderBy('location', "asc")
                ->get();
        //if location is not a Province
        if(count($locations) < 1){

              //if location is a township
            $township = DB::table('locations')->where('location',$location)->first();
              //grab a province from the results of the above query

            if(count($township) >0){
                  $locationCategory = $township->province;
                  //return locations
                  $locations = DB::table('locations')->where('province',$locationCategory)
                   ->orderBy('location', "asc")
                   ->get();
            }          
               
            //if location is a suburb, repeat the above algorythem to get suburbs
            if(count($locations) < 1){
                  $surbub = DB::table('surbubs')->where('location',$location)->first();
                  if(count($surbub) > 0){
                      $locationCategory = $surbub->province;
                      $locations = DB::table('surbubs')
                       ->orderBy('location', "asc")
                       ->where('province',$locationCategory)->get();
                  }           
            }                     
        } 
          
        //when a hacker messes with my website by entering a gabbige location 
        //on the url bar...take him to the previous page with valid location
        if(count($locations) < 1){
          //return back()->withInput();
        }

        $adsPerTownship = $this->countAdsPerLocation($locations);
        $heading = $this->displayHeading($location,$catagory = null,$locationCategory = null, $township=null);
        
        $no_ads_message = "";
        $locationField = "location";
        $locationTitle = $location;
        $LocationFilter = $location;

        if($location == "all locations suburbs"){
            $locationField = "location_category";
            $LocationFilter = "suburb";
            $locationTitle = "All locations, suburbs";
        }
        else if($location == "all locations townships"){
            $locationField = "location_category";
            $LocationFilter = "township";
            $locationTitle = "All locations, townships";
        }       

        
        $ads = userAds::where($locationField,'like', $LocationFilter)
                              ->where('approved',"Approved")
                              ->orderBy('created_at', 'desc')
    			              ->Paginate(16);

        $location = ucfirst($location);
    		if(count($ads) < 1){
                $no_ads_message = "Sorry but there are currently no ads in $locationTitle. Don't panic this website is new";
        }         
        
        $noBargainsMessage = "";
        $nuBargains = count($bargains);
        if($nuBargains < 1){                 
            $noBargainsMessage = "Sorry, but there are currently no bargains $locationTitle";
        }
     

        $noSponsoredAdsMessage = "";
        if($nuSponsoredAds < 1){
            $noSponsoredAdsMessage  = "Sorry, but there are currently no sponsored ads in $locationTitle.";
        }      

        $nuImages  = $this->countNuImages($ads);
        $nuImagesBargains  = $this->countNuImages($bargains);
        $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds);  

        $SEOkeywords = $this->generateSEOKeyWords($ads);

    
        $pageTitle = "Second hand goods for sale in $location | Wcocular";
        $pageDescription = "$SEOkeywords for sale in $location. Find second hand goods online with Kasocular";
        $keywords = "$SEOkeywords for sale in $location";     
        
        return view('updatedAds', ['firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds,'sponsoredAds'=>$sponsoredAds,'sponsoredAdsPagination'=>$sponsoredAdsPagination,'nuSponsoredAds'=>$nuSponsoredAds,'bargains'=>$bargains,'nuBargains'=>$nuBargains,'nuImagesBargains'=>$nuImagesBargains,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'noBargainsMessage'=>$noBargainsMessage,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage,'ads' => $ads, 'pageTitle'=>$pageTitle, 'pageDescription'=>$pageDescription,'keywords'=>$keywords, 'locations'=>$locations, 'adsPerTownship'=>$adsPerTownship, 'no_ads_message'=>$no_ads_message,
                'heading'=>$heading,'nuImages'=>$nuImages,'noBargainsMessage'=>$noBargainsMessage,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'bargainsPagination'=>$bargainsPagination,'noSponsoredAdsMessage'=>$noSponsoredAdsMessage]);
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
                       ->Paginate(16); 

      $locations = DB::table('locations')
                        ->where('province', 'Western Cape')
                        ->orderBy('location', "asc")
                        ->get();

       $sponsoredAds = userAds::where('featured','sponsored')
                          ->orderBy('created_at', 'asc')
                          ->Paginate(16);

          $firstGallerySponsoredAds = userAds::where('featured','sponsored')
                          ->orderBy('created_at', 'desc')
                          ->get(); 

          $secondGallerySponsoredAds  = userAds::where('featured','sponsored')
                          ->orderBy('created_at', 'asc')
                          ->get();  

          $requestURI = "?sponsored=y";
          $sponsoredAds->setPath($requestURI);
          $sponsoredAdsPagination = $sponsoredAds->links();
          $nuSponsoredAds = $sponsoredAds->total(); 

          $pageNumber = "";
          if(isset($_GET['page'])){
            $pageNumber = $_GET['page'];
          }                     
         
          if($pageNumber > $sponsoredAds->lastPage()){

              $sponsoredAds = userAds::where('featured','sponsored')
                          ->orderBy('created_at', 'desc')
                          ->take(16)
                          ->get();
              //avoids laravel from displaying zero in the pagination
              //remove this line, see what heppens
              if($nuSponsoredAds < 1){
                  $sponsoredAdsPagination = "";
              }

          }
                 
          $bargains = userAds::where('featured','bargain')
                          ->orderBy('created_at', 'desc')
                          ->Paginate(16);

          $requestURI = "?bargains=y";
          $bargains->setPath($requestURI);
          $bargainsPagination = $bargains->links();
          $nuBargains = $bargains->total(); 

          if($pageNumber > $bargains->lastPage()){

              $bargains = userAds::where('featured','bargain')
                          ->orderBy('created_at', 'desc')
                          ->take(16)
                          ->get();
              
              //avoid laravel from displaying zero in the pagination
              //remove this line,see what happens
              if($nuBargains <1){
                 $bargainsPagination = "";
              }
          }


      $adsPerTownship = $this->countAdsPerLocation($locations);
      $nuImages  = $this->countNuImages($ads);
      $nuImagesBargains  = $this->countNuImages($bargains);
      $nuImagesSponsoredAds = $this->countNuImages($sponsoredAds);
      $heading = $this->displayHeading($location=null,$catagory = null,$locationCategory = "All locations", $township = null);
      
      $SEOkeywords = $this->generateSEOKeyWords($ads);
      $pageTitle = "Cars,Houses to rent, computers & laptops for sale in Western Cape | Wcocular";
      $pageDescription = "$SEOkeywords for sale in Western Cape. Find second hands with Kasocular";
      $keywords = "$SEOkeywords for sale in Western Cape"; 

    	return view('updatedAds', ['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'keywords'=>$keywords,'ads' => $ads,'locations'=>$locations,'adsPerTownship'=>$adsPerTownship, 'nuImages'=>$nuImages,'heading'=>$heading,'no_ads_message'=>$no_ads_message,
        'sponsoredAds'=>$sponsoredAds,'firstGallerySponsoredAds'=>$firstGallerySponsoredAds,'secondGallerySponsoredAds'=>$secondGallerySponsoredAds
        ,'bargains'=>$bargains,'nuSponsoredAds'=>$nuSponsoredAds,'nuBargains'=>$nuBargains,'nuImagesBargains'=>$nuImagesBargains,'nuImagesSponsoredAds'=>$nuImagesSponsoredAds,'bargainsPagination'=>$bargainsPagination,'sponsoredAdsPagination'=>$sponsoredAdsPagination]);
	}
   
}
