<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hutang;
// use Datatables;
use Yajra\DataTables\Facades\Datatables;

class YajraHutangController extends Controller
{   
    // Refac di Index
        // public function data(){
        //     return DataTables::of(Hutang::query())->toJson();
        // }

    public function index(Request $request)
    {   
        if ($request->ajax()) {
            return DataTables::of(Hutang::query())
                ->addIndexColumn()
                ->toJson();
        }
        return view('data.yajra.hutang.index');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
