<?php

namespace App\Http\Controllers;

use App\ImgPosts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class UploadImageController extends ApiController
{
    //
    public function upload(Request $request)
    {

        $photo = $request->file('photo');
        if($photo == null)
            return $this->respondFail(['message' => "quen browse anh rui"]);
        $destinationPath = base_path() . '/public/uploads/images/';
        $photoName = "http://".config("app.domain")."/uploads/images/".time().md5($photo->getClientOriginalName()).".".$photo->getClientOriginalExtension();
        $photo->move($destinationPath, $photoName);
        $imgPost = new ImgPosts;
        $imgPost->description=$request->description;
        $imgPost->user_id = Auth::id();
        $user=User::find($imgPost->user_id);
        $imgPost->user_name=$user->name;
        $imgPost->img_url = $photoName;
        $imgPost->save();
        return $this->respondSuccess([
            'imgPost'=>$imgPost
        ]);
    }
    public function display(Request $request) {
        $imgPosts = ImgPosts::orderBy('created_at', 'desc')->take(10)->skip(($request->page_id-1)*10)->get();

        return $this->respondSuccess([
            'img_posts'=>$imgPosts,

        ]);
    }
    public function like($img_id,Request $request){
        $imgPost= ImgPosts :: find($img_id);
        $imgPost->like=$request->like;
        $imgPost->save();

    }
}
