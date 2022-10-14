<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
    	return view('home');
    }

    public function about(){
    	return view('about');
    }

    public function mahasiswa(){
    	return view('mahasiswa');
    }

    public function nama(){
    	$nama = 'Rezha Ganteng';
		$nilai = 75;
		$nilai1 = [80,64,30,76,95];

		return view('nama',compact('nama','nilai','nilai1'));
    }

    public function mhs(){
    	$arrMahasiswa = ["Kaisar Hirohito","Adolf Hitler","Joseph Stalin","Osas"];

		return view('mhs')->with('mhs', $arrMahasiswa);
    }

    public function dsn(){
    	$arrDosen = ["Remus Lupin, M.M.","Prof. Albus Dumbledore, M.Farm.","Dr. Severus Snape","Dr. Voldemort, M.Kom."];

		return view('dsn')->with('dsn', $arrDosen);
    }

    public function glr(){
    	return view('glr');
    }
}
