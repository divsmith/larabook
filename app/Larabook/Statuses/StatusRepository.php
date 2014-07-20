<?php namespace Larabook\Statuses; 

use Larabook\Users\User;

class StatusRepository {

    public function getAllForUser($userId)
    {
        return User::find($userId)->statuses()->get();
    }

    /**
     * Save a new status for a user
     *
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)->statuses()->save($status);
    }
} 