<?php

use Illuminate\Database\Migrations\Migration;

class CreateVotesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('votes', function($table){
            /* @var $table \Illuminate\Database\Schema\Blueprint */
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->integer('reply_id', false, true);
            $table->enum('vote', array(-1, 0 , 1));
            $table->integer('status');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votes');
	}

}