<?php namespace Bealeet\Users;

class AddUserSkillCommand {
	public $selected;

	/**
	 * @param $action
	 */
	function __construct($selected)
	{
		$this->selected = $selected;
	}

}