<?php

namespace App\Http\Controllers;

use App\ImgComments;
use Illuminate\Http\Request;

use App\Http\Requests;

class ImgCommentController extends ApiController
{
    //
    public function upComment($imgPost_id,Request $request){
       // if($request->content ==null) return $this->respondFail(['message' => "them mo ta di"]);

    }
}
