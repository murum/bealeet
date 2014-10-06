<?php

use Bealeet\Games\Game;

class GamesTableSeeder extends Seeder {

	/**
	 *
	 */
	public function run()
	{
		Game::create([
			'name' => 'Counter Strike: Global Offense',
			'slug' => 'cs-go'
		]);

		Game::create([
			'name' => 'Dota 2',
			'slug' => 'dota-2'
		]);
	}

}