<?php namespace Bealeet\Users;

class PrimaryUserGameCommand {
    public $favoriteGameId;

    /**
     * @param $favoriteGameId
     */
    function __construct($favoriteGameId)
    {
        $this->favoriteGameId = $favoriteGameId;
    }

}