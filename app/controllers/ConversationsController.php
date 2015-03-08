<?php

use Bealeet\Conversations\Conversation;
use Bealeet\Conversations\ConversationUser;
use Bealeet\Conversations\Message;
use Bealeet\Users\User;
use Carbon\Carbon;
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
		$user = Auth::user();
		$conversationsToCheck = Conversation::with('users')->get();
		$conversations = new Collection();

		foreach($conversationsToCheck as $conversation) {
			if($conversation->users->contains($user->id)) {
				$conversations[] = $conversation;
			}
		}

		$conversation = Conversation::findOrFail($id);
		if( !$conversation->users->contains(Auth::user()->id) ) {
			Flash::error('You have no rights to visit that conversation');
			return Redirect::route('profile.conversations');
		} else {
			Auth::user()->conversations()->updateExistingPivot($id, ['last_read' => Carbon::now()]);
		}

		return View::make('conversations.show', compact('conversations', 'conversation'));
	}

	public function store() {
		$input = Input::only('username');

		$conversation = new Conversation();

		$conversation->name = Auth::user()->username . ', ' . $input['username'];

		if($conversation->save()) {
			$guest = User::whereUsername($input['username'])->first();
			if($guest) {
				$conversation->users()->attach([Auth::user()->id, $guest->id]);

				Flash::success('Your conversation was created.');
				return Redirect::route('profile.conversations.show', $conversation->id);
			} else {
				$conversation->delete();
				Flash::error('The username you entered does not exist');
				return Redirect::route('profile.conversations');
			}
		} else {
			Flash::error('You could not create a new conversation.');
			return Redirect::route('profile.conversations');
		}
	}

	public function store_message($id) {
		$input = Input::only('message');
		$conversation = Conversation::findOrFail($id);

		if( !$conversation->users->contains(Auth::user()->id) ) {
			Flash::error('You have no rights to visit that conversation');
			return Redirect::route('profile.conversations');
		}

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

		if( !$user ) {
			Flash::error('The given username does not exist.');
			return Redirect::back();
		}

		$conversation = Conversation::findOrFail($id);

		if(!$conversation->users->contains($user->id)) {
			$conversation->users()->attach($user->id);
		}

		return Redirect::back();
	}

	public function leave($id) {
		$conversation = Conversation::findOrFail($id);

		if( !$conversation->users->contains(Auth::user()->id) ) {
			Flash::error('You have no rights to visit that conversation');
			return Redirect::route('profile.conversations');
		}

		$conversation->users()->detach(Auth::user()->id);

		return Redirect::route('profile.conversations');
	}

}
