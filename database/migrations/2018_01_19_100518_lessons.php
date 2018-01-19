<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lessons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
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
