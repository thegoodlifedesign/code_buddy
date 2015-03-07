<?php namespace ThreeAccents\Auth\Http\Sanitizers;

use ThreeAccents\Packages\Sanitizer\Sanitizer;
use ThreeAccents\Users\Repositories\UserRepository;

class RegisterSanitizer extends Sanitizer
{
    protected $rules = [
        'username' => 'strtolower',
        'first_name' => 'strtolower',
        'last_name' => 'strtolower',
        'email' => 'strtolower',
        'slug' => 'username',
    ];

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }
}