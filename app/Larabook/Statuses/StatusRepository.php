<?php namespace Larabook\Statuses; 

use Larabook\Users\User;

class StatusRepository {

    public function getAllForUser($userId)
    {
        return User::find($userId)->statuses()->with('user')->latest()->get();
    }

    /**
     * Get the feed for a user.
     *
     * @param $userId
     * @return mixed
     */
    public function getFeedForUser($userId)
    {
        $user = User::find($userId);
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();
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