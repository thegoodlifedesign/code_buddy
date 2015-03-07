<?php namespace ThreeAccents\Projects\Http\Sanitizers;

use ThreeAccents\Packages\Sanitizer\Sanitizer;
use ThreeAccents\Projects\Repositories\ProjectRepository;

class ProjectSanitizer extends Sanitizer
{
    protected $rules = [
        'name' => 'strtolower',
        'description' => 'strtolower',
        'slug' => 'name',
    ];

    function __construct(ProjectRepository $repo)
    {
        $this->repo = $repo;
    }
}