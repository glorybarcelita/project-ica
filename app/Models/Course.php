<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function getIsActiveAttribute()
    {
        if($this->attributes['is_active'])
        {
            return "Active";
        }
        else
        {
            return "Inactive";    
        }
    }
}
