<?php namespace ThreeAccents\Projects\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'proposer', 'is_admin'];




    /***********************/
    /*
     * Command Methods
     */
    /***********************/

    /**
     * @param $name
     * @param $slug
     * @param $description
     * @param $proposer
     * @return static
     */
    public static function add($name, $slug, $description, $proposer)
    {
        $project = new static(compact('name', 'slug', 'description', 'proposer', 'is_admin'));
        return $project;
    }

    /**
     * @param $id
     * @param $user_id
     * @return static
     */
    public static function propose($id, $user_id)
    {
        $project = new static(compact('id', 'user_id'));
        return $project;
    }

    /**
     * @param $id
     * @param $user_id
     * @return static
     */
    public static function accept($id, $user_id)
    {
        $project = new static(compact('id', 'user_id'));
        return $project;
    }

    /**
     * @param $id
     * @param $user_id
     * @return static
     */
    public static function decline($id, $user_id)
    {
        $project = new static(compact('id', 'user_id'));
        return $project;
    }





    /***********************/
    /*
     * Relationship Methods
     */
    /***********************/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposer()
    {
        return $this->belongsTo('ThreeAccents\Users\Entities\User', 'proposee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposedUsers()
    {
        return $this->belongsToMany('ThreeAccents\Users\Entities\User', 'user_assigned_project');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acceptedUsers()
    {
        return $this->belongsToMany('ThreeAccents\Users\Entities\User', 'user_accepted_project');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function declinedUsers()
    {
        return $this->belongsToMany('ThreeAccents\Users\Entities\User', 'user_declined_project');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\morphToMany
     */
    public function skills()
    {
        return $this->morphToMany('ThreeAccents\Skills\Entities\Skill', 'skillable');
    }

}