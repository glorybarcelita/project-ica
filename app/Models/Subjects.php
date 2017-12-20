<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    public function courses()
    {
        return $this->belongsTo('App\Models\Course','course_id','id');
    }
}
