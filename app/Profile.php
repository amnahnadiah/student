<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function profileTeacher() 
    {
        return $this->hasOne('App\Teacher','prof_id', 'id');
    }

    public function profileUser() 
    {
        return $this->belongsTo('App\User', 'user_id', 'id');

    public function students()
    {
        return $this->hasMany('App\Student', 'prof_id','id');
    }

    public function alamats()
    {
    	return $this->hasOne('App\Alamat', 'prof_id', 'id');
    }
}
