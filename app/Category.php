<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
     protected $fillable = ['cat_id','category','category_image'];

    protected $table = 'categories';
}
