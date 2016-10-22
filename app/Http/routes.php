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

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('categories', 'CategoryController');

    Route::resource('kaligards', 'KaligardController');

    Route::resource('inventories', 'InventoryController');

    Route::resource('materialTypes', 'MaterialTypeController');

    Route::resource('measurements', 'MeasurementController');

    Route::resource('products', 'ProductController');

    Route::resource('purchaseTransactions', 'PurchaseTransactionController');

    Route::resource('workAssignments', 'WorkAssignmentController');

    Route::resource('workAssignmentDetails', 'WorkAssignmentDetailController');


// Registration Routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');


});


Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::resource('shops', 'ShopController');

Route::resource('shops', 'ShopController');