<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Hutang;
use Carbon\Carbon;

class LaravelController extends Controller
{
    public function __construct()   {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        $datas = Hutang::all();
        return view('laravel.data', compact('datas'));
    }

    public function create(){   
        $model = new Hutang;
        $cicilan = DB::table('cicilan')->get();
        return view('laravel.create', compact('model', 'cicilan'));
    }

    public function store(Request $request){
        $model = new Hutang;
        $model->nama = $request->nama;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->alamat = $request->alamat;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->hutang = $request->hutang;
        $model->cicilan_id = $request->cicilan_id;

        $namaJaminan = time(). '.' .$request->jaminan->extension();
        $request->jaminan->move(public_path('storage/jaminan'), $namaJaminan);
        $model->jaminan = $namaJaminan;

        if($model->cicilan_id == 1){
            $model->jatuhTempo = Carbon::parse($model->created_at)->addMonth(6)->timestamp;
        }elseif($model->cicilan_id == 2) {
            $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(1)->timestamp;
        }elseif($model->cicilan_id == 3) {
            $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(2)->timestamp;
        }else{
            $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(3)->timestamp;
        }

        $model->save();
        Alert::success('Sukses', 'Berhasil Menyimpan Data');
        return redirect('laravel');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $model = Hutang::find($id);
        $cicilan = DB::table('cicilan')->get();
        return view('laravel.edit', compact('model', 'cicilan'));
    }
    
    public function update(Request $request, $id){   
        $model = Hutang::find($id);
        if($request->has('jaminan')){
            $model->nama = $request->nama;
            $model->jenis_kelamin = $request->jenis_kelamin;
            $model->alamat = $request->alamat;
            $model->tanggal_lahir = $request->tanggal_lahir;
            $model->hutang = $request->hutang;
            $model->cicilan_id = $request->cicilan_id;

            if($model->cicilan_id == 1){
                $model->jatuhTempo = Carbon::parse($model->created_at)->addMonth(6)->timestamp;
            }elseif($model->cicilan_id == 2) {
                $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(1)->timestamp;
            }elseif($model->cicilan_id == 3) {
                $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(2)->timestamp;
            }else{
                $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(3)->timestamp;
            }

            $namaJaminan = time(). '.' .$request->jaminan->extension();
            $request->jaminan->move(public_path('storage/jaminan'), $namaJaminan);
            $model->jaminan = $namaJaminan;
        }else{
            $model->nama = $request->nama;
            $model->jenis_kelamin = $request->jenis_kelamin;
            $model->alamat = $request->alamat;
            $model->tanggal_lahir = $request->tanggal_lahir;
            $model->hutang = $request->hutang;
            $model->cicilan_id = $request->cicilan_id;

            if($model->cicilan_id == 1){
                $model->jatuhTempo = Carbon::parse($model->created_at)->addMonth(6)->timestamp;
            }elseif($model->cicilan_id == 2) {
                $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(1)->timestamp;
            }elseif($model->cicilan_id == 3) {
                $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(2)->timestamp;
            }else{
                $model->jatuhTempo = Carbon::parse($model->created_at)->addYear(3)->timestamp;
            }
        }
        
        $model->save();
        Alert::success('Sukses', 'Berhasil Mengupdate Data');
        return redirect('laravel');
    }

    public function destroy($id){
        $model = Hutang::find($id);
        $model->delete();
        Alert::warning('Sukses', 'Berhasil Menghapus Data');
        return redirect('laravel');
    }
}
