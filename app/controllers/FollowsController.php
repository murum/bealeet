<?php

use Bealeet\Users\FollowUserCommand;
use Bealeet\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Store a newly created follow resource in storage.
	 *
	 * @return Response
	 */
	public function create()
	{
		$input = array_add(Input::get(), 'userId', Auth::id());

		$this->execute(FollowUserCommand::class, $input);

		Flash::success('You are now following this user');

		return Redirect::back();
	}

	/**
	 * Remove the specified follow resource from storage.
	 *
	 * @param  int  
	 * @return Response
	 */
	public function destroy($userIdToUnfollow)
	{
		$input = array_add(Input::get(), 'userId', Auth::id());

		$this->execute(UnfollowUserCommand::class, $input);

		Flash::success('You have now unfollowed this user.');

		return Redirect::back();
	}

}