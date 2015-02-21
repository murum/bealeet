<?php namespace Bealeet\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Bealeet\Registration\Events\UserHasRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Hash;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait, MessageTrait, GameTrait, ReviewTrait, SkillTrait;

    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    protected $presenter = 'Bealeet\Users\UserPresenter';

    /**
     * Passwords must always be hashed.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Register a new user
     *
     * @param $username
     * @param $email
     * @param $password
     * @return User
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserHasRegistered($user));

        return $user;
    }

    /**
     * Determine if the given user is the same
     * as the current one.
     *
     * @param  $user
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user)) return false;

        return $this->username == $user->username;
    }

	/**
	 * Determine if the given user is the same
	 * as the current one.
	 *
	 * @param  $user
	 * @return bool
	 */
	public function isNot($user)
	{
		if (is_null($user)) return true;

		return $this->username != $user->username;
	}


	/**
	 * Returns true if the user has description
	 *
	 * @return bool
	 */
	public function hasDescription() {
		return empty($this->description) ? false : true;
	}

	/**
	 * Returns true if the user has an age
	 *
	 * @return bool
	 */
	public function hasAge() {
		return empty($this->age) ? false : true;
	}

	/**
	 * Returns true if the user has Location
	 *
	 * @return bool
	 */
	public function hasLocation() {
		return empty($this->location) ? false : true;
	}

}