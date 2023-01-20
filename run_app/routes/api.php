<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiHutangController;
use App\Http\Controllers\Api\ApiCicilanController;
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


// Api Auth Laravel Sanctum
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('/hutang', ApiHutangController::class);
    Route::apiResource('/cicilan', ApiCicilanController::class)->only('index', 'show');
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});