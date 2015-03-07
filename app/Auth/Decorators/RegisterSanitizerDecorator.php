<?php namespace ThreeAccents\Auth\Decorators;

use ThreeAccents\Tools\Slugger\Slugger;
use ThreeAccents\Users\Entities\User;
use ThreeAccents\Users\Repositories\UserRepository;

class UsernameSlugGeneratorDecorator
{
    use Slugger;

    public function handle($command)
    {
        $command->slug = $this->sluggifyUnique($command->username, new UserRepository(new User));
    }
}