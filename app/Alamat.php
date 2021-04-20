<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    public function profiles()
    {
    	return $this->belongsTo('App\Profile', 'prof_id', 'id');
    }
}

