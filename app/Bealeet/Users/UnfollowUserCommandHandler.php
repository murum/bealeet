<?php namespace Bealeet\Users;

use Laracasts\Commander\CommandHandler;

class UnfollowUserCommandHandler implements CommandHandler {

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
	 * Handle the command.
	 *
	 * @param object $command
	 * @return void
	 */
	public function handle($command)
	{
		$user = $this->userRepository->findById($command->userId);

		$this->userRepository->unfollow($command->userIdToUnfollow, $user);
	}

}