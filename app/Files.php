<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    protected $table = 'file';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'path', 'extension', 'mimetype',
    ];
}
