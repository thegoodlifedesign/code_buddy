<?php namespace ThreeAccents\Projects\Decorators;

use ThreeAccents\Packages\CommandBus\Contracts\CommandBus;
use ThreeAccents\Projects\Http\Sanitizers\ProjectSanitizer;

class SanitizeProjectDecorator implements CommandBus
{
    /**
     * @var ProjectSanitizer
     */
    protected $projectSanitizer;

    /**
     * @param ProjectSanitizer $projectSanitizer
     */
    function __construct(ProjectSanitizer $projectSanitizer)
    {
        $this->projectSanitizer = $projectSanitizer;
    }

    /**
     * @param $command
     */
    public function execute($command)
    {
        $this->projectSanitizer->sanitize($command);
    }
}