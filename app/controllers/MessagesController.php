<?php

use Bealeet\Users\Message;

class MessagesController extends BaseController {

	public function index()
	{
		$user = Auth::user();
		$conversations = Message::whereSenderId($user->id)->orWhere('reciever_id', '=', $user->id)->get();

		return View::make('messages.index', compact('conversations'));
	}

}
