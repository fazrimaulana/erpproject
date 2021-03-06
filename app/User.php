<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'team_id', 'avatar', 'birthday', 'here_date', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id', 'id');
    }

    public function project()
    {
        return $this->belongsToMany('App\Projects', 'project_has_team', 'user_id', 'project_id');
    }

    public function task()
    {
        return $this->hasMany('App\Tasks','assign_to','id');
    }

}
