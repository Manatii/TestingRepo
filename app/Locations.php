<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    //
    protected $fillable = ['id','township','province'];

    protected $table = 'locations';
}
