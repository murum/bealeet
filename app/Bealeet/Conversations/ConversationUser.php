<?php namespace Bealeet\Conversations;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class ConversationUser
 * @package Bealeet\Conversation
 */
class ConversationUser extends Eloquent {

	protected $primaryKey = null;
	public $incrementing = false;


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'conversation_user';

	/**
	 * Conversation relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function conversation() {
		return $this->belongsTo('Bealeet\Conversations\Conversation');
	}


	/**
	 * User relationship
	 *
	 * @return $this
	 */
	public function user() {
		return $this->belongsTo('Bealeet\Users\User');
	}

}