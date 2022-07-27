<?php

use App\Http\Controllers\CountriesController;
use App\Http\Controllers\StatesCountroller;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('task', TaskController::class);
Route::get('/fetch/tasks', [TaskController::class, 'fetch'])->name('tasks.fetch');
Route::resource('countries', CountriesController::class);
Route::resource('states', StatesCountroller::class);