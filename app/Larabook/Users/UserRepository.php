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
} 