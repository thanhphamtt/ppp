<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyClass extends Model
{
    protected $table = "classes";
    public function course()
    {
        return $this->belongsTo(Course::class,'courses_id');
    }
    public $timestamps = false;

}
