<?php namespace Bealeet\Users;

class UserRepository {

    /**
     * Persist a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        $user->save();
    }

    /**
     * Get a paginated list of all users.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    /**
     * Fetch a user by their username.
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::whereUsername($username)->first();
    }

	/**
	 * Fetch a user by their ID
	 *
	 * @param $id
	 * @return mixed
	 */
	public function findById($id)
	{
		return User::whereId($id)->first();
	}

	/**
	 * Follow a Bealeet user.
	 *
	 * @param $userIdToFollow
	 * @param User $user
	 * @return mixed
	 */
	public function follow($userIdToFollow, User $user)
	{
		return $user->followedUsers()->attach($userIdToFollow);
	}

	/**
	 * Unfollow a Bealeet user.
	 *
	 * @param $userIdToUnfollow
	 * @param User $user
	 * @return mixed
	 */
	public function unfollow($userIdToUnfollow, User $user)
	{
		return $user->followedUsers()->detach($userIdToUnfollow);
	}

	/**
	 * Fetch followed users
	 *
	 * @param $user
	 * @return mixed
	 */
	public function findFollowedUsers(User $user)
	{
		return $user->followedUsers()->get();
	}

} 