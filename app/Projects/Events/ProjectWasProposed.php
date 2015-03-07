<?php namespace ThreeAccents\Projects\Events;

use ThreeAccents\Projects\Entities\Project;

class ProjectWasProposed
{
    protected $project;

    function __construct(Project $project)
    {
        $this->project = $project;
    }
}