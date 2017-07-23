<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
    public function userAds(){
    	return $this->hasMany(UserAds::class);
    }
     protected $table = 'sellers';
}
