<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\UserAds;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class adsDetailsController extends Controller
{
    public function displayAdsDetails($adId){
    	$adDetails = UserAds::where('adid','like', '%'.$adId.'%')
		 ->get();

		if(count($adDetails) < 1){
			return back()->withInput();
		}

		$images = DB::table('images')
			->where('adid',$adId)
			->get();

		$user_id = " ";

		foreach($adDetails as $detail){
			$user_id = $detail->user_id;
		}
		
		$userDetails = User::where('id', $user_id)->get();

		return view('adsdetails',['adDetails'=>$adDetails, 'images'=>$images, 'userDetails'=>$userDetails]);
    }

    public function backToResults(){
    	return back();
    }
    
    public function sendMailReportAd(){
    	
     	 $reason = Input::get('report-reason');
     	 $reportersEmail = Input::get('email');
     	 $message = Input::get('message-text2');

		Mail::send('sendMailReportAd', ['reason'=>$reason, 'email'=>$reportersEamil, 'message'=>$message], function ($m){

	        $m->from('innothetechgeek@gmail.com','kasocularuser');
	        $to = 'kasocular@gmail.com';         	
	       
						$userName = Auth::user()->name;
			$subject = "Ad report on kasocular";
			
		    $m->to($to, 'kasocularAdmin')->subject($subject);
	        $m->replyTo($reportersEmail, "Reporter");
    	});

    }

}
