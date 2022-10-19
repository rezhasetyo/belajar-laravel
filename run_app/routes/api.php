<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthSanctumController;

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

// Route::apiResource('/hutang', App\Http\Controllers\Api\ApiHutangController::class);

// Api Auth Laravel Sanctum
Route::post('/sanctum-register', [AuthSanctumController::class, 'register']);
Route::post('/sanctum-login', [AuthSanctumController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('/sanctum-hutang', App\Http\Controllers\Api\ApiHutangController::class);
    Route::post('/sanctum-logout', [AuthSanctumController::class, 'logout']);
});