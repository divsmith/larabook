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
        $users = User::simplePaginate($howMany);

        return View::make('users.index')->withUsers($users);
    }
} 