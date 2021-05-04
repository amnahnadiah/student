<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edulevel extends Model
{
   public function profileEdulevelOne() 
    {
        return $this->hasMany('App\Profiles_edulevel', 'edu_id', 'id'); 
    }
}
