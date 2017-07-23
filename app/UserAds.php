<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserAds extends Model
{
    //
	public function userAds(){
    	return $this->belongsTo(Seller::class);
    }

   protected $table = 'kasiads';
   protected $primaryKey = 'adid';
   public $incrementing = false;
}
