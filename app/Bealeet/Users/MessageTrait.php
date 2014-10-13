<?php namespace Bealeet\Users;

trait MessageTrait {

	/**
	 * Get the list of messages the users has sent.
	 *
	 * @return mixed
	 */
	public function sendedMessages()
	{
		return $this->hasMany('\Bealeet\Users\Message', 'sender_id');
	}

	/**
	 * Get the list of messages the user has recieved.
	 *
	 * @return mixed
	 */
	public function recievedMessages()
	{
		return $this->hasMany('\Bealeet\Users\Message', 'reciever_id');
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


	/**
	 * Get specified of recieved messages
	 *
	 * @param int $count
	 */
	public function getUnreadRecievedMessages($count = 3) {

		// Check if the user has less recieved messages than the count and if so set the count to the recieved messages count.
		if( $this->recievedMessages()->whereRead(false)->count() < $count )
		{
			$count = $this->recievedMessages()->whereRead(false)->count();
		}

		return $this->recievedMessages()->whereRead(false)->take($count)->orderBy('created_at', 'DESC')->get();
	}

}