<?php

namespace App\Http\Controllers;

use App\Models\Orma;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class OrmaController extends Controller

{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ormas = Orma::latest()->paginate(5);
    
        return view('ormas.index',compact('ormas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ormas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_ormas' => 'required',
            'name' => 'required',
            'pengampu' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Orma::create($input);
        
        return redirect()->route('orma.index')
                        ->with('success','Orma created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orma  $orma
     * @return \Illuminate\Http\Response
     */
    public function show(Orma $orma)
    {
        return view('ormas.show',compact('orma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orma  $orma
     * @return \Illuminate\Http\Response
     */
    public function edit(Orma $orma)
    {
        return view('ormas.edit',compact('orma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orma  $orma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orma $orma)
    {
        $request->validate([
            'name' => 'required',
            'kode_ormas' => 'required',
            'pengampu' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        
        $orma->update($input);
    
        return redirect()->route('orma.index')
                        ->with('success','Orma updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orma  $orma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orma $orma)
    {
        $orma->delete();
    
        return redirect()->route('orma.index')
                        ->with('success','Orma deleted successfully');
    }

    public function cetak_pdf()
    {
        $orma = Orma::all();
    	$pdf = PDF::loadview('ormas.orma_pdf',compact('orma'));
    	return $pdf->download('laporan-orma-pdf');
    }
}
