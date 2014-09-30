<?php

class LaunchController extends \BaseController {

	/**
	 * Display the landing page
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('launch.index');
	}

	/**
	 * Store a newly created  resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$email = Input::get('email');

		$list = MailchimpWrapper::lists()->getList(['name' => 'Beta Invitation'])['data'][0];
		$list_id = $list['id'];


		try{
			MailchimpWrapper::lists()->subscribe($list_id, array('email'=>$email));
			Flash::success('You\'re one step closer to done. We just need you to verify the mail. Please check your inbox.');
		} catch (Exception $ex){
			Flash::error($ex->getMessage());
		}

		return Redirect::back()->withInput();
	}
}