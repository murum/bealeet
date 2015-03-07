<?php

class TeamsController extends \BaseController {

	/**
	 * Display the team index
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('team.index');
	}
}