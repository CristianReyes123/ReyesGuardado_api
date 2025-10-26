<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends controller
{
    public function sendResponse($result,$message)
    {
        $response =
        [
            'success' = > true,
            'data' => $result,
            'message'=> $message,
        ];

        return response()->json($response,200);
    }

    function sendError($error, $errorMessage = [], $code = 404)
    {
        $response =
        [
            'success' => false,
            'message' => $message,
        ];

        if(!empty($errorMessage))
        {
            $response['data'] = $errorMessage;
        }

        return response()->json($response,$code);
    }
}