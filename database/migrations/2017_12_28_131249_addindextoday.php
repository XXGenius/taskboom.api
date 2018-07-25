<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
