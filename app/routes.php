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

	Route::get('/profile', [
		'before' => 'auth',
		'as' => 'profile',
		'uses' => 'UsersController@profile'
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

	Route::get('/follows', [
		'before' => 'auth',
		'as' => 'follows',
		'uses' => 'FollowsController@index'
	]);

	Route::delete('/users/{id}/follow', [
		'before' => 'auth',
		'as' => 'unfollow',
		'uses' => 'FollowsController@destroy'
	]);

	// Games
	Route::put('/users/primary_game', [
		'before' => 'auth',
		'as' => 'primary_game',
		'uses' => 'UsersController@primary_game'
	]);

	Route::put('change_games', [
		'before' => 'auth',
		'as' => 'change_games',
		'uses' => 'UsersController@change_games'
	]);

	// Teams
	Route::put('/users/search_team/status', [
		'before' => 'auth',
		'as' => 'user_search_team',
		'uses' => 'UsersController@search_team_status'
	]);

	// Reviews
	Route::post('/users/{id}/review', [
		'before' => 'auth',
		'as' => 'post_review',
		'uses' => 'ReviewsController@store'
	]);

	// Skills
	Route::put('/users/change_skills', [
		'before' => 'auth',
		'as' => 'add_skills',
		'uses' => 'UsersController@change_skill'
	]);
}