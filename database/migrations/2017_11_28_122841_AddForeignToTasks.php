<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->default(1);
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('time_id')->unsigned()->default(1);
            $table->foreign('time_id')
                ->references('id')->on('times')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('prioritet_id')->unsigned()->default(1);
            $table->foreign('prioritet_id')
                ->references('id')->on('prioritets')
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
