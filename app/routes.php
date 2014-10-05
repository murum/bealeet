<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
if(getenv('LAUNCH') === 'true') {
	Route::get('/', array('as' => 'launch', 'uses' => 'LaunchController@index'));
	Route::post('/', array('as' => 'launch', 'uses' => 'LaunchController@store'));
} else {
	Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

	// Authentication
	Route::get('/register', array('as' => 'register', 'uses' => 'UsersController@create'));
	Route::post('/register', array('as' => 'user.store', 'uses' => 'UsersController@store'));
	Route::get('/logout', array('as' => 'logout', 'uses' => 'SessionsController@destroy'));
	Route::get('/login', array('as' => 'login', 'uses' => 'SessionsController@create'));
	Route::post('/login', array('as' => 'login', 'uses' => 'SessionsController@store'));

	// User profile
	Route::get('/users/{id}', [
		'before' => 'auth',
		'as' => 'user_profile',
		'uses' => 'UsersController@show'
	]);

	Route::get('/users/{id}/edit', [
		'before' => 'auth',
		'as' => 'user_edit',
		'uses' => 'UsersController@edit'
	]);

	Route::post('/users/follow', [
		'before' => 'auth',
		'as' => 'follow',
		'uses' => 'FollowsController@create'
	]);

	Route::delete('/users/{id}/follow', [
		'before' => 'auth',
		'as' => 'unfollow',
		'uses' => 'FollowsController@destroy'
	]);
}