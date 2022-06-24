<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function course(){
        return $this->belongsTo('App\Course','course_id','id');
    }

    public function marks(){
        return $this->hasMany('App\Marks','student_id','id');
    }
}
