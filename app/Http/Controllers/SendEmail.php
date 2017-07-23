<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailer;
use Mail;

class SendEmail extends Controller
{
    //

    public function sendEmail(){
    	$name = input::get('name');
    	$from = input::get('email');
      $to = input::get('seller-email');
    	$phonenumber = input::get('phonenumber');
    	$msg = input::get('message');

 

    

      Mail::send('sendmail', ['name'=>$name, 'email'=>$email, 'phonenumber'=>$phonenumber,'msg'=>$msg], function ($m){
      			$name = input::get('name');
      			$email = input::get('email');
            $m->from($email,$name);

            $m->to('innothetechgeek@gmail.com', 'innothetechgeek')->subject('kasocular ad enquiry');
        });
    }
}
