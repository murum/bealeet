<?php namespace Bealeet\Users;

use Carbon\Carbon;
use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Laracasts\Presenter\PresentableTrait;

class PasswordToken extends Eloquent {

	/**
	 * Which fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'token'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'password_tokens';

	public function user() {
		return $this->belongsTo('Bealeet\Users\User');
	}

	public function isValid() {
		$now = Carbon::now();
		$now->modify('-60 minutes');
		if($now < $this->created_at) {
			return true;
		} else {
			return false;
		}
	}

}