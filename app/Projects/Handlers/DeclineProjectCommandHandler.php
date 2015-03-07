<?php namespace ThreeAccents\Projects\Handlers;

use ThreeAccents\Packages\Events\Dispatcher;
use ThreeAccents\Projects\Commands\DeclineProjectCommand;
use ThreeAccents\Projects\Entities\Project;
use ThreeAccents\Projects\Events\ProjectProposalWasDeclined;
use ThreeAccents\Projects\Repositories\ProjectRepository;

class DeclineProjectCommandHandler
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepo;

    /**
     * @var Dispatcher
     */
    protected $event;

    /**
     * @param ProjectRepository $projectRepo
     * @param Dispatcher $event
     */
    function __construct(ProjectRepository $projectRepo, Dispatcher $event)
    {
        $this->projectRepo = $projectRepo;
        $this->event = $event;
    }

    /**
     * @param DeclineProjectCommand $command
     */
    public function handle(DeclineProjectCommand $command)
    {
        $project = Project::decline($command->project_id, $command->user_id);

        $this->projectRepo->decline($project);

        $this->event->fire(new ProjectProposalWasDeclined($project));
    }
}