<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\LaravelController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;


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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/laravel', LaravelController::class)->except('show');

// ROUTES DATATABLE YAJRA
    // Route hutang -> AJAX
        Route::get('/hutang', [HutangController::class, 'index'])->name('ajax.index');          // name adalah route di jquery
        Route::get('/hutang/json', [HutangController::class, 'data'])->name('ajax.data');
    // Route Articles
        Route::resource('articles', ArticleController::class);
        Route::get('get-articles', [ArticleController::class, 'getArticles'])->name('get-articles');

// ROUTES MIDDLEWARE
Route::get('/user', [AdminController::class, 'index'])->name('user');
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [AdminController::class, 'admin'])->name('admin');
 });