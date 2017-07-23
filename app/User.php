<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    //
    use AuthenticableTrait;
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['id','name','email','password','avator','phonenumber','gender', 'about', 'facebook_profile_url'];

    // public function userAds(){
    // 	return $this->hasMany(UserAds::class);
    // }


   /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



}
