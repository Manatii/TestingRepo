<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('users', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('avator');
            $table->string('about');
            $table->string('avator_originarl');
            $table->string('profile_Url');
            $table->string('remember_token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
