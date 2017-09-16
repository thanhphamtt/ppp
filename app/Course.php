<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    //
    use SoftDeletes;
    protected $table ="courses";
    public function studyClasses()
    {
        return $this->hasMany(StudyClass::class,'courses_id');
    }


}
