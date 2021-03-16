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
            $table->srting('name', 30);
            $table->integer('category_id')->nullable();
            $table->timestamps();
            $table->srting('update_reason', 255)->nullable();
            $table->dateTime('deleted_at', 8)->nullable();
            $table->srting('delete_reason', 255)->nullable();
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
