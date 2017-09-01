<?php
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use DB;
use App\UserAds;


class SuburbsTownshipsComposer{

	public function compose(View $view){
		$suburbs = $this->Surbubs();
    $townships = $this->Townships();
    $view->with(['suburbs'=>$suburbs,'townships'=>$townships]);
	}

	public function Surbubs(){
      $suburbs = DB::table('surbubs')
      ->where('province', 'Western Cape')
      ->orderBy('location','asc')->get();
		  return $suburbs;
	}

    public function Townships(){
       $townships = DB::table('locations')
        ->where('province', 'Western Cape')
        ->orderBy('location','asc')->get();
       return $townships;
    }
}