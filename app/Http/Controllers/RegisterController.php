<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends ApiController
{
    /**
     *
     * @param Request $request
     * @return array
     */
    public function reg(Request $request){
        if ($request->name== null || $request->email==null || $request->password==null)
            return $this->respondFail(['message'=> "thieu truong name hoac email hoac password ban oi"]);
        $check = User::where("email", $request->email)->first();
        if($check) return $this->respondFail(['message'=> "trung email ban oi"]);
        $user = new User;
        $user->name= $request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = JWTAuth::fromUser($user);

        return $this->respondSuccess([
            "user" => $user,
            "token" => $token
        ]);
    }
}
