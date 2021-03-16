<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commenter_id');
            $table->integer('guests_commenter_id');
            $table->integer('thread_id')->index();
            $table->integer('comment_number')->index();
            $table->string('content', 1000);
            $table->timestamps();

            $table->foreign('commenter_id')->references('id')->on('users');
            $table->foreign('guests_commenter_id')->references('identify_key')->on('guests');
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
        Schema::dropIfExists('comments');
    }
}
