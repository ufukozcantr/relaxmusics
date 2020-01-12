<?php

namespace App\Traits;


trait ResponseSupport
{

    // success response is standard
    public static function success($successMessage, $successCode = 200, $data = null){

        return response()->json([
            'successMessage' => $successMessage,
            'successCode' => $successCode,
            'data' => $data
        ], $successCode);

    }

    // error response is standard
    public static function error($errorMessage, $errorCode = 400, $data = null){

        return response()->json([
            'errorMessage' => $errorMessage,
            'errorCode' => $errorCode,
            'data' => $data
        ], $errorCode);

    }

}
