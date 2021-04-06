<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function getAttribute($key)
    {
        $profile = Profile::where('user_id', '=', $this->attributes['id'])->first()->toArray();

        foreach ($profile as $attr => $value) {
            if (!array_key_exists($attr, $this->attributes)) {
                $this->attributes[$attr] = $value;
            }
        }
        
        return parent::getAttribute($key);
    }
}
