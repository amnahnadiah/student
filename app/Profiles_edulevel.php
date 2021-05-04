<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles_edulevel extends Model
{
    public function profilesOne()
    {
      return $this->hasOne('App\Profile', 'id', 'prof_id'); 
    }

    public function edulevelsOne()
    {
      return $this->hasOne('App\Edulevel', 'id', 'edu_id'); 
    }
}