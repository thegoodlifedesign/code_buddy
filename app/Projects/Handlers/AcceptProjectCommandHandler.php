<?php namespace ThreeAccents\Projects\Handlers;


use ThreeAccents\Packages\Events\Dispatcher;
use ThreeAccents\Projects\Commands\AcceptProjectCommand;
use ThreeAccents\Projects\Entities\Project;
use ThreeAccents\Projects\Events\ProjectProposalWasAccepted;
use ThreeAccents\Projects\Repositories\ProjectRepository;

class AcceptProjectProposalCommandHandler
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
     * @param AcceptProjectCommand $command
     */
    public function handle(AcceptProjectCommand $command)
    {
        $project = Project::accept($command->project_id, $command->user_id);

        $this->projectRepo->accept($project);

        $this->event->fire(new ProjectProposalWasAccepted($project));
    }
}