<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use DB;
use App\UserAds;

class SideBarComposer{

	public function compose(View $view){
		$categories = $this->Categories();
        $subCategories = $this->subCategories();

        $adsPerCategory = $this->countAdsPerCatagory($categories);
       

        $view->with(['categories'=>$categories,'adsPerCategory'=>$adsPerCategory]);


	}

	public function Categories(){
        $categories = DB::table('categories')->get();
		return $categories;
	}

    public function subCategories(){
       $subCategories = DB::table('subcategory')->get();
       return $subCategories;
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

?>