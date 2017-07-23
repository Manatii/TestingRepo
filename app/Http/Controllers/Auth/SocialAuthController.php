<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Socialize;
use Socialite;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



use Session;
use DB;




class SocialAuthController extends Controller
{
    //



    public function redirect()
    {
        return Socialite::with('facebook')->redirect();;   
    }   

    public function callback()
    {

      
        $fbUser = Socialite::with('facebook')->stateless()->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->user();

       



        $authUser = User::where('id', $fbUser->id)->first(); 


        if (!$authUser){
            
           $authUser = User::create([
            'id'=>$fbUser->getId(),
            'name'=>$fbUser->getName(),
            'email'=>$fbUser->getEmail(),           
            'avator'=>$fbUser->getAvatar(),
            'facebook_profile_url'=>$fbUser->profileUrl,
            'password'=>Hash::make("123dfd234"),
            ]);
        }

       $authUser = DB::table('users')->where('id', $fbUser->id)->first();



          $email = $authUser->email;
          $password = $authUser->password;
       


       // dd($email."----".$password);
       //$user = User::find($user_id);


      
       
        
        
       
        if(Auth::loginUsingId($authUser->id)){
            
             return redirect('/account');
        }else{
            dd("failed");
        }
       
       

      
        
       // // return redirect($this->redirectPath);


     

    }



    
}