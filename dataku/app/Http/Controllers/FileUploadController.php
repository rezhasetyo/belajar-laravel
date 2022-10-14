<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(){
    	return view('file-upload');
    }

    public function prosesupload(Request $request){
		$request->validate([
		    'berkas'	=>	'required|file|image|max:20000',
		]);
 
        return view('prosesupload',['data' => $request]);
		
    }
}
