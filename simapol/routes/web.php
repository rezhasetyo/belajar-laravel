<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrmawasController;

use App\Http\Controllers\OrmaController;

use App\Http\Controllers\FullCalenderController;
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
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('cek', function () {
    return view('ormas.orma_pdf');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', [App\Http\Controllers\OrmawasController::class, 'index'])->name('index');

Route::resource('ormawas', OrmawasController::class);

Route::resource('orma', OrmaController::class);

Route::get('/cetak_pdf', [App\Http\Controllers\OrmaController::class, 'cetak_pdf'])->name('cetak_pdf');

Route::get('full-calender', [FullCalenderController::class, 'index']);

Route::post('full-calender/action', [FullCalenderController::class, 'action']);

