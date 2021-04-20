<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
     public function students()
    {
    	return $this->belongsTo('App\Student', 'stud_id', 'id');
    }
}
