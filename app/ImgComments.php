<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgComments extends Model
{
    //
    use SoftDeletes;
    protected $table="imgComments";
    public function post(){
        return $this->belongsTo(ImgPosts::class,'user_id');
    }
}
