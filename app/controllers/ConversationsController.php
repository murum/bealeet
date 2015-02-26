<?php

use Bealeet\Conversations\Conversation;
use Bealeet\Conversations\Message;
use Bealeet\Users\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ConversationsController extends BaseController {

	public function index()
	{
		$user = Auth::user();
		$conversationsToCheck = Conversation::with('users')->get();
		$conversations = new Collection();

		foreach($conversationsToCheck as $conversation) {
			if($conversation->users->contains($user->id)) {
				$conversations[] = $conversation;
			}
		}

		return View::make('conversations.index', compact('conversations'));
	}

	public function show($id)
	{
		$conversation = Conversation::findOrFail($id);

		return View::make('conversations.show', compact('conversation'));
	}

	public function store_message($id) {
		$input = Input::only('message');
		$conversation = Conversation::findOrFail($id);

		$message = new Message;
		$message->conversation_id = $conversation->id;
		$message->writer_id = Auth::user()->id;
		$message->message = $input['message'];
		$message->save();

		return Redirect::back();
	}

	public function add_user($id) {
		$input = Input::only('username');
		$user = User::whereUsername($input['username'])->first();

		$conversation = Conversation::findOrFail($id);

		if(!$conversation->users->contains($user->id)) {
			$conversation->users()->attach($user->id);
		}

		return Redirect::back();
	}

}
