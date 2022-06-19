<?php

namespace App\Http\Controllers\Api;

use App\Models\Hutang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\HutangResource;
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

        return new HutangResource(true, 'Data Hutang Berhasil Ditambahkan!', $hutang);    //Return Response
    }


}
