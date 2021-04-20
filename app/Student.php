<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function profiles()
    {
        return $this->belongsTo('App\Profile', 'prof_id', 'id');
    }

     public function guardians()
    {
    	return $this->hasOne('App\Guardian', 'stud_id', 'id');
    }

    public function studentSchool()
    {
    	return $this->hasMany('App\Students_school', 'stud_id', 'id'); 
    }
}   
