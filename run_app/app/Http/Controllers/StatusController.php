<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()   {
        $this->middleware('auth');
        $this->middleware('verified')->only(['verifEmail']);
    }

    public function index() {   
        return view('status.index');    
    }
    
    public function admin() {   
        return view('status.admin');  
    }

    public function verifEmail() {   
        return view('status.verif-email');  
    }

}
