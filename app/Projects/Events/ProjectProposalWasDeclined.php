<?php namespace ThreeAccents\Projects\Events;

use ThreeAccents\Projects\Entities\Project;

class ProjectProposalWasDeclined
{
    protected $project;

    function __construct(Project $project)
    {
        $this->project = $project;
    }
}