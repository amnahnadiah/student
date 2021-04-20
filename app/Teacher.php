<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function teacherProfile() 
    {
        return $this->belongsTo('App\Profile','prof_id', 'id');
    }
}
