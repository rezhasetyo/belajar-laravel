<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\LaravelController;
use App\Http\Controllers\ArticleController;


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

// Route hutang -> AJAX
Route::resource('/laravel', LaravelController::class);
Route::get('/hutang', [HutangController::class, 'index'])->name('ajax.index');          // name adalah route di jquery
Route::get('/hutang/json', [HutangController::class, 'data'])->name('ajax.data');

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Resource Route for article.
Route::resource('articles', ArticleController::class);
// Route for get articles for yajra post request.
Route::get('get-articles', [ArticleController::class, 'getArticles'])->name('get-articles');
