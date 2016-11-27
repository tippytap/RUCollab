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

    Route::get('/group/create', 'GroupController@create');
    Route::post('/group', 'GroupController@store');
    Route::delete('/group/{groupId}', 'GroupController@destroy');
    Route::put('/group/{groupId}', 'GroupController@update');
    Route::get('/group/{groupId}', 'GroupController@show');
    Route::get('/group/{groupId}/edit', 'GroupController@edit');

    Route::resource('message', 'MessagesController', [
        'only' => ['store', 'destroy']
    ]);

	Route::get('/user_edit/{userId}', 'UserController@userEdit');
	
	Route::get('/user_delete/', 'UserController@userDelete');

    Route::get('/user_destroy/{userId}', 'UserController@userDestroy');
	
	Route::get('/dashboard', 'UserController@index');

    Route::get('/hasMany/{groupId}', 'GroupController@hasMany');

});
