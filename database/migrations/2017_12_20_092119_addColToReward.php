<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColToReward extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rewards', function (Blueprint $table) {
            $table->integer('task_id')->unsigned()->defautl(0);
            $table->foreign('task_id')
                ->references('id')->on('tasks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        //
    }
}
