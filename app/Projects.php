<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    //
    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'client_id', 'name', 'description', 'assign_to', 'start_at', 'end_at',
    ];

    public function client()
    {
    	return $this->belongsTo('App\Clients', 'client_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'assign_to', 'id');
    }

    public function user_team()
    {
        return $this->belongsToMany('App\User', 'project_has_team', 'project_id', 'user_id');
    }

    public function task()
    {
        return $this->hasMany('App\Tasks', 'project_id', 'id');
    }

    public function file_project()
    {
        return $this->belongsToMany('App\Files', 'project_has_file', 'project_id', 'file_id');
    }

}
