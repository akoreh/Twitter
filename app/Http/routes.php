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

Route::get('/checkHandle','UsersController@checkHandle');
Route::get('/checkEmail','UsersController@checkEmail');

Route::get('/autocomplete','SearchController@autocomplete')->name('autocomplete');

Route::post('/search','SearchController@search')->name('search');



Route::get('/', 'HomeController@index')->name('home');


Route::auth();

Route::get('/login','Auth\AuthController@login')->name('login');

Route::get('/register','Auth\AuthController@register')->name('register');



Route::group(['middleware'=>'auth'],function() {

    Route::delete('/unfollow','UsersController@unfollow')->name('unfollow');

    Route::post('/follow','UsersController@follow')->name('follow');

    Route::post('/tweet', 'TweetsController@store')->name('tweet');

    Route::get('/tweet',function(){

        return redirect()->route('home');

    });

    Route::post('/delete-tweet','TweetsController@deleteTweet')->name('delete-tweet');

    Route::get('/get-latest-profile-tweet','TweetsController@getLatestProfileTweet')->name('get-latest-profile-tweet');

});

Route::get('/{handle}','UsersController@getProfile')->name('show.profile');