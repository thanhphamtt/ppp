<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImgPosts extends Model
{
    //
    use SoftDeletes;
    protected $table="imgPosts";
    public function post(){
        return $this->hasMany(ImgComments::class,'user_id');
    }
}
