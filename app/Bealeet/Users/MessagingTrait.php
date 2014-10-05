<?php namespace Bealeet\Users;

trait MessagingTrait {

	/**
	 * Get the list of messages the users has sent.
	 *
	 * @return mixed
	 */
	public function sendedMessages()
	{
		return $this->belongsToMany(static::class, 'messages', 'sender_id', 'reciever_id')->withTimestamps();
	}

	/**
	 * Get the list of messages the user has recieved.
	 *
	 * @return mixed
	 */
	public function recievedMessages()
	{
		return $this->belongsToMany(static::class, 'messages', 'reciever_id', 'sender_id')->withTimestamps();
	}

	/**
	 * Determine if current user has unread messages
	 *
	 * @return bool
	 */
	public function hasNewMessages()
	{
		$messages = $this->recievedMessages()->whereRead(false)->count();
		return ($messages > 0);
	}

}