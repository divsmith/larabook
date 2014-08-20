<?php namespace Larabook\Users; 

class FollowUserCommand {

    public $userId;

    public $userIdToFollow;

    function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }

}