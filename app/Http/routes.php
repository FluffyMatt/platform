<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'ContentController@home');
Route::get('/{slug}', 'ContentController@show');

Route::group(['prefix' => 'cms'], function () {
	Route::group(['middleware' => 'auth'], function () {
	    Route::get('/', 'ContentController@index');
	    Route::resource('content', 'ContentController', ['except' => ['create', 'show']]);
		Route::get('/content/create/{type}', 'ContentController@create');
		Route::resource('comments', 'CommentController', ['except' => ['create', 'show']]);
	    Route::resource('categories', 'CategoryController');
	    Route::resource('menus', 'MenuController');
	    Route::resource('users', 'UserController');
	    Route::get('/content/revision/{id}', 'ContentController@revision');
	    Route::get('/content/rollback/{id}', 'ContentController@rollback');

	    Route::group(['middleware' => 'adminOrAuthor'], function() {

	    });

	    Route::group(['prefix' => 'api/v1'], function() {
	        Route::get('users/search', 'UserController@search');
	    });
	});

	Route::get('/login', 'Auth\AuthController@getLogin');
	Route::post('/login', 'Auth\AuthController@login');
	Route::get('/logout', 'Auth\AuthController@getLogout');
});
