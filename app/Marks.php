<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    protected $guarded = [];

    public function student(){
        return $this->belongsTo('App\Student','student_id','id');
    }

}
