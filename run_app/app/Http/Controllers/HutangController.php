<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Hutang;
use Carbon\Carbon;

class HutangController extends Controller
{
    public function __construct()   {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        $datas = Hutang::all();
        return view('data.hutang.index', compact('datas'));
    }

    public function create(){   
        $model = new Hutang;
        $cicilan = DB::table('cicilan')->get();
        return view('data.hutang.create', compact('model', 'cicilan'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_hutang' => 'required',
            'cicilan_id' => 'required',
            'jaminan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hutang' => 'required|numeric',
          ],[
            'nama.required' => 'Nama harus diisi !',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi !',
            'alamat.required' => 'Alamat harus diisi !',
            'tanggal_hutang.required' => 'Tanggal Hutang harus diisi !',
            'cicilan_id.required' => 'Cicilan harus diisi !',
            'hutang.required' => 'Hutang harus diisi !',
            'jaminan.required' => 'Jaminan harus diisi !',
            'jaminan.image' => 'Format gambar harus jpeg,png,jpg,gif,svg!',
            'jaminan.mimes' => 'Format gambar harus jpeg,png,jpg,gif,svg! ',
            'jaminan.max' => 'Maksimal ukuran gambar adalah 2 MB !',
        ]);

        $model = new Hutang;
        $model->nama = $request->nama;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->alamat = $request->alamat;
        $model->tanggal_hutang = $request->tanggal_hutang;
        $model->hutang = $request->hutang;
        $model->cicilan_id = $request->cicilan_id;
        $model->status = 'BELUM LUNAS';

        $path = 'web/images/jaminan';
        // $namaJaminan = 'Id(' .$model->id .').' .$request->jaminan->extension();
        $namaJaminan = $model->nama .'(' .$model->hutang .').' .$request->jaminan->extension();
        $request->jaminan->move($path, $namaJaminan);
        $model->jaminan = $namaJaminan;

        if($model->cicilan_id == 1){
            $model->jatuhTempo = Carbon::parse($model->tanggal_hutang)->addMonth(6)->timestamp;
        }elseif($model->cicilan_id == 2) {
            $model->jatuhTempo = Carbon::parse($model->tanggal_hutang)->addYear(1)->timestamp;
        }elseif($model->cicilan_id == 3) {
            $model->jatuhTempo = Carbon::parse($model->tanggal_hutang)->addYear(2)->timestamp;
        }else{
            $model->jatuhTempo = Carbon::parse($model->tanggal_hutang)->addYear(3)->timestamp;
        }

        $model->save();
        Alert::success('Sukses', 'Berhasil Menyimpan Data');
        return redirect('hutang');
    }


    public function edit($id){
        $model = Hutang::find($id);
        $cicilan = DB::table('cicilan')->get();
        return view('data.hutang.edit', compact('model', 'cicilan'));
    }
    

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_hutang' => 'required',
            'cicilan_id' => 'required',
            'jaminan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hutang' => 'required|numeric',
          ],[
            'nama.required' => 'Nama harus diisi !',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi !',
            'alamat.required' => 'Alamat harus diisi !',
            'tanggal_hutang.required' => 'Tanggal Hutang harus diisi !',
            'cicilan_id.required' => 'Cicilan harus diisi !',
            'hutang.required' => 'Hutang harus diisi !',
            'jaminan.image' => 'Format gambar harus jpeg,png,jpg,gif,svg!',
            'jaminan.mimes' => 'Format gambar harus jpeg,png,jpg,gif,svg! ',
            'jaminan.max' => 'Maksimal ukuran gambar adalah 2 MB !',
        ]);


        $model = Hutang::find($id);
        if($request->has(['jaminan' || 'nama' || 'hutang'])){
            $model->nama = $request->nama;
            $model->jenis_kelamin = $request->jenis_kelamin;
            $model->alamat = $request->alamat;
            $model->tanggal_hutang = $request->tanggal_hutang;
            $model->hutang = $request->hutang;
            $model->cicilan_id = $request->cicilan_id;

            File::delete('web/images/jaminan/'. $model->jaminan);

            $path = 'web/images/jaminan';
            // $namaJaminan = 'Id(' .$model->id .').' .$request->jaminan->extension();
            $namaJaminan = $model->nama .'(' .$model->hutang .').' .$request->jaminan->extension();
            $request->jaminan->move($path, $namaJaminan);
            $model->jaminan = $namaJaminan;
        }else{
            $model->nama = $request->nama;
            $model->jenis_kelamin = $request->jenis_kelamin;
            $model->alamat = $request->alamat;
            $model->tanggal_hutang = $request->tanggal_hutang;
            $model->hutang = $request->hutang;
            $model->cicilan_id = $request->cicilan_id;
        }

        if($model->cicilan_id == 1){
            $model->jatuhTempo = Carbon::parse($model->tanggal_hutang)->addMonth(6)->timestamp;
        }elseif($model->cicilan_id == 2) {
            $model->jatuhTempo = Carbon::parse($model->tanggal_hutang)->addYear(1)->timestamp;
        }elseif($model->cicilan_id == 3) {
            $model->jatuhTempo = Carbon::parse($model->tanggal_hutang)->addYear(2)->timestamp;
        }else{
            $model->jatuhTempo = Carbon::parse($model->tanggal_hutang)->addYear(3)->timestamp;
        }
        
        $model->save();
        Alert::success('Sukses', 'Berhasil Mengupdate Data');
        return redirect('hutang');
    }


    public function destroy($id){
        $model = Hutang::find($id);
        File::delete('web/images/jaminan/'. $model->jaminan);
        $model->delete();
        Alert::warning('Sukses', 'Berhasil Menghapus Data');
        return redirect('hutang');
    }
}
