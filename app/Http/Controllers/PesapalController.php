<?php

namespace App\Http\Controllers;

use App\Http\Controllers\helpers\HelperController;
use Illuminate\Http\Request;

class PesapalController extends Controller
{
    public function authentication()
    {
        //PesaPal Consumer Key: RwWM08qMmJZ5CZrXWV0NGqa7xMvEctIR
        // PesaPal Consumer Secret: fQ/x5/rGCLQ/6GavPXYso3yI2aY=
        $data = [
            "consumer_key" => "qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW",
            "consumer_secret" =>  "osGQ364R49cXKeOYSpaOnT++rHs="
        ];
        $url = "https://cybqa.pesapal.com/pesapalv3/api/Auth/RequestToken";
        $res = HelperController::post_request($url, $data);
        return json_decode($res)->token;
    }

    public function register_url()
    {
        $url = "https://cybqa.pesapal.com/pesapalv3/api/URLSetup/RegisterIPN";
        $data = [
            "url" =>  "https://www.kodhek.com/ipn",
            "ipn_notification_type" => "POST"
        ];
        $res = HelperController::auth_post_request($url, $data, $this->authentication());
        return $res;
    }

    public function get_ipns()
    {
        $url = "https://cybqa.pesapal.com/pesapalv3/api/URLSetup/GetIpnList";
        $res = HelperController::auth_http_get_request($url, $this->authentication());
        return $res;
    }

    public function submit()
    {
        $data = [
            "id" => "d344fb50-1401-4268-be19-dfc619f08dc8",
            "currency" => "KES",
            "amount" => 10.00,
            "description" => "Payment description goes here",
            "callback_url" => "https://www.kodhek.com/response-page",
            "notification_id" => "d344fb50-1401-4268-be19-dfc619f08dc8",
            "billing_address" => [
                "email_address" => "odenyothadeus@gmail.com",
                "phone_number" => "0743160199",
                "country_code" => "",
                "first_name" => "John",
                "middle_name" => "",
                "last_name" => "Doe",
                "line_1" => "",
                "line_2" => "",
                "city" => "",
                "state" => "",
                "postal_code" => null,
                "zip_code" => null
            ]
        ];
        $url = "https://cybqa.pesapal.com/pesapalv3/api/Transactions/SubmitOrderRequest";
        $res = HelperController::auth_post_request($url, $data, $this->authentication());
        return $res;
    }

    public function status()
    {
        $url = "https://cybqa.pesapal.com/pesapalv3/api/Transactions/GetTransactionStatus?orderTrackingId=96174c4a-4db6-4174-ad1b-dfc641fa8936";
        $res = HelperController::auth_http_get_request($url, $this->authentication());
        return $res;
    }
}