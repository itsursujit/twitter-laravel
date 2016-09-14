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

Route::get('/', 'WelcomeController@home');
Route::get('/recommended/twitter-users', 'WelcomeController@twitterUsers');


/*
Route::get('/upload', 'WelcomeController@upload');
Route::get('/home', 'WelcomeController@home');
Route::get('/edit', 'WelcomeController@edit');
Route::get('/course', 'WelcomeController@course');
Route::post('/upload', 'WelcomeController@uploadPost');*/

Route::get('twitter', function () {
    return view('twitterAuth');
});
Route::get('auth/twitter', 'Auth\AuthController@redirectToTwitter');
Route::get('twitter-callback', 'Auth\AuthController@handleTwitterCallback');