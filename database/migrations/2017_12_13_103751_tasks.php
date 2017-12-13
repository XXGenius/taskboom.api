<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->string('comment_task');
            $table->string('comment_progress');
            $table->string('gratitude_day');
            $table->integer('day_id')->unsigned()->defautl(0);
            $table->foreign('day_id')
                ->references('id')->on('days')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('cycle_id')->unsigned()->defautl(0);
            $table->foreign('cycle_id')
                ->references('id')->on('cycles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('priority_id')->unsigned()->defautl(0);
            $table->foreign('priority_id')
                ->references('id')->on('priorities')
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
