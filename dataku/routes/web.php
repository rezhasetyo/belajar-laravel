<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\FileUploadController;

Route::get('/', [MahasiswaController::class,'index']);
Route::get('/form', [MahasiswaController::class,'form']);
Route::post('/prosesform', [MahasiswaController::class,'prosesform']);
Route::get('/upload', [FileUploadController::class,'upload']);
Route::post('/prosesupload', [FileUploadController::class,'prosesupload']);


Route::view('/', 'home');
Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/mahasiswa', 'mahasiswa');
Route::view('/mahasiswacatch', 'mahasiswacatch');

Route::view('/dataku', 'dataku', [
	'nama' => ['Rezha Setyo Atmojo','Hanung Setiawan','Ki Joko Bodo',],
	'alamat' => ['Los Angeles','Bodja','Singaraja'],
	'nim' => ['3.34.19.3.22','3.34.19.3.10','3.34.19.3.66'],
	'semester' => '4',
	'ajaran' => '2021'
]);

Route::get('/mahasiswa/{nama}/{umur}/{kota}', function ($nama,$umur,$kota) {
	$arrMahasiswa = ["$nama","$umur","$kota"];

	return view('/mahasiswacatch',['data' => $arrMahasiswa]);
});

Route::get('/dataku/{nim}', function ($nim) {
	if ($nim=="3.34.19.3.22") {
		echo "NIM = 3.34.19.3.22<br>";
		echo "Nama = Rezha Setyo Atmojo<br>";
		echo "Alamat = Los Angeles";
	}
	elseif ($nim=="3.34.19.3.10") {
		echo "NIM = 3.34.19.3.10<br>";
		echo "Nama = Hanung Setiawan<br>";
		echo "Alamat = Bodja";
	}
	elseif ($nim=="3.34.19.3.66") {
		echo "NIM = 3.34.19.3.66<br>";
		echo "Nama = Ki Joko Bodo<br>";
		echo "Alamat = SIngaraja";
	}
	else{
		echo "NIM = $nim<br>";
		echo "Belum terdaftar sebagai mahasiswa";
	}
})->where('id', '[0-9][.]+');

Route::prefix('/admin')->group(function () {
	Route::get('/mahasiswa', function() {
		echo "<h1>Daftar Mahasiswa</h1>";
	});
	Route::get('/dosen', function() {
		echo "<h1>Daftar Dosen</h1>";
	});
	Route::get('/karyawan', function() {
		echo "<h1>Daftar Karyawan</h1>";
	});
});

Route::get('/nama', [MahasiswaController::class,'nama']);

Route::get('/mhs', [MahasiswaController::class,'mhs']);

Route::get('/dsn', [MahasiswaController::class,'dsn']);

Route::get('/glr', [MahasiswaController::class,'glr']);