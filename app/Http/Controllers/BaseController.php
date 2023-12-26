<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result , $message ,$status=200)
    {
        $data = [
            'success' => true,
            'message' => $message,
            'data' => $result,
            'erros' => null ,
            'status' =>$status

        ];
        return response()->json($data);
    }

    public function sendError($erros)
    {
        $data = [
            'success' => false,
            'message' => "validation faild",
            'data' => null,
            'erros' => $erros ,
            'status' =>401
        ];
        return response()->json($data);

    }    
}
