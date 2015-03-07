<?php namespace ThreeAccents\Projects\Commands;


class DeclineProjectCommand
{
    public $project_id;
    public $user_id;

    function __construct($project_id, $user_id)
    {
        $this->project_id = $project_id;
        $this->user_id = $user_id;
    }
}