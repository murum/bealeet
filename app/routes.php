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
if(getenv('LAUNCH') && getenv('LAUNCH' !== 'false')) {
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
}