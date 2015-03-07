<?php namespace ThreeAccents\Users\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Users\Http\Transformers\UserTransformer;
use ThreeAccents\Users\Services\UserService;

class UserController extends ApiController
{
    protected $fractal;
    protected $userService;

    function __construct(Manager $fractal, UserService $userService)
    {
        $this->fractal = $fractal;
        $this->userService = $userService;
    }
}