<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    //
    protected $table = 'users_api';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password', 'api_token',
    ];
}
