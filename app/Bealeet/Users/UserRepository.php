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
	 * Get players who is searching for a team in a pagination of 30.
	 *
	 * @return mixed
	 */
	public function findUsersSearchingClan($game = null)
	{
		if(isset($game)) {
			$users = static::getSearchingPlayersByGame($game);
		} else {
			$users = User::whereSearchingTeam(true)->paginate(30);
		}
		return $users;
	}

	public static function getSearchingPlayersByGame($game) {
		$users_to_return = [];
		$users = User::whereSearchingTeam(true)->get();
		foreach ( $users as $user ) {
			if($user->favoriteGame()->slug === $game->slug) {
				$users_to_return[] = $user;
			}
		}
		return $users_to_return;
	}

	/**
	 * Add a review to a Bealeet user.
	 *
	 * @param $review
	 * @param User $writer
	 * @param User $user
	 * @return mixed
	 */
	public function addReview($review, User $writer, User $user)
	{
		$review = new Review([
			'writer_id' => $writer->id,
			'user_id' => $user->id,
			'review' => $review
		]);

		return $user->reviews()->save($review);
	}

	/**
	 * Check if the user already has reviews from a specific writer
	 *
	 * @param User $writer
	 * @param User $user
	 * @return bool
	 */
	public function alreadyReviewed(User $writer, User $user)
	{
		return ($user->reviews()->whereWriterId($writer->id)->count() > 0) ? true : false;
	}

	/**
	 * Remove all reviews from a current writer to a user
	 *
	 * @param User $writer
	 * @param User $user
	 * @return bool
	 */
	public function removeReviews(User $writer, User $user)
	{
		foreach( $user->reviews()->whereWriterId($writer->id)->get() as $review)
		{
			$review->delete();
		}
		return true;
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
	 * Fetch followers
	 *
	 * @param $user
	 * @return mixed
	 */
	public function findFollowers(User $user)
	{
		return $user->followers()->get();
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
	 * Add a skill
	 *
	 * @param $gameIdToAttach
	 * @param User $user
	 * @return mixed
	 */
	public function addSkill($skillIdToAttach, User $user)
	{
		return $user->skills()->attach($skillIdToAttach);
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

	/**
	 * Removes a skill
	 *
	 * @param $skillIdToDetach
	 * @param User $user
	 * @return mixed
	 */
	public function removeSkill($skillIdToDetach, User $user)
	{
		return $user->skills()->detach($skillIdToDetach);
	}

} 