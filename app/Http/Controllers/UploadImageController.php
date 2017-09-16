<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UploadImageController extends ApiController
{
    //
    public function upload(Request $request)
    {
        $photo = $request->file('photo');
        $destinationPath = base_path() . '/public/uploads/images/';
        $photoName = "http://".config("app.domain")."/uploads/images/".time().md5($photo->getClientOriginalName()).".".$photo->getClientOriginalExtension();
        $photo->move($destinationPath, $photoName);
        return $photoName;
    }
}
