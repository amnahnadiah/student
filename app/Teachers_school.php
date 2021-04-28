<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers_school extends Model
{
    public function teachers()
    {
    	return $this->belongsTo('App\Teacher', 'teacher_id','id');
    }

     public function schools()
    {
    	return $this->belongsTo('App\School', 'school_id', 'id'); 
    }
}
