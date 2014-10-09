<?php namespace Bealeet\Users;

use Bealeet\Games\Game;

trait GameTrait {

	/**
	 * Get the list of games for the user.
	 *
	 * @return mixed
	 */
	public function games()
	{
		return $this->belongsToMany('Bealeet\Games\Game', 'users_games')->withPivot('favorite')->withTimestamps();
	}

	/**
	 * Determine if a user has favorited a game
	 *
	 * @return bool
	 */
	public function hasAFavoriteGame()
	{
		return ($this->games()->whereFavorite(true)->count() > 0);
	}

	/**
	 * Return users favorited game
	 *
	 * @return bool
	 */
	public function favoriteGame()
	{
		return $this->games()->whereFavorite(true)->first();
	}

	/**
	 * Return true if the user has more than one game added to the account
	 *
	 * @return bool , true if the user games count is more than one,
	 */
	public function hasMoreThanOneGame()
	{
		return ($this->games()->count() > 1);
	}

	/**
	 * Return true if the user has only one game added to the accountgit
	 *
	 * @return bool
	 */
	public function hasOneGame()
	{
		return ($this->games()->count() == 1);
	}

	/**
	 * Returns tha games id in a list
	 *
	 * @return mixed
	 */
	public function listUserGamesId()
	{
		return $this->games()->lists('game_id', 'game_id');
	}

	/**
	 * Returns tha games in a list
	 *
	 * @return mixed
	 */
	public function listUserGames()
	{
		return $this->games()->lists('name', 'game_id');
	}

	/**
	 * Return all games in a list
	 *
	 * @return array
	 */
	public function listGames()
	{
		return Game::all()->lists('name', 'id');
	}


	/**
	 * Return all games that's not already associated with a user
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function listAvailableGames()
	{
		$game_ids = $this->games()->lists('game_id');
		return Game::whereNotIn('id', $game_ids)->lists('name', 'id');
	}

}