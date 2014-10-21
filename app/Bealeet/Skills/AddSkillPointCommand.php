<?php namespace Bealeet\Skills;

class AddSkillPointCommand {
	public $user;
	public $skillId;

	/**
	 * @param $user
	 * @param $skill
	 */
	function __construct($skillId, $user)
	{
		$this->user = $user;
		$this->skillId = $skillId;
	}

}