<?php namespace Larabook\Users; 

class UserRepository {

    /**
     * Persist a User
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Get a paginated list of all users.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }

    /**
     * Fetch a user by their username.
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with(['statuses' => function($query)
        {
            $query->latest();
        }])->whereUsername($username)->first();
    }

    /**
     * Find a user by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Follow a user.
     *
     * @param $userId
     * @param $userIdToFollow
     * @return mixed
     */
    public function follow($userId, $userIdToFollow)
    {
        return User::find($userId)->follows()->attach($userIdToFollow);
    }

    public function unfollow($userId, $userIdToUnfollow)
    {
        return User::find($userId)->follows()->detach($userIdToUnfollow);
    }
} 