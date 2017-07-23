<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailer;
use Mail;

class SendEmailController extends Controller
{
    //

    public function sendEmail(){
    	$name = input::get('name');
    	$from = input::get('email');
     
    	$phonenumber = input::get('phonenumber');
    	$msg = input::get('message');    

        Mail::send('sendmailToSeller', ['name'=>$name, 'from'=>$from, 'phonenumber'=>$phonenumber,'msg'=>$msg], function ($m){

      		$name = input::get('name');
      		$from = input::get('email');
            $m->from('innosela@gmail.com',$name);
            $to = input::get('seller-email');

            $m->to($to, 'innothetechgeek')->subject('kasocular ad enquiry');
            $m->replyTo($from, $name);

        });
    }
}
