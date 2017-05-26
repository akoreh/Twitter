<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetHashtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweet_hashtags', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('tweet_id')->unsigned();
            $table->integer('hashtag_id')->unsigned();
            $table->timestamps();

            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade');
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::drop('tweet_hashtags');
    }
}
