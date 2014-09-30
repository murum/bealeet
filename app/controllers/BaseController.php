<?php

use Bealeet\Users\UserRepository;
use Laracasts\Commander\CommanderTrait;
use Laracasts\TestDummy\Factory as TestDummy;

class BaseController extends Controller {

	use CommanderTrait;


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		View::share('currentUser', Auth::user());
	}

}
