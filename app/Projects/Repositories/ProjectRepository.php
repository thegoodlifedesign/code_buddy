<?php namespace ThreeAccents\Projects\Repositories;

use Illuminate\Database\Eloquent\Model;
use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Projects\Entities\Project;
use ThreeAccents\Projects\Exceptions\ProjectNotFoundException;

class ProjectRepository extends EloquentRepository
{
    /**
     * @var Project
     */
    protected $model;

    /**
     * @param Project $model
     */
    function __construct(Project $model)
    {
        $this->model = $model;
    }




    /*******************************/
    /*
     * GETTERS
     */
    /*******************************/

    /**
     * @param $slug
     * @return mixed
     * @throws ProjectNotFoundException
     */
    public function getProject($slug)
    {
        $project =  $this->model->with('skills', 'proposer')->where('slug', '=', $slug)->first();

        if( ! $project) throw new ProjectNotFoundException;

        return $project;
    }

    /**
     * @param $id
     * @return mixed
     * @throws ProjectNotFoundException
     */
    public function getById($id)
    {
        $project = $this->getById($id);

        if( ! $project) throw new ProjectNotFoundException;

        return $project;
    }







    /********************************/
    /*
     * SETTERS
     */
    /********************************/

    /**
     * @param $project
     */
    public function persist($project)
    {
        $this->model->proposer = $project->proposer;
        $this->model->name = $project->name;
        $this->model->slug = $project->slug;
        $this->model->description = $project->description;
        $this->model->is_private = $project->is_private;

        $this->model->save();
    }

    /**
     * @param $project
     */
    public function propose($project)
    {
        $model_project = $this->getById($project->id);

        $model_project->proposedUsers()->attach($project->user_id);
    }

    /**
     * @param $project
     */
    public function accept($project)
    {
        $model_project = $this->getById($project->id);

        $model_project->acceptedUsers()->attach($project->user_id);
    }

    /**
     * @param $project
     */
    public function decline($project)
    {
        $model_project = $this->getById($project->id);

        $model_project->declinedUsers()->attach($project->user_id);
    }
}