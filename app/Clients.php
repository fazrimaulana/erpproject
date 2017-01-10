<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //
    protected $table = 'clients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'company_name', 'country_code', 'address', 'province', 'city', 'pos_code', 'email', 'no_hp',
    ];

    public function countries()
    {
    	return $this->belongsTo('App\Countries', 'country_code', 'code');
    }

}
