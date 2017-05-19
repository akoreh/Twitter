<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/{handle}','TweetsController@getProfileTweets');

Route::group(['middleware'=>'auth'],function() {

    Route::post('/tweet', 'TweetsController@store')->name('tweet');

    Route::get('/tweet',function(){

        return redirect()->route('home');

    });

});