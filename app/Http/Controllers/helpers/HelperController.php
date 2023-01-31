<?php

namespace App\Http\Controllers\helpers;

use App\Http\Controllers\Controller;
use Exception;
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

    static public function post_request($url, $body)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Accept:application/json'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($body)
            )
        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }

    static public function auth_post_request($url, $body, $token)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $token, 'Content-Type:application/json', 'Accept:application/json'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($body)
            )
        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }

    /**
     * Method auth_http_get_request
     *
     * @return void
     */
    static public function auth_http_get_request($url, $token)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $token, 'Content-Type: application/json'),
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true,
            )
        );
        $curl_response = curl_exec($curl);
        //return $curl_response;
        curl_close($curl);
        if ($curl_response === false) {
            throw new Exception(curl_error($curl), curl_errno($curl));
        }
        return json_decode($curl_response);
    }
}