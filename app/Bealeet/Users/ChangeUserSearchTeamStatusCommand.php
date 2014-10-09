<?php namespace Bealeet\Users;

class ChangeUserSearchTeamStatusCommand {

    public $isSearching;

    /**
     * @param $isSearching
     */
    function __construct($isSearching)
    {
        $this->isSearching = $isSearching;
    }

}