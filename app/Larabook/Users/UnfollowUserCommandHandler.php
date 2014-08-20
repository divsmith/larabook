<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;

class UnfollowUserCommandHandler implements CommandHandler {

    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        return $this->userRepo->unfollow($command->userId, $command->userIdToUnfollow);
    }

}