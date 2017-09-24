<?php

namespace App\Http\Controllers;

use App\ImgPosts;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends ApiController
{
    //
    public function log(Request $request){
        $user = User::where("email", $request->email)->first();
        if($user == null)
            return $this->respondFail(['message'=>"sai email rui"]);
        if(Hash::check($request->password, $user->password)) {
            $token = JWTAuth::fromUser($user);
            return $this->respondSuccess([
                "token" => $token,
                "user" =>$user,
            ]);
        }
        return $this->respondFail(['message'=>"sai password rui"]);

    }
    public function searchuser(Request $request){
        $user= User::where("name","like","%$request->key%")->orWhere("email","like","%$request->key%")->get();
        return $this->respondSuccess([
            "user" => $user
        ]);

    }
    public function editprofile($userid,Request $request){
        $user =User :: find($userid);
        $photo = $request->file('photo');
        if($photo == null){
            $photoName = "chua co avt";} else{
        $destinationPath = base_path() . '/public/uploads/images/';
        $photoName = "http://".config("app.domain")."/uploads/images/".time().md5($photo->getClientOriginalName()).".".$photo->getClientOriginalExtension();}
        $photo->move($destinationPath, $photoName);

        $user->name=$request->name;
        $user->story=$request->story;
        $user->phonenumber=$request->phonenumber;
        $user->gender=$request->gender;
        $user->avt_url = $photoName;
        $user->save();
    }
    public function profile($userid,Request $request){
        $user =User :: find($userid);
        return $this->respondSuccess([
            "user" => $user
        ]);
    }

}
