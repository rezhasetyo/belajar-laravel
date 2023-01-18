<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hutang;
use Carbon\Carbon;
use App\Http\Resources\HutangResource;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Info(
 *     description="Dokumentasi Api Daftar Hutang",
 *     version="1.0.0",
 *     title="Api Daftar Hutang",
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * )
 */

class ApiHutangController extends Controller    {   
    /**
    * @OA\GET(
    *     path="/belajar-laravel/api/hutang",
    *     tags={"Hutang"},
    *     summary="Get Data Hutang",
    *     operationId="index",
    *     security={{"bearer":{}}},
    *     @OA\Response(response=200,description="Get Data List as Array"),
    *     @OA\Response(response=400, description="Bad request"),
    *     @OA\Response(response=404, description="Resource Not Found"),
    * )
    */
    public function index()    {
        $hutang = Hutang::all();                                         //Get Hutang
        return new HutangResource(true, 'List Data Hutang', $hutang);    //Return Collection of Hutang as a Resource
    }

    /**
     * @OA\Post(
     *     path="/belajar-laravel/api/hutang",
     *     tags={"Hutang"},
     *     summary="Store Data Hutang",
     *     operationId="store",
     *
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="nama",
     *                     description="Inputkan Nama",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="jenis_kelamin",
     *                     description="Pilih Jenis Kelamin",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="alamat",
     *                     description="Inputkan Alamat",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="tanggal_hutang",
     *                     description="Inputkan Tanggal Hutang",
     *                     type="date"
     *                 ),
     *                 @OA\Property(
     *                     property="hutang",
     *                     description="Inputkan Jumlah Hutang",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="cicilan_id",
     *                     description="Pilih Jenis Cicilan",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="jaminan",
     *                     description="Upload Jaminan",
     *                     type="file"
     *                 ) 
     *             )
     *         )
     *     )
     * )
     */
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
            $model->status = 'BELUM LUNAS';
            // Upload Image
            $path = 'webImages/jaminan';
            $namaJaminan = time(). '.' .$request->jaminan->extension();
            $request->jaminan->move($path, $namaJaminan);
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

    /**
    * @OA\GET(
    *     path="/belajar-laravel/api/hutang/{id}",
    *     tags={"Hutang"},
    *     summary="Get Data by Id",    
    *     operationId="show",
    *     security={{"bearer":{}}},
    *     @OA\Parameter(
    *        name="id",
    *        in="path",
    *        description="Inputkan Id Hutang",
    *        required=true,
    *     ),
    *     @OA\Response(response=200,description="Get Data List as Array"),
    *     @OA\Response(response=400, description="Bad request"),
    *     @OA\Response(response=404, description="Resource Not Found"),
    * )
    */
    public function show(Hutang $hutang)    {
        return new HutangResource(true, 'Data Hutang Ditemukan!', $hutang);   //Return Single Post as a Resource
    }

    /**
     * @OA\Post(
     *     path="/belajar-laravel/api/hutang/{id}",
     *     tags={"Hutang"},
     *     summary="Update Data Hutang",
     *     operationId="update",
    *     @OA\Parameter(
    *        name="id",
    *        in="path",
    *        description="Inputkan Id Hutang",
    *        required=true,
    *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                  @OA\Property(
     *                     property="_method",
     *                     description="JANGAN DIUBAH",
     *                     example="PUT"
     *                 ),
     *                 @OA\Property(
     *                     property="nama",
     *                     description="Inputkan Nama",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="jenis_kelamin",
     *                     description="Pilih Jenis Kelamin",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="alamat",
     *                     description="Inputkan Alamat",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="tanggal_hutang",
     *                     description="Inputkan Tanggal Hutang",
     *                     type="date"
     *                 ),
     *                 @OA\Property(
     *                     property="hutang",
     *                     description="Inputkan Jumlah Hutang",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="cicilan_id",
     *                     description="Pilih Jenis Cicilan",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="jaminan",
     *                     description="Upload Jaminan",
     *                     type="file"
     *                 ) 
     *             )
     *         )
     *     )
     * )
     */   
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

            $path = 'webImages/jaminan';
            $namaJaminan = time(). '.' .$request->jaminan->extension();
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
        return new HutangResource(true, 'Data Hutang Berhasil Diubah!', $model);
    }

    /**
    * @OA\Delete(
    *     path="/belajar-laravel/api/hutang/{id}",
    *     tags={"Hutang"},
    *     summary="Destroy Data Hutang",    
    *     operationId="destroy",
    *     security={{"bearer":{}}},
    *     @OA\Parameter(
    *        name="id",
    *        in="path",
    *        description="Inputkan Id Hutang",
    *        required=true,
    *     ),
    *     @OA\Response(response=200,description="Get Data List as Array"),
    *     @OA\Response(response=400, description="Bad request"),
    *     @OA\Response(response=404, description="Resource Not Found"),
    * )
    */
    public function destroy(Hutang $hutang)     {
        $hutang->delete();
        return new HutangResource(true, 'Data Hutang Berhasil Dihapus!', null);
    }
}
