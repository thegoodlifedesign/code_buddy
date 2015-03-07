<?php namespace ThreeAccents\Projects\Handlers;

use ThreeAccents\Packages\Events\Dispatcher;
use ThreeAccents\Projects\Commands\NewProjectCommand;
use ThreeAccents\Projects\Entities\Project;
use ThreeAccents\Projects\Events\ProjectWasCreated;
use ThreeAccents\Projects\Repositories\ProjectRepository;

class NewProjectCommandHandler
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepo;

    /**
     * @var Dispatcher
     */
    protected $event;

    function __construct(ProjectRepository $projectRepo, Dispatcher $event)
    {
        $this->projectRepo = $projectRepo;
        $this->event = $event;
    }

    /**
     * @param NewProjectCommand $command
     */
    public function handle(NewProjectCommand $command)
    {
        $project = Project::add($command->name, $command->slug, $command->description, $command->proposer, $command->is_private);

        $this->projectRepo->persist($project);

        $this->event->fire(new ProjectWasCreated($project));
    }
}