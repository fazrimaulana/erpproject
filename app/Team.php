<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $table = 'teams';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'description',
    ];
}
