<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
     
  
    protected function create(Request $request)
    {

        $data = $request->all();
        $pref1 = substr($data['phonenumber'],3,3);
        $pref2 = substr($data['first_name'],1,3);
        $pref4 = substr($data['password'],1,2); 
        $pref = $pref1.$pref2.$pref4;
        
       
        $id = uniqid("$pref");       
    
        $user = User::create([

            'id'=>$id,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            //'manage_ads_password' => bcrypt($data['password2']),            
            'name' => $data['first_name'],
            'phonenumber' => $data['phonenumber'],
            
            'about' => $data['about'],

        ]);

        return view('registration-successful',['user'=>$user]);
    }
}
