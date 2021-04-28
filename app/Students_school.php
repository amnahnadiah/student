<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students_school extends Model
{
      public function students()
    {
    	return $this->hasMany('App\Student', 'stud_id','id');
    }

     public function schools()
    {
    	return $this->hasMany('App\School', 'school_id', 'id'); 
    }

     public function schoolsOne()
    {
    	return $this->hasOne('App\School', 'id', 'school_id'); 
    }

     public function studentsOne()
    {
      return $this->hasOne('App\Student', 'id', 'stud_id'); 
    }
}
