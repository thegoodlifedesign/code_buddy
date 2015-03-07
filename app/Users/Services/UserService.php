<?php namespace ThreeAccents\Users\Services;

use ThreeAccents\Users\Repositories\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @param UserRepository $userRepo
     */
    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param $user_slug
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getUser($user_slug)
    {
        return $this->userRepo->getUserBySlug($user_slug);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUsers()
    {
        return $this->userRepo->getUsers();
    }
}