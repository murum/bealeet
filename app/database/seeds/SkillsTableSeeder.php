<?php

use Bealeet\Games\Game;
use Bealeet\Skills\Skill;

class SkillsTableSeeder extends Seeder {

	/**
	 *
	 */
	public function run()
	{
		$csGo= Game::whereSlug('cs-go')->first();
		$dotaTwo = Game::whereSlug('dota-2')->first();

		// CS Skills
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Aim" ]);
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Economy" ]);
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Strategy" ]);
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Understanding" ]);
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Teamleading" ]);
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Ace" ]);
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Close combat" ]);
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Sneek"]);
		Skill::create([ 'game_id' => $csGo->id, 'name' => "Support"]);

		// Dota Skills
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Lasthit" ]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Map awareness" ]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Farm efficiency" ]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Lane control" ]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Advantage abusing" ]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Rune control" ]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Roam" ]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Creep equilibrium"]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "XP efficiency"]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Jungle efficiency"]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Positioning"]);
		Skill::create([ 'game_id' => $dotaTwo->id, 'name' => "Warding"]);
	}

}