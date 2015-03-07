<?php namespace Bealeet\Users;

trait FollowableTrait {

	/**
	 * Get the list of users that the current user follows.
	 *
	 * @return mixed
	 */
	public function followedUsers()
	{
		return $this->belongsToMany(static::class, 'follows', 'user_id', 'user_id_to_follow')->withTimestamps();
	}

	/**
	 * Get the list of users who follow the current user.
	 *
	 * @return mixed
	 */
	public function followers()
	{
		return $this->belongsToMany(static::class, 'follows', 'user_id_to_follow', 'user_id')->withTimestamps();
	}

	/**
	 * Determine if current user follows another user.
	 *
	 * @param User $otherUser
	 * @return bool
	 */
	public function isFollowedBy(User $otherUser)
	{
		$idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('user_id_to_follow');

		return in_array($this->id, $idsWhoOtherUserFollows);
	}

	/**
	 * Determine if current user follows any users
	 *
	 * @return bool
	 */
	public function isFollowingUsers()
	{
		return ($this->followedUsers()->count() > 0);
	}

	public function hasFollowers() {
		return ($this->followers()->count() > 0);
	}

}