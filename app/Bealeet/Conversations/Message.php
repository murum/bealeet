<?php namespace Bealeet\Conversations;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class Message
 * @package Bealeet\Conversation
 */
class Message extends Eloquent {

	use EventGenerator, PresentableTrait;

	/**
	 * Which fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['writer_id', 'conversation_id', 'message'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'conversation_message';

	/**
	 * Conversation relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function conversation() {
		return $this->belongsTo('\Bealeet\Conversations\Conversation', 'conversation_id');
	}


	/**
	 * User relationship
	 *
	 * @return $this
	 */
	public function writer() {
		return $this->belongsTo('\Bealeet\Users\User');
	}

}