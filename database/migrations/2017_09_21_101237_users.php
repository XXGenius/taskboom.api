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
            $table->timestamps();
            $table->integer('user_role_id')->unsigned()->default(1);
            $table->foreign('user_role_id')
                ->references('id')->on('user_roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        //
    }
}
