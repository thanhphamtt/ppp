<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    //
    use SoftDeletes;
    protected $table="posts";
    public function comment(){
        return $this->hasMany(Comment::class, 'user_id');
    }

}
