<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/mahasiswa', 'mahasiswa');
Route::view('/mahasiswacatch', 'mahasiswacatch');
Route::view('/dataku', 'dataku', [
	'nama' => ['Hanung Setiawan','Havita Ramadhani','Jihadt Akbar',],
	'alamat' => ['Bodja','Banyumas','Rembang'],
	'nim' => ['3.34.19.3.10','3.34.19.3.11','3.34.19.3.12'],
	'semester' => '4',
	'ajaran' => '2021'
]);

Route::get('/mahasiswa/{nama}/{umur}/{kota}', function ($nama,$umur,$kota) {
	$arrMahasiswa = ["$nama","$umur","$kota"];

	return view('/mahasiswacatch',['data' => $arrMahasiswa]);
});

Route::get('/dataku/{nim}', function ($nim) {
	if ($nim=="3.34.19.3.10") {
		echo "NIM = 3.34.19.3.10<br>";
		echo "Nama = Hanung Setiawan<br>";
		echo "Alamat = Bodja";
	}
	elseif ($nim=="3.34.19.3.11") {
		echo "NIM = 3.34.19.3.11<br>";
		echo "Nama = Havita Ramadhani<br>";
		echo "Alamat = Banyumas";
	}
	elseif ($nim=="3.34.19.3.12") {
		echo "NIM = 3.34.19.3.12<br>";
		echo "Nama = Jihadt Akbar<br>";
		echo "Alamat = Rembang";
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