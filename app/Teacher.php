<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function teacherProfile() 
    {
        return $this->belongsTo('App\Profile','prof_id', 'id');
    }

    public function teacherSchool() 
    {
        return $this->hasMany('App\Students_school', 'teacher_id', 'id'); 
    }
}
