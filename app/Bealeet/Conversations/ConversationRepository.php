<?php namespace Bealeet\Conversations;

use Illuminate\Support\Facades\Auth;

trait ConversationRepository {
	public function hasUnreadMessages() {
		if( ! $this->hasOtherUserMessages() ) {
			return false;
		} else {
			$message = $this->getLatestMessage();
			$conversation_user = $this->getCurrentConversationUser();
			return ($conversation_user->last_read < $message->created_at);
		}
	}

	public function getLatestMessage() {
		return $this->messages()->where('writer_id', '!=', Auth::user()->id)->orderBy('created_at', 'desc')->first();
	}

	public function hasOtherUserMessages() {
		return ($this->messages()->where('writer_id', '!=', Auth::user()->id)->orderBy('created_at', 'desc')->count() > 0) ? true : false;
	}

	public function hasMessages() {
		return ($this->messages()->count() > 0) ? true : false;
	}

	public function getCurrentConversationUser() {
		return ConversationUser::
			whereUserId(Auth::user()->id)
           ->whereConversationId($this->id)
           ->first();
	}

}