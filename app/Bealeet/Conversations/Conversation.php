<?php namespace Bealeet\Conversations;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class Conversation
 * @package Bealeet\Conversation
 */
class Conversation extends Eloquent {

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
	protected $table = 'conversations';


	/**
	 * @var string
	 */
	protected $presenter = 'Bealeet\Conversations\MessagePresenter';

	/**
	 * Messages relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function messages() {
		return $this->hasMany('Bealeet\Conversations\Message', 'conversation_id');
	}


	/**
	 * User relationship
	 *
	 * @return $this
	 */
	public function users() {
		return $this->belongsToMany('Bealeet\Users\User')->withPivot('last_read');
	}

}