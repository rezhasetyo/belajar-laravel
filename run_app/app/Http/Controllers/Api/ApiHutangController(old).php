<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hutang;
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
                'tanggal_lahir'     => 'required|date_format:Y-m-d',
                'hutang'            => 'required|numeric',
                'cicilan_id'        => 'required|numeric',
                'jaminan'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        //Check if Validation Fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
        //Upload Image
            $jaminan = $request->file('jaminan');
            $jaminan->storeAs('public/jaminan', 
                time(). '.' .$request->jaminan->extension()
            );

        //Create Hutang
            $hutang = Hutang::create([
                'nama'              => $request->nama,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'alamat'            => $request->alamat,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'hutang'            => $request->hutang,
                'cicilan_id'        => $request->cicilan_id,
                'jaminan'           => time(). '.' .$request->jaminan->extension(),
            ]);
        // Hitung jatuhTempo use Carbon
            if($hutang->cicilan_id == 1){
                $tambah = Hutang::create(['jatuhTempo' => Carbon::parse($hutang->tanggal_hutang)->addMonth(6)->timestamp]);
            }elseif($hutang->cicilan_id == 2) {
                $tambah = Hutang::create(['jatuhTempo' => Carbon::parse($hutang->tanggal_hutang)->addYear(1)->timestamp]);
            }elseif($hutang->cicilan_id == 3) {
                $tambah = Hutang::create(['jatuhTempo' => Carbon::parse($hutang->tanggal_hutang)->addYear(2)->timestamp]);
            }elseif($hutang->cicilan_id == 4){
                $tambah = Hutang::create(['jatuhTempo' => Carbon::parse($hutang->tanggal_hutang)->addYear(1)->timestamp]);
            }

        return new HutangResource(true, 'Data Hutang Berhasil Ditambahkan!', $hutang);    //Return Response
    }

    public function show(Hutang $hutang)    {
        return new HutangResource(true, 'Data Hutang Ditemukan!', $hutang);   //Return Single Post as a Resource
    }

    public function update(Request $request, Hutang $hutang)    {
        $validator = Validator::make($request->all(), [
            'nama'              => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
            'tanggal_lahir'     => 'required|date_format:Y-m-d',
            'hutang'            => 'required|numeric',
            'cicilan_id'        => 'required|numeric',
            'jaminan'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('jaminan')) {
            $jaminan = $request->file('jaminan');
            $jaminan->storeAs('public/jaminan', 
                time(). '.' .$request->jaminan->extension()
            );
            Storage::delete('public/jaminan/'.$hutang->jaminan);
            $hutang->update([
                'nama'              => $request->nama,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'alamat'            => $request->alamat,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'hutang'            => $request->hutang,
                'cicilan_id'        => $request->cicilan_id,
                'jaminan'           => time(). '.' .$request->jaminan->extension(),
            ]);
        } else {
            $hutang->update([
                'nama'              => $request->nama,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'alamat'            => $request->alamat,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'hutang'            => $request->hutang,
                'cicilan_id'        => $request->cicilan_id,
            ]);
        }

        return new HutangResource(true, 'Data Hutang Berhasil Diubah!', $hutang);
    }

    public function destroy(Hutang $hutang)     {
        Storage::delete('public/jaminan/'.$hutang->jaminan);
        $hutang->delete();
        return new HutangResource(true, 'Data Hutang Berhasil Dihapus!', null);
    }





}
