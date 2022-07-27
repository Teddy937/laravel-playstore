<?php

namespace App\Http\Controllers\helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    static public function success($message)
    {
        $res = [
            'status' => 200,
            'message' => $message
        ];
        return $res;
    }

    static public function fail($message)
    {
        $res = [
            'status' => 500,
            'message' => $message
        ];
        return $res;
    }
}