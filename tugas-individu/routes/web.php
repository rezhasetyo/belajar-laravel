<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::view('/', 'home');
Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/mahasiswa', 'mahasiswa');
Route::view('/dataku', 'dataku', [
	'nama' => 'Rezha Setyo Atmojo',
	'alamat' => 'Las Vegas City, Provinsi Nevada',
	'nim' => '3.34.19.3.22',
	'semester' => '4',
	'ajaran' => '2021'
]);