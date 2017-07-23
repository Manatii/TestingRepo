<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    //
     protected $fillable = ['id','township','province'];
     protected $table = 'locations';
}
