<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\YajraHutangController;
use App\Http\Controllers\YajraArticleController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/hutang', HutangController::class)->except('show');

// ROUTES DATATABLE YAJRA
    Route::get('/yajra/hutang', [YajraHutangController::class, 'index'])->name('yajraHutang.index');          // name adalah route di jquery
    // Route Articles
        Route::resource('/yajra/articles', YajraArticleController::class);
        Route::get('get-articles', [YajraArticleController::class, 'getArticles'])->name('get-articles');

// ROUTES MIDDLEWARE
Auth::routes(['verify'=>true]);
Route::get('/user', [StatusController::class, 'index'])->name('user');
Route::get('/verif-email', [StatusController::class, 'verifEmail'])->name('verifEmail');

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [StatusController::class, 'admin'])->name('admin');
 });

 // Routes Bayar Hutang (Payment Gateway)
 Route::get('/bayar', function () { return view('bayar.index'); });