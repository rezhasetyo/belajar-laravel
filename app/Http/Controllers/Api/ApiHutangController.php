<?php

namespace App\Http\Controllers\Api;

use App\Models\Hutang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\HutangResource;

class ApiHutangController extends Controller
{
    public function index()    {
        $hutang = Hutang::all();                                         //Get Posts
        return new HutangResource(true, 'List Data Hutang', $hutang);    //Return Collection of Posts as a Resource
    }

}
