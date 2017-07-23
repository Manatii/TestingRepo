<?php
	namespace App\Http\Composers;
	use Illuminate\Contracts\View\View;
	use DB;
	use App\UserAds;


	class sponsoredAdsComposer{
		public function compose(View $view){
			$sponsoredAds = UserAds::where('featured', 'Sponsored')
			->orWhere('featured', 'Business Marketing')->get();
			return $view->with('sponsoredAds', $sponsoredAds);
		}
		
	}

	




?>