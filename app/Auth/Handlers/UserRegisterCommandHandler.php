<?php namespace ThreeAccents\Auth\Handlers;

use ThreeAccents\Auth\Commands\UserRegisterCommand;
use ThreeAccents\Auth\Events\UserWasRegistered;
use ThreeAccents\Packages\Events\Dispatcher;
use ThreeAccents\Users\Entities\User;
use ThreeAccents\Users\Repositories\UserRepository;

class UserRegisterCommandHandler
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @var Dispatcher
     */
    protected $event;

    /**
     * @param UserRepository $userRepo
     * @param Dispatcher $event
     */
    function __construct(UserRepository $userRepo, Dispatcher $event)
    {
        $this->userRepo = $userRepo;
        $this->event = $event;
    }

    public function handle(UserRegisterCommand $command)
    {
        $user =  User::register($command->username, $command->slug, $command->first_name, $command->last_name, $command->email, $command->password);

        $this->userRepo->persist($user);

        $this->event->fire(new UserWasRegistered($user));
    }
}