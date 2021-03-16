<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadGroupThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_group_threads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_group_id');
            $table->integer('thread_id');

            $table->foreign('thread_group_id')->references('id')->on('thread_group');
            $table->foreign('thread_id')->references('id')->on('threads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_group_threads');
    }
}
