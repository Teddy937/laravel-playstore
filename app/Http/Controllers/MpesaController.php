<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    static public function mpesa_password()
    {
        // timestamp
        $timestamp = Carbon::rawParse('now')->format('YmdHms');
        //passkey
        $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        //businessShortCode
        $businessShortCode = '174379';
        //generate Password
        $mpesaPassword = base64_encode($businessShortCode . $passkey . $timestamp);

        return $mpesaPassword;
    }

    static public function new_access_token()
    {
        $consumer_key = "xltiA1nAORbt0k7xcUcaiBr9TBY94MhZ";
        $consumer_secret = "0wdzMZLta0wscI9f";
        $credentials = base64_encode($consumer_key . ":" . $consumer_secret);
        //return $credentials;
        //$url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

        $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Basic cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch));
        curl_close($ch);


        return $response->access_token;
    }

    static public function stk_push()
    {
        $id = bin2hex(random_bytes(20));
        $curl_post_data = [
            'BusinessShortCode' => "174379",
            'Password' => MpesaController::mpesa_password(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 5,
            'PartyA' => "174379",
            'PartyB' => "174379",
            'PhoneNumber' => 254743160199,
            'CallBackURL' => 'https://investornpeers.co.ke/api/mpesa/stk/push/callback/url/' . $id,
            'AccountReference' => 'EAWLS Members Portal test',
            'TransactionDesc' => 'Lipa Na Mpesa',
        ];
        $data_string = json_encode($curl_post_data);
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . MpesaController::new_access_token())); //setting a custom header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        $data = json_decode($curl_response);
        return $data->ResponseCode;
    }

    static public function save_mpesa_response(Request $request, $id)
    {
        $feeback = $request->getContent();
        Feedback::create(['identity' => $id, 'feedback' => $feeback]);
        // $response = json_decode($feeback);
        // $data = $response->Body->stkCallback->CallbackMetadata->Item;
        // $amount = $data[0]->Value;
        // $trans_id = $data[1]->Value;
        // $phone = $data[4]->Value;
        // $p = $amount * 0.05;
        // $user_plan = user_plan::where('code', $id)->first();
        // $user_plan->transaction_id = $trans_id;
        // $user_plan->transaction_amount = $amount;
        // $user_plan->phone = $phone;
        // $user_plan->payment_status = '1';
        // $user_plan->status = 1;
        // $user_plan->save();
        // $user = User::where('id', 6951)->first();
        // $user->account_balance = $user->account_balance + $p;
        // $user->save();
    }

    public function fetch()
    {
        //Feedback::create(['identity' => 'FDYDTFDTFUYGKGY', 'feedback' => '$feeback']);
        $feeback = Feedback::all();
        return response()->json(['feedback' => $feeback]);
    }
}