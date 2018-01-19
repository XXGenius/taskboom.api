<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Victories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('victories', function (Blueprint $table) {
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
