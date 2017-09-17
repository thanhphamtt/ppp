<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
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
                "token" => $token
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

}
