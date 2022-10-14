<?php

namespace App\Http\Controllers;

use App\Models\ormawas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrmawasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $ormawas = DB::table('ormawas')->simplepaginate(5);
        
        /// mengirimkan variabel $posts ke halaman views posts/index.blade.php
        /// include dengan number index
        return view('builder',['ormawas' => $ormawas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /// menampilkan halaman create
        return view('ormawas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'kode_ormawa' => 'required',
            'nama_ormawa' => 'required',
            'pengampu' => 'required',
            'detail' => 'required',
        ]);
        
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        ormawas::create($input);
        /// redirect jika sukses menyimpan data
        return redirect()->route('index')
                        ->with('success','ormawas created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ormawas $ormawa)
    {
        return view('ormawas.show',compact('ormawa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ormawas $ormawa)
    {
        return view('ormawas.edit',compact('ormawa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ormawas $ormawa)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'kode_ormawa' => 'required',
            'nama_ormawa' => 'required',
            'pengampu' => 'required',
        ]);
        
        /// mengubah data berdasarkan request dan parameter yang dikirimkan

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        ormawas::create($input);
        
        /// setelah berhasil mengubah data
        return redirect()->route('index')
                        ->with('success','ormawa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ormawas $ormawa)
    {
        $ormawa->delete();

        return redirect()->route('index')
                        ->with('ormawas','Post deleted successfully');
    }
}
