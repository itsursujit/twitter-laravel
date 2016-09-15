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
Route::get('/partial', 'WelcomeController@partial');
Route::get('/recommended/twitter-users', 'WelcomeController@twitterUsers');

Route::post('/follow/{name}', 'WelcomeController@follow');
Route::post('/unfollow/{name}', 'WelcomeController@unfollow');



/*
Route::get('/upload', 'WelcomeController@upload');
Route::get('/home', 'WelcomeController@home');
Route::get('/edit', 'WelcomeController@edit');
Route::get('/course', 'WelcomeController@course');
Route::post('/upload', 'WelcomeController@uploadPost');*/

Route::get('login', function () {
    return view('twitterAuth');
});

Route::get('logout', 'Auth\AuthController@logout');

Route::get('auth/twitter', 'Auth\AuthController@redirectToTwitter');
Route::get('twitter-callback', 'Auth\AuthController@handleTwitterCallback');