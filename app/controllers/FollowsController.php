<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Follow a user.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now following this user.');
        return Redirect::back();
	}

    /**
     * Unfollow a user.
     *
     * @param $userIdToUnfollow
     * @return mixed
     */
    public function destroy($userIdToUnfollow)
	{
        $this->execute(UnfollowUserCommand::class);

        Flash::success('You have now unfollowed this user.');

        return Redirect::back();
	}


}
