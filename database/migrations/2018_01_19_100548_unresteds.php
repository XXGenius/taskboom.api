<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Unresteds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unresteds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('review_id')->unsigned()->defautl(0);
            $table->foreign('review_id')
                ->references('id')->on('reviews')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        //
    }
}
