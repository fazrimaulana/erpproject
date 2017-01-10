<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id', 'name', 'description', 'assign_to', 'start_at', 'end_at',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'assign_to', 'id');
    }

    public function file_task()
    {
        return $this->belongsToMany('App\Files', 'task_has_file', 'task_id', 'file_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Projects', 'project_id', 'id');
    }

}
