<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use DB;
use App\UserAds;

class AccountSidBarComposer{

	public function compose(View $view){
		$categories = $this->Categories();
        $subCategories = $this->subCategories();

        $adsPerCategory = $this->countAdsPerCatagory($categories);
       

        $view->with(['categories'=>$categories,'adsPerCategory'=>$adsPerCategory]);


	}

	 public function displayUserAds(){
        
        $id = Auth::user()->id;
        $userAds = UserAds::where('user_id',$id)
         
        return $userAds;
    }

    public function displayFavouriteAds(){
        $id = Auth::user()->id;
        $fav_Ads = FavouriteAds::where('user_id', $id)->get();
        
       
        return $fav_Ads;
    }

     public function displayPendingAds(){
        $id = Auth::user()->id;

        $unApprovedAds = UserAds::where('user_id',$id)
                        ->where('approved',"Pending")->get();
       
        return $unApprovedAds;
    }



}

?>