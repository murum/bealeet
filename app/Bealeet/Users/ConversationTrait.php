<?php namespace Bealeet\Users;

trait ConversationTrait {

	/**
	 * Conversation relationship
	 *
	 * @return mixed
	 */
	public function conversations()
	{
		return $this->belongToMany('Bealeet\Conversations\Conversation');
	}

	/**
	 * Conversation Message relationship
	 *
	 * @return mixed
	 */
	public function messages()
	{
		return $this->hasMany('Bealeet\Conversations\Message');
	}

	/**
	 * Determine if current user has unread messages
	 *
	 * @return bool
	 */
	public function hasNewMessages()
	{
//		$messages = $this->recievedMessages()->whereRead(false)->count();
//		return ($messages > 0);
		return false;
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

	/**
	 * Get amount of unread messages
	 *
	 * @return mixed
	 */
	public function getUnreadMessageCount() {
//		return $this->recievedMessages()->whereRead(false)->count();
		return 0;
	}
}