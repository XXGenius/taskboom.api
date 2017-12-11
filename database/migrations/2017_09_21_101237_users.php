<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password');
            $table->integer('exp');
            $table->integer('level');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('uid');
            $table->index('uid');
            $table->string('photo');
            $table->string('identity');
            $table->string('network');
            $table->string('profile');
            $table->timestamps();
        });
    }


    public function down()
    {
        //
    }
}
