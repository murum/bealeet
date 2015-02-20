<?php namespace Bealeet\Skills;

use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Presenter\PresentableTrait;

class Skill extends Eloquent {

	use EventGenerator, PresentableTrait;

	/**
	 * Which fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'skills';
}