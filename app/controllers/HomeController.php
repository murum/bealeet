<?php

use Bealeet\Users\UserRepository;

class HomeController extends BaseController {
	/**
	 * @var UserRepository
	 */
	private $userRepository;

	/**
	 * @param UserRepository $userRepository
	 */
	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function flow()
	{
		$players = $this->userRepository->findUsersSearchingClan();
		return View::make('flow.index', compact('players'));
	}

	public function what()
	{
		return View::make('home.what');
	}

}
