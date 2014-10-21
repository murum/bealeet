<?php namespace Bealeet\Users;

use Bealeet\Skills\Skill;

trait SkillTrait {

	/**
	 * Get the list of games for the user.
	 *
	 * @return mixed
	 */
	public function skills()
	{
		return $this->belongsToMany('Bealeet\Skills\Skill', 'users_skills')->withPivot('testifier_id')->withTimestamps();
	}


	/**
	 * Check if a user has skills linked to the account
	 *
	 * @return bool
	 */
	public function hasSkills()
	{
		return ($this->skills()->count() > 0) ? true : false;
	}

	/**
	 * Return name and a grouped count of a users skills
	 *
	 * @return bool
	 **/
	public function groupedSkills()
	{
		return $this->skills()
			->groupBy('skill_id')
			->orderBy('count', 'DESC')
			->get([
				\DB::raw('COUNT(skill_id) as count'),
				'name'
			]);
	}

	/**
	 * Returns tha skills id in a list
	 *
	 * @return mixed
	 */
	public function listUserSkillsId()
	{
		return $this->skills()->lists('skill_id', 'skill_id');
	}

	/**
	 * Returns tha skills in a list
	 *
	 * @return mixed
	 */
	public function listUserSkills()
	{
		return $this->skills()->lists('name', 'skill_id');
	}

	/**
	 * Return all skills in a list
	 *
	 * @return array
	 */
	public function listSkills()
	{
		return Skill::all()->lists('name', 'id');
	}

}