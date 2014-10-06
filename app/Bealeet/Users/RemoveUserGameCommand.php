<?php namespace Bealeet\Users;

class RemoveUserGameCommand {
	public $deselected;

	/**
	 * @param $deselected
	 */
	function __construct($deselected)
	{
		$this->deselected = $deselected;
	}

}