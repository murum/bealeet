<?php namespace Bealeet\Users;

use Illuminate\Support\Facades\Auth;
use Laracasts\Commander\CommandHandler;

class AddUserGameCommandHandler implements CommandHandler {

	/**
	 * @var UserRepository
	 */
	protected $userRepository;

	/**
	 * @param UserRepository $userRepository
	 */
	function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$user = $this->userRepository->findById(Auth::user()->id);

		if($user->games()->count() === 0)
		{
			$this->userRepository->addFavoriteGame($command->selected, $user);
		} else
		{
			$this->userRepository->addGame($command->selected, $user);
		}

		return $user;
	}

}