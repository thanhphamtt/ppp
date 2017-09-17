<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    //
    private function respond($status,$data){
        return response()->json([
            "status" => $status,
            "data" => $data
        ],200);
    }

    public function respondSuccess($data){
        return $this->respond(1, $data);
    }
    public function respondFail($data){
        return $this->respond(0, $data);
    }
}
