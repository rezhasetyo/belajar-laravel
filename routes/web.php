<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\LaravelController;

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

// Route::get('/', function () {    return view('welcome'); });


// Route::resource('/hutang', HutangController::class);
Route::resource('/ajax', AjaxController::class);
Route::resource('/laravel', LaravelController::class);

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
