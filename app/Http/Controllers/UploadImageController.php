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
        if($request->file == null)
            return $this->respondFail(['message' => "quen browse anh rui"]);
        $photo = $request->file('photo');
        $destinationPath = base_path() . '/public/uploads/images/';
        $photoName = "http://".config("app.domain")."/uploads/images/".time().md5($photo->getClientOriginalName()).".".$photo->getClientOriginalExtension();
        $photo->move($destinationPath, $photoName);
        $imgPost = new ImgPosts;
        $imgPost->description=$request->description;
        $imgPost->user_id = Auth::id();
        $imgPost->img_url = $photoName;
        $imgPost->save();
        return $this->respondSuccess(['messgae' => "dang anh thanh cong"]);
    }
}
