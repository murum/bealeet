<?php namespace Bealeet\Users;

use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler {

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
		$user = $this->userRepository->findById($command->userId);

		$this->userRepository->follow($command->userIdToFollow, $user);

		return $user;
	}

}