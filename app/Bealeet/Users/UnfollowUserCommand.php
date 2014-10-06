<?php namespace Bealeet\Users;

class UnfollowUserCommand {

	/**
	 * @var
	 */
	public $userId;

	/**
	 * @var
	 */
	public $userIdToUnfollow;

	/**
	 * @param $userId
	 * @param $userIdToUnfollow
	 */
	function __construct($userId, $userIdToUnfollow)
	{
		dd($userId);
		$this->userId = $userId;
		$this->userIdToUnfollow = $userIdToUnfollow;
	}

}