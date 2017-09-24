<?php

namespace App\Http\Controllers;

use App\ImgComments;
use App\ImgPosts;
use App\Postlike;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use function PHPSTORM_META\map;

class UploadImageController extends ApiController
{
    //
    public function upload(Request $request)
    {

        $photo = $request->file('photo');
        if ($photo == null)
            return $this->respondFail(['message' => "quen browse anh rui"]);
        $destinationPath = base_path() . '/public/uploads/images/';
        $photoName = "http://" . config("app.domain") . "/uploads/images/" . time() . md5($photo->getClientOriginalName()) . "." . $photo->getClientOriginalExtension();
        $photo->move($destinationPath, $photoName);
        $imgPost = new ImgPosts;
        $imgPost->description = $request->description;
        $imgPost->user_id = Auth::id();
        $user = User::find($imgPost->user_id);
        $imgPost->user_name = $user->name;
        $imgPost->img_url = $photoName;
        $imgPost->save();
        return $this->respondSuccess([
            'imgPost' => $imgPost
        ]);
    }

    public function display(Request $request)
    {
        $imgPosts = ImgPosts::orderBy('created_at', 'desc')->take(10)->skip(($request->page_id - 1) * 10)->get();
//        $posts = $imgPosts->map(function($post){
//           return $post->transform();
//        });
        return $this->respondSuccess([
            'img_posts' => $imgPosts,

        ]);
    }

    public function likeUnlike($img_id, $user_id, Request $request)
    {
        $Post = Postlike:: where("post_id", $img_id)->where("user_id", $user_id)->first();
        //dd($Post->post_id);
        $imgPost = ImgPosts::find($img_id);
        if ($Post) {
            $imgPost->like = $imgPost->like - 1;
            $Post->delete();
            $imgPost->save();
            return $this->respondSuccess([
                "like_count" => $imgPost->like
            ]);
        } else {
            $imgPost->like = $imgPost->like + 1;
            $post1 = new Postlike;
            $post1->post_id = $img_id;
            $post1->user_id = $user_id;
            $post1->save();
            $imgPost->save();
            return $this->respondSuccess([
                "like_count" => $imgPost->like
            ]);
        }
    }
    public function deletePost($post_id, $user_id, Request $request) {
        $post = ImgPosts::find($post_id);
        if($post->user_id != $user_id)
            return $this->respondFail([
               "message" => "watttt"
            ]);
//        $cmts = $post->comments;
//        $cmts->delete();
        $post->delete();
        return $this->respondSuccess([
            "message" => "ok"
        ]);
    }
}
