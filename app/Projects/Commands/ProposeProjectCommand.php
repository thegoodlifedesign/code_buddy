<?php namespace ThreeAccents\Projects\Commands;

class ProposeProjectCommand
{
    public $project_id;
    public $proposee;

    function __construct($project_id, $proposee)
    {
        $this->project_id = $project_id;
        $this->proposee = $proposee;
    }
}