<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use DB;
use App\UserAds;

class TopAdsComposer{

	public function compose(View $view){
		$topAdsAndBargains = $this->topAdsAndBargain();
        $nuImagesPerTopAd  = $this->countNuImages($topAdsAndBargains);
        $view->with(['topAdsAndBargains'=>$topAdsAndBargains, 'nuImagesPerTopAd'=>$nuImagesPerTopAd]);
	}


   public function topAdsAndBargain(){
        $ads = userAds::where('featured', "bagain")
            ->where('approved','Approved')
            ->orWhere('featured', "agent-ad")
            ->limit(8)
            ->get();
            return $ads;

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
}

?>