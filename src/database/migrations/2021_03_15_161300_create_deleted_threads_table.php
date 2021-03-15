<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_threads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creater_id');
            $table->srting('name');
            $table->integer('category_id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->srting('update_reason');
            $table->dateTime('deleted_at');
            $table->srting('delete_reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deleted_threads');
    }
}
