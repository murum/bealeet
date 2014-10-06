<?php namespace Bealeet\Games;

use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Presenter\PresentableTrait;

class Game extends Eloquent {

	use EventGenerator, PresentableTrait;

	/**
	 * Which fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'slug', 'password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'games';
}