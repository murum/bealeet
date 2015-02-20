<?php

use Bealeet\Users\UserRepository;

class PlayersController extends BaseController {

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

	public function index()
	{
		$players = $this->userRepository->findUsersSearchingClan();
		return View::make('players.index', compact('players'));
	}

}
