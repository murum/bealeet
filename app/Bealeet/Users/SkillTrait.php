<?php namespace Bealeet\Users;

use Bealeet\Skills\Skill;
use Illuminate\Support\Collection;

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
		$return_skills = new Collection();

		$skills = $this->skills()
		               ->groupBy('skill_id')
		               ->orderBy('count', 'DESC')
		               ->get([
			               \DB::raw('COUNT(skill_id) as count'),
			               'skill_id',
			               'game_id',
			               'name'
		               ]);
		foreach($skills as $skill) {
			if($skill->game_id == $this->favoriteGame()->id) {
				$return_skills[] = $skill;
			}
		}

		return $return_skills;
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
		$return_skills = new Collection();
		$skills = Skill::all();
		foreach($skills as $skill) {
			if($skill->game_id == $this->favoriteGame()->id) {
				$return_skills[] = $skill->name;
			}
		}
		return $return_skills;
	}

	/**
	 * Check if a user has already added a skill point to given user.
	 *
	 * @param User $user
	 * @param $skill_id
	 * @return bool
	 */
	public function hasAddedSkillPoint(User $user, $skill_id) {
		return ($user->skills()->whereTestifierId($this->id)->whereSkillId($skill_id)->count() > 0) ? true : false;
	}

	/**
	 * Check if the current user can add a skill point to given user.
	 *
	 * @param User $user
	 * @param $skill_id
	 * @return bool
	 */
	public function canAddSkillPoint(User $user, $skill_id) {
		if($user->is($this))
			return false;

		return ($user->skills()->whereTestifierId($this->id)->whereSkillId($skill_id)->count() > 0) ? false : true;
	}

	/**
	 * Add a skill point to a given user for a given skill id
	 *
	 * @param User $user
	 * @param $skill_id
	 * @return mixed
	 */
	public function addSkillPointToUser(User $user, $skill_id) {
		return $user->skills()->attach($skill_id, [
			'testifier_id' => $this->id
		]);
	}

}