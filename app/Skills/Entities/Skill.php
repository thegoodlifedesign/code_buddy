<?php namespace ThreeAccents\Skills\Entities;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->morphedByMany('ThreeAccents\Users\Entities\User', 'skillable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->morphedByMany('ThreeAccents\Projects\Entities\Project', 'skillable');
    }

}