<?php namespace Bealeet\Skills;

use Bealeet\Users\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laracasts\Commander\CommandHandler;

class AddSkillPointCommandHandler implements CommandHandler {

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

		$user->addSkillPointToUser($command->user, $command->skillId);

		return $user;
	}

}