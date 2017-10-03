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
            $table->timestamps();
            $table->integer('group_task_id')->unsigned()->default(1);
            $table->foreign('group_task_id')
                ->references('id')->on('task_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('project_id')->unsigned()->default(1);
            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->integer('sort')->unsigned()->default(0);
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
