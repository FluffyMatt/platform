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

// Place all routes needing AUTH in closure below
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'ContentController@index');
    Route::resource('content', 'ContentController');

    // Routes for Admin/Editor only
    Route::group(['middleware' => 'adminOrAuthor'], function() {

    });

    Route::group(['prefix' => 'api/v1'], function() {
        Route::get('users/search', 'UserController@search');
    });

});

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/logout', 'Auth\AuthController@getLogout');
