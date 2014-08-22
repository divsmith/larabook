<?php namespace Larabook\Users; 

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    /**
     * Present a link to the user's gravatar
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }

    /**
     * Display the number of users following the current user.
     *
     * @return string
     */
    public function followerCount()
    {
        $count = $this->entity->followers()->count();
        $plural = str_plural('Follower', $count);

        return "{$count} {$plural}";
    }
} 