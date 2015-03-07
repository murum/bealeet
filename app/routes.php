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
use Bealeet\Games\Game;

if(getenv('LAUNCH') === 'true') {
	Route::get('/', array('as' => 'launch', 'uses' => 'LaunchController@index'));
	Route::post('/', array('as' => 'launch', 'uses' => 'LaunchController@store'));
} else {
	Route::get('/', array('as' => 'flow', 'before' => 'auth', 'uses' => 'HomeController@flow'));

	// Authentication
	Route::get('/register', array('as' => 'register', 'uses' => 'UsersController@create'));
	Route::post('/register', array('as' => 'user.store', 'uses' => 'UsersController@store'));
	Route::get('/forgot-password', array('as' => 'forgot_password', 'uses' => 'UsersController@getForgotPassword'));
	Route::post('/forgot-password', array('as' => 'forgot_password', 'uses' => 'UsersController@postForgotPassword'));
	Route::get('/password/reset/{token}', array('as' => 'password.reset', 'uses' => 'UsersController@getResetPassword'));
	Route::post('/password/reset/{token}', array('as' => 'password.reset', 'uses' => 'UsersController@postResetPassword'));
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

	Route::post('/profile', [
		'before' => 'auth',
		'as' => 'profile.update',
		'uses' => 'UsersController@profile_update'
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

	Route::get('/following', [
		'before' => 'auth',
		'as' => 'follows',
		'uses' => 'FollowsController@index'
	]);

	Route::get('/followers', [
		'before' => 'auth',
		'as' => 'followers',
		'uses' => 'FollowsController@followers'
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

	// Messages
	Route::get('/profile/conversations', [
		'before' => 'auth',
		'as' => 'profile.conversations',
		'uses' => 'ConversationsController@index'
	]);

	Route::get('/profile/conversations/{id}', [
		'before' => 'auth',
		'as' => 'profile.conversations.show',
		'uses' => 'ConversationsController@show'
	]);

	Route::post('/profile/conversations/', [
		'before' => 'auth',
		'as' => 'conversations.store',
		'uses' => 'ConversationsController@store'
	]);

	Route::post('/profile/conversations/{id}', [
		'before' => 'auth',
		'as' => 'profile.conversation.post',
		'uses' => 'ConversationsController@store_message'
	]);

	Route::post('/profile/conversations/{id}/add_user', [
		'before' => 'auth',
		'as' => 'conversation.add_user',
		'uses' => 'ConversationsController@add_user'
	]);

	Route::post('/profile/conversations/{id}/leave', [
		'before' => 'auth',
		'as' => 'conversation.leave',
		'uses' => 'ConversationsController@leave'
	]);

	Route::get('/profile/messages/{id}', [
		'before' => 'auth',
		'as' => 'profile.conversation',
		'uses' => 'MessagesController@conversation'
	]);

	// Skills
	Route::put('/users/change_skills', [
		'before' => 'auth',
		'as' => 'add_skills',
		'uses' => 'UsersController@change_skill'
	]);

	Route::post('/users/{id}/add_skill_point', [
		'before' => 'auth',
		'as' => 'add_skill_point',
		'uses' => 'SkillsController@store'
	]);

	// Find players
	Route::get('/find/players', [
		'before' => 'auth',
		'as' => 'find_players',
		'uses' => 'PlayersController@index'
	]);

	Route::get('/find/players/{game}', [
		'before' => 'auth',
		'as' => 'find_players.filter',
		'uses' => 'PlayersController@filter'
	]);


	Route::get('/find/teams', [
		'before' => 'auth',
		'as' => 'find.teams',
		'uses' => 'TeamsController@index'
	]);
}