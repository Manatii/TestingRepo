<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use DB;
use App\UserAds;

class SelectBoxCategoriesComposer{
	public function compose(View $view){

		$categories = $this->Categories();
        $subCategories = $this->subCategories();
      	$view->with(['categories'=>$categories, 'subCategories'=>$subCategories]);
	}

	public function Categories(){
        $categories = DB::table('categories')->get();
		return $categories;
	}

	public function subCategories(){
       $subCategories = DB::table('subcategory')->get();
       return $subCategories;
    }

}

?>