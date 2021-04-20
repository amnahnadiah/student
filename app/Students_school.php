<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students_school extends Model
{
      public function students()
    {
    	return $this->belongsTo('App\Student', 'stud_id','id');
    }

     public function schools()
    {
    	return $this->belongsTo('App\School', 'school_id', 'id'); 
    }
}
