<?php namespace Bealeet\Registration\Events;

use Bealeet\Users\User;

class UserHasRegistered {

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

} 