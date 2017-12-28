<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addindextoday extends Migration
{

    public function up()
    {
    Schema::table('days', function (Blueprint $table) {
        $table->index('date');
    });
    }


    public function down()
    {
    //
    }
}
