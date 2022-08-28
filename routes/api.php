<?php

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

Route::post('client', [\App\Http\Controllers\ClientController::class, 'store']);
Route::get('client', [\App\Http\Controllers\ClientController::class, 'show']);
Route::put('client/{id}', [\App\Http\Controllers\ClientController::class, 'update']);
