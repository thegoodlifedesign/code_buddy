<?php namespace ThreeAccents\Projects\Commands;

class NewProjectCommand
{
    public $name;
    public $slug;
    public $description;
    public $proposer;
    public $is_private;

    function __construct($name, $slug, $description, $proposer, $is_private)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->proposer = $proposer;
        $this->is_private = $is_private;
    }
}