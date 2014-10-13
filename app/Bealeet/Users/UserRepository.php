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

	/**
	 * Add a game
	 *
	 * @param $gameIdToAttach
	 * @param User $user
	 * @return mixed
	 */
	public function addGame($gameIdToAttach, User $user)
	{
		return $user->games()->attach($gameIdToAttach);
	}

	/**
	 * Check if a user has a game with given ID.
	 *
	 * @param $gameId
	 * @param User $user
	 * @return mixed
	 */
	public function hasGame($gameId, User $user) {
		return ($user->games()->whereGameId($gameId)->count() > 0) ? true : false;
	}

	/**
	 * Add a game and set it as favorite
	 *
	 * @param $gameIdToFavorite
	 * @param User $user
	 * @return mixed
	 */
	public function setFavoriteGame($gameIdToFavorite, User $user)
	{
		$gameToFavorite = $user->games()->whereGameId($gameIdToFavorite)->firstOrFail();
		$gameToFavorite->pivot->favorite = true;
		return $gameToFavorite->pivot->save();
	}

	/**
	 * Reset users favorite game
	 *
	 * @param User $user
	 * @return mixed
	 */
	public function resetFavoriteGame(User $user)
	{
		foreach ( $user->games()->whereFavorite(true)->get() as $user_games) {
			$user_games->pivot->favorite = false;
			$user_games->pivot->save();
		}

		return ($user->games()->whereFavorite(true)->count() == 0);
	}

	/**
	 * Set users favorite game
	 *
	 * @param $gameIdToFavorite
	 * @param User $user
	 * @return mixed
	 */
	public function addFavoriteGame($gameIdToFavorite, User $user)
	{
		return $user->games()->attach($gameIdToFavorite, ['favorite' => true]);
	}


	/**
	 * Set the users only game as a favorite game
	 *
	 * @param User $user
	 * @return mixed
	 */
	public function setRemainingGameAsFavorite(User $user)
	{
		return $this->addFavoriteGame($user->games()->first()->id, $user);
	}

	/**
	 * Set the users search team status
	 *
	 * @param $isSearching
	 * @param User $user
	 * @return bool
	 */
	public function setSearchTeamStatus($isSearching, User $user)
	{
		$isSearching = ($isSearching == 'true') ? false : true;

		$user->searching_team = $isSearching;
		return $user->save();
	}


	/**
	 * Remove a game
	 *
	 * @param $gameIdToDetach
	 * @param User $user
	 * @return mixed
	 */
	public function removeGame($gameIdToDetach, User $user)
	{
		return $user->games()->detach($gameIdToDetach);
	}

} 