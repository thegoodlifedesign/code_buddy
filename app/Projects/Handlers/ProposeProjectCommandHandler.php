<?php namespace ThreeAccents\Projects\Handlers;


use ThreeAccents\Packages\Events\Dispatcher;
use ThreeAccents\Projects\Commands\ProposeProjectCommand;
use ThreeAccents\Projects\Entities\Project;
use ThreeAccents\Projects\Events\ProjectWasProposed;
use ThreeAccents\Projects\Repositories\ProjectRepository;

class ProposeProjectCommandHandler
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

    public function handle(ProposeProjectCommand $command)
    {
        $project = Project::propose($command->project_id, $command->proposee);

        $this->projectRepo->propose($project);

        $this->event->fire(new ProjectWasProposed($project));
    }
}