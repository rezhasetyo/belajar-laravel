<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\BayarController;
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

# Routes Crud Hutang
Route::get('/hutang', [HutangController::class, 'index'])->name('hutang.home');
Route::get('/hutang/tambah', [HutangController::class, 'form'])->name('hutang.form.tambah');
Route::get('/hutang/edit/{id}', [HutangController::class, 'form'])->name('hutang.form.edit');
Route::post('/hutang/save', [HutangController::class, 'save'])->name('hutang.save');
Route::post('/hutang/delete/{id}', [HutangController::class, 'delete'])->name('hutang.delete');

# Routes Datatable Yajra
Route::get('/yajra/hutang', [YajraHutangController::class, 'index'])->name('yajraHutang.index');
Route::resource('/yajra/articles', YajraArticleController::class);
Route::get('get-articles', [YajraArticleController::class, 'getArticles'])->name('get-articles');

# Routes Verifikasi Email
Auth::routes(['verify'=>true]);
Route::get('/user', [StatusController::class, 'index'])->name('user');
Route::get('/verif-email', [StatusController::class, 'verifEmail'])->name('verifEmail');

# Routes Middleware Role
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [StatusController::class, 'admin'])->name('admin');
 });

// Routes Payment Gateway
Route::get('/bayar', [BayarController::class, 'index']);
Route::get('/bayar/{id}', [BayarController::class, 'bayar']);
Route::post('bayar/payment_post/{id}', [BayarController::class, 'payment_post']);