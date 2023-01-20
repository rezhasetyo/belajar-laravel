<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApiResource;

class ApiCicilanController extends Controller
{
    /**
    * @OA\GET(
    *     path="/belajar-laravel/api/cicilan",
    *     tags={"Cicilan"},
    *     security={{"sanctum":{}}},
    *     summary="Get Data Cicilan",
    *     @OA\Response(response=200,description="Get Data List as Array"),
    *     @OA\Response(response=400, description="Bad request"),
    *     @OA\Response(response=404, description="Resource Not Found"),
    * )
    */
    public function index()    {
        $cicilan = DB::table('cicilan')->get();
        return new ApiResource(true, 'List Lama Cicilan', $cicilan);
    }

    /**
    * @OA\GET(
    *     path="/belajar-laravel/api/cicilan/{id}",
    *     tags={"Cicilan"},
    *     summary="Get Data by Id",    
    *     security={{"sanctum":{}}},
    *     @OA\Parameter(
    *        name="id",
    *        in="path",
    *        description="Inputkan Id Hutang",
    *        required=true,
    *     ),
    *     @OA\Response(response=200,description="Get Data List by Id"),
    *     @OA\Response(response=400, description="Bad request"),
    *     @OA\Response(response=404, description="Resource Not Found"),
    * )
    */
    public function show($id)    {
        $cicilan = DB::table('cicilan')->where('id', $id)->get();
        return new ApiResource(true, 'Cicilan by Id',$cicilan);
    }
}
