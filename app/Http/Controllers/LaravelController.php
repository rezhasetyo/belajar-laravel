<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hutang;

class LaravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){
        $datas = Hutang::all();
        return view('laravel.data', compact('datas'));
    }

    public function create(){   
        $model = new Hutang;
        return view('laravel.create', compact('model'));
    }

    public function store(Request $request){   
        $model = new Hutang;
        $model->nama = $request->nama;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->alamat = $request->alamat;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->hutang = $request->hutang;
        $model->save();
        return redirect('laravel');
    }

    public function edit($id){
        $model = Hutang::find($id);
        return view('laravel.edit', compact('model'));
    }

    public function update(Request $request, $id){   
        $model = Hutang::find($id);
        $model->nama = $request->nama;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->alamat = $request->alamat;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->hutang = $request->hutang;
        $model->save();
        return redirect('laravel');
    }

    public function destroy($id){
        $model = Hutang::find($id);
        $model->delete();
        return redirect('laravel');
    }
}
