<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function studentSchool()
    {
    	return $this->hasMany('App\Students_school', 'school_id', 'id');
    }

    public function schoolTeacher()
    {
    	return $this->hasMany('App\Teachers_school', 'school_id', 'id');
    }
}
