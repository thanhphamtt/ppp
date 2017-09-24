<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImgPosts extends Model
{
    //
    use SoftDeletes;
    protected $table="imgPosts";

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments(){
        return $this->hasMany(ImgComments::class, "post_id");
    }

    public function transform (){
        $data = [
            "id" => $this->id,
            "description" => $this->description,
            "image_url" => $this->image_url,
            "user" => [
                "id" => $this->user->id
            ]
        ];
        return $data;
    }
}
