<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    //
    private function respond($status,$data){
        return [
            "status" => $status,
            "data" => $data
        ];
    }

    public function respondSuccess($data){
        return $this->respond(1, $data);
    }
    public function respondFail($data){
        return $this->respond(0, $data);
    }
}
