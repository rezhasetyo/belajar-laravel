<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hutang;
use Carbon\Carbon;
use App\Http\Resources\HutangResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiHutangController extends Controller
{
    public function index()    {
        $hutang = Hutang::all();                                         //Get Hutang
        return new HutangResource(true, 'List Data Hutang', $hutang);    //Return Collection of Hutang as a Resource
    }

       public function store(Request $request) {
        //Define Validation Rules
            $validator = Validator::make($request->all(), [
                'nama'              => 'required',
                'jenis_kelamin'     => 'required',
                'alamat'            => 'required',
                'tanggal_hutang'    => 'required|date_format:Y-m-d',
                'hutang'            => 'required|numeric',
                'cicilan_id'        => 'required|numeric',
                'jaminan'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        //Check if Validation Fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
        //Create Hutang
            $model = new Hutang;
            $model->nama = $request->nama;
            $model->jenis_kelamin = $request->jenis_kelamin;
            $model->alamat = $request->alamat;
            $model->tanggal_hutang = $request->tanggal_hutang;
            $model->hutang = $request->hutang;
            $model->cicilan_id = $request->cicilan_id;
            // Upload Image
            $namaJaminan = time(). '.' .$request->jaminan->extension();
            $request->jaminan->move(public_path('storage/jaminan'), $namaJaminan);
            $model->jaminan = $namaJaminan;
            // Hitung jatuhTempo use Carbon
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

        return new HutangResource(true, 'Data Hutang Berhasil Ditambahkan!', $model);    //Return Response
    }

    public function show(Hutang $hutang)    {
        return new HutangResource(true, 'Data Hutang Ditemukan!', $hutang);   //Return Single Post as a Resource
    }

    public function update(Request $request, $id)    {
        $validator = Validator::make($request->all(), [
            'nama'              => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'tanggal_hutang'     => 'required|date_format:Y-m-d',
            'hutang'            => 'required|numeric',
            'cicilan_id'        => 'required|numeric',
            'jaminan'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
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

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $model = Hutang::find($id);
        if($request->has('jaminan')){
            $model->nama = $request->nama;
            $model->jenis_kelamin = $request->jenis_kelamin;
            $model->alamat = $request->alamat;
            $model->tanggal_hutang = $request->tanggal_hutang;
            $model->hutang = $request->hutang;
            $model->cicilan_id = $request->cicilan_id;

            Storage::delete('public/jaminan/'.$model->jaminan);
            $namaJaminan = time(). '.' .$request->jaminan->extension();
            $request->jaminan->move(public_path('storage/jaminan'), $namaJaminan);
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

        return new HutangResource(true, 'Data Hutang Berhasil Diubah!', $model);
    }

    public function destroy(Hutang $hutang)     {
        Storage::delete('public/jaminan/'.$hutang->jaminan);
        $hutang->delete();
        return new HutangResource(true, 'Data Hutang Berhasil Dihapus!', null);
    }





}
