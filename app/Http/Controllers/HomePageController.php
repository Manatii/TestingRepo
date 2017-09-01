<?php

namespace App\Http\Controllers;

use App\Catagory;
use App\Locations;
use App\Provinces;
use App\UserAds;
use DB;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function displaycatagories(){
    	$categories = DB::table('categories')->get();
    	$subCategories = DB::table('subcategory')
            ->get();

        $sponsoredAds = UserAds::where('approved', "Approved")
        ->where('featured', 'Sponsored')
        ->orWhere('featured','Business Marketing')        
        ->orderBy('created_at', 'desc')->get();

    	$locations = Locations::where('province','Western Cape')->get();
    	$adsPerCategory = $this->countAdsPerCatagory($categories);

        $suburbs =  DB::table('surbubs')->orderBy('location', 'asc')->get();
        $townships = DB::table('locations')
                    ->where('province',"western cape")
                    ->orderBy('location', 'asc')
                    ->get();

        $nuSuburbs = count($suburbs);
        $nuTownships = count($townships);

        $numLocations = $nuSuburbs+$nuTownships;

        $sellers = count(DB::table('users')->get());
        $numOfCategogories = count($subCategories); 

        
    	$provinces = Provinces::All();
    	return view('main')->with('categories', $categories)->with('locations', $locations)->with('provinces', $provinces)->with('subCategories', $subCategories)
        ->with('sponsoredAds', $sponsoredAds)->with('adsPerCategory', $adsPerCategory)
        ->with('sellers',$sellers)->with('numOfCategogories',$numOfCategogories)
        ->with('suburbs', $suburbs)->with('numLocations',$numLocations)->with('townships', $townships);
    }

    function getAllCategories(){
        $categories = DB::table('categories')->get();

        return json_encode($categories);
    }

    function getSubCategoriesById(){
        $subCategories = DB::table('subcategory')
            ->get();
          //  dd(json_encode($subCategories));



        return json_encode($subCategories);
    }
    public function jQueryAdsPerCategory($category){
          $adsPerCat = DB::table('kasiads')
            ->where('main_catagory','like', "%".$category."%")
             ->where('approved',"Approved")
             ->get();

        $adsPerCategory =  count($adsPerCat);
        return $adsPerCategory;
    }

    public function countAdsPerCatagory($categories){
        $adsPerCategory = array();
        foreach($categories as $category){
            $category = $category->category;


            $adsPerCat = DB::table('kasiads')
            ->where('main_catagory','like', "%".$category."%")
             ->where('approved',"Approved")
             ->get();
               
            $countCategories = $adsPerCat->count();
            array_push($adsPerCategory, $countCategories);
        }

        return $adsPerCategory;
    }


}
