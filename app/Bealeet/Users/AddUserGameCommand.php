<?php namespace Bealeet\Users;

class AddUserGameCommand {
	public $selected;

	/**
	 * @param $action
	 */
	function __construct($selected)
	{
		$this->selected = $selected;
	}

}