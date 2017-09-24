<?php

namespace App\Http\Controllers;

use App\ImgComments;
use App\ImgPosts;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ImgCommentController extends ApiController
{
    //
    public function upComment($img_id,Request $request){
        if($request->comment_content ==null) return $this->respondFail(['message' => "them mo ta di"]);
        $imgC= new ImgComments;
        $imgC->post_id= $img_id;
        $imgC->user_id=Auth::id();
        $imgC->content=$request->comment_content;
        $imgC->save();
        return $this->respondSuccess([
            'imgC'=>$imgC,
        ]);
    }
    public function displayComment(Request $request) {
        $imgComments = ImgComments::orderBy('created_at', 'desc')->get();
        return $this->respondSuccess([
            'img_comments'=>$imgComments
        ]);
    }
    public function deletecmt($cmt_id,$user_id,Request $request){
        $cmt= ImgComments::find($cmt_id);
        if($cmt->user_id != $user_id) return $this->respondFail([
            "pp" => "lao vc"
        ]);
        $cmt->delete();
        return $this->respondSuccess([
            'p'=>1
        ]);
    }
}
