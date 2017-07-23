<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $guarded = array();
    protected $table = 'users'; // table name
    public $timestamps = 'false' ; // to disable default timestamp fields
 
	// model function to store form data to database
	public static function saveFormData($data)
	{
	    DB::table('users')->insert($data);
	}
}
