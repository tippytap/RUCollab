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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'web'], function(){

    Route::auth();

    Route::resource('group', 'GroupController');

	Route::get('/user_edit', 'UserController@userEdit');
	
	Route::get('/user_delete', 'UserController@userDelete');
	
	Route::get('/dashboard', 'UserController@index');

});
