<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\RecordController;
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

Route::post('client', [ClientController::class, 'store']);
Route::get('client', [ClientController::class, 'show']);
Route::put('client/{id}', [ClientController::class, 'update']);

Route::apiResource('records', RecordController::class);
