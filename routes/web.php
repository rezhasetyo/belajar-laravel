<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/mahasiswa', 'mahasiswa');
Route::view('/dataku', 'dataku', [
	'nama' => ['Rezha Setyo Atmojo','Hanung Setiawan','Ki Joko Bodo',],
	'alamat' => ['Los Angeles','Bodja','Singaraja'],
	'nim' => ['3.34.19.3.22','3.34.19.3.10','3.34.19.3.66'],
	'semester' => '4',
	'ajaran' => '2021'
]);

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