<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaskStatusesTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_statuses__task', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('task_status_id')->unsigned()->default(1);
            $table->foreign('task_status_id')
                ->references('id')->on('task_statuses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('task_id')->unsigned()->default(1);
            $table->foreign('task_id')
                ->references('id')->on('tasks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
