<?php namespace ThreeAccents\Projects\Events;

use ThreeAccents\Projects\Entities\Project;

class ProjectProposalWasAccepted
{
    protected $project;

    function __construct(Project $project)
    {
        $this->project = $project;
    }
}