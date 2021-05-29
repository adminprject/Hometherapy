<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatterPostTable extends Migration
{
    public function up()
    {
        Schema::create('chatter_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chatter_discussion_id');
            $table->foreign('chatter_discussion_id')->references('id')->on('chatter_discussion');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('chatter_post');
    }
}
