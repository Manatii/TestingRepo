<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouriteAds extends Model
{
    //

    protected $fillable = ['price','title','location','user_id','ad_id'];

    protected $table = 'fav_ads';
}
