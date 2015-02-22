<?php

use Bealeet\Games\Game;
use Bealeet\Users\UserRepository;
use Illuminate\Support\Facades\View;

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
		$games = Game::all();
		return View::make('players.index', compact('players', 'games'));
	}

	public function filter($game)
	{
		$active_game = Game::whereSlug($game)->first();
		$players = $this->userRepository->findUsersSearchingClan($active_game);
		$games = Game::all();
		return View::make('players.index', compact('players', 'games', 'active_game'));
	}

}
