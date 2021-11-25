<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hutang;

class HutangController extends Controller
{
    public function index(){
        $datas = Hutang::all();
        return view('hutang.data', compact('datas'));
    }

    public function create(){   
        $model = new Hutang;
        return view('hutang.create', compact('model'));
    }

    public function store(Request $request){   
        $model = new Hutang;
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->hutang = $request->hutang;
        $model->save();
        return redirect('hutang');
    }

    public function edit($id){
        $model = Hutang::find($id);
        return view('hutang.edit', compact('model'));
    }

    public function update(Request $request, $id){   
        $model = Hutang::find($id);
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->hutang = $request->hutang;
        $model->save();
        return redirect('hutang');
    }

    public function destroy($id){
        $model = Hutang::find($id);
        $model->delete();
        return redirect('hutang');
    }
}
