<?php namespace ThreeAccents\Users\Repositories;


use Illuminate\Support\Facades\Hash;
use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Users\Entities\User;

class UserRepository extends EloquentRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @param User $model
     */
    function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Get a user with its relationships
     * by its slug
     *
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getUser($slug)
    {
        return $this->model->with('skills')->where('slug', '=', $slug)->first();
    }

    /**
     * Get all users with their relationships
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUsers()
    {
        return $this->model->with('skills')->get();
    }

    /**
     * Get all of the latest users
     * with their relationships
     *
     * @return mixed
     */
    public function getLatestUsers()
    {
        return $this->model->with('skills')->latest()->get();
    }

    /**
     * @param $user
     */
    public function persist($user)
    {
        $this->model->username = $user->username;
        $this->model->slug = $user->slug;
        $this->model->first_name = $user->first_name;
        $this->model->last_name = $user->last_name;
        $this->model->email = $user->email;
        $this->model->passowrd = Hash::make($user->passowrd);

        $this->model->save();
    }
}