<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTaskGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users__task_groups', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('task_group_id')->unsigned()->default(1);
            $table->foreign('task_group_id')
                ->references('id')->on('task_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')
                ->references('id')->on('users')
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
