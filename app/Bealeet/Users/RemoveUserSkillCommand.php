<?php namespace Bealeet\Users;

class RemoveUserSkillCommand {
	public $deselected;

	/**
	 * @param $deselected
	 */
	function __construct($deselected)
	{
		$this->deselected = $deselected;
	}

}