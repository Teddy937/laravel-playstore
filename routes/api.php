<?php

use App\Http\Controllers\MpesaController;
use App\Http\Controllers\PesapalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth', [PesapalController::class, 'authentication']);
Route::post('register_url', [PesapalController::class, 'register_url']);
Route::get('ipns', [PesapalController::class, 'get_ipns']);
Route::post('submit', [PesapalController::class, 'submit']);
Route::get('status', [PesapalController::class, 'status']);

Route::get('/password', [MpesaController::class, 'mpesa_password']);
Route::get('/access/token', [MpesaController::class, 'new_access_token']);
Route::post('/stk/push', [MpesaController::class, 'stk_push']);
Route::post('mpesa/stk/push/callback/url/', [MpesaController::class, 'save_mpesa_response']);
Route::get('/transactions', [MpesaController::class, 'fetch']);