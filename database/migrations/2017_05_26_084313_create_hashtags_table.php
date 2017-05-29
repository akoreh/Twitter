<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashtagsTable extends Migration
{

    public function up()
    {
        Schema::create('hashtags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hashtag')->unique();
            $table->integer('popularity')->default(1);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('hashtags');
    }
}
