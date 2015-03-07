<?php namespace ThreeAccents\Users\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Users\Entities\User;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'skills'
    ];

    public function transform(User $user)
    {
        return [
            'username' => $user->username,
            'full_name' => $user->full_name,
            'bio' => $user->details->bio,
            'email' => $user->email,
            'is_admin' => (bool) $user->is_admin,

            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/api/v1/'.$user->slug.'/details'
                ]
            ],
        ];
    }

    public function includeSkills(User $user)
    {
        $skills = $user->skills;

        return $this->collection($skills, new SkillTransformer);
    }
}