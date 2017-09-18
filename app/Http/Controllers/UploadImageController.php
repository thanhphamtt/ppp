<?php

namespace App\Http\Controllers;

use App\ImgPosts;
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
}
