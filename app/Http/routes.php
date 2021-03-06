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
//    Route::delete('/group/{groupId}', 'GroupController@destroy');
    Route::put('/group/{groupId}', 'GroupController@update');
    Route::get('/group/{groupId}', 'GroupController@show');
    Route::get('/group/{groupId}/edit', 'GroupController@edit');
    Route::get('/group/delete/{groupId}', 'GroupController@delete');
    Route::get('/group/groupMemberAdd/{groupId}/{userId}', 'GroupController@groupMemberAdd');
    Route::get('/group/groupMemberEmail/{groupId}/{userId}', 'GroupController@groupMemberEmail');
    Route::get('/group/groupMemberEmail/{groupId}', 'GroupController@groupMemberEmail');
    Route::post('/group/taskStore/{groupId}', 'GroupController@taskstore');
    Route::put('/group/taskStore/{groupId}', 'GroupController@taskstore');
    Route::post('/group/taskComplete/{taskId}/{groupId}', 'GroupController@taskComplete');

    Route::resource('message', 'MessagesController', [
        'only' => ['store', 'destroy']
    ]);

	Route::get('/user_edit/{userId}', 'UserController@userEdit');
	
	Route::get('/user_delete/', 'UserController@userDelete');

    Route::put('/user_store/{userId}', 'UserController@userStore');

    Route::put('/user_destroy/{userId}', 'UserController@userDestroy');
	
	Route::get('/dashboard', 'UserController@index');

    Route::get('/hasMany/{groupId}', 'GroupController@hasMany');
	
	Route::get('/hasMany/{taskId}', 'TaskController@hasMany');

    Route::get('/emailTest', 'GroupController@email');

    Route::get('/reactivate/{userEmail}', 'UserController@reactivateUser');
    Route::get('/reactivate/', function(){ return redirect('/register'); });

});
