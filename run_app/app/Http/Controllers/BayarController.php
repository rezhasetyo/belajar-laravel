<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hutang;
use Carbon\Carbon;

class BayarController extends Controller{
    public function __construct()   {
        $this->middleware('auth');
    }

    public function index(){
        $datas = Hutang::all();

        \Midtrans\Config::$serverKey = 'SB-Mid-server-QBc7JoosR1P1WlZFK01gwOQN';    // Set your Merchant Server Key
        \Midtrans\Config::$isProduction = false;    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isSanitized = true;      // Set sanitization on (default)
        \Midtrans\Config::$is3ds = true;            // Set 3DS transaction for credit card to true

        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('data.bayar.index', compact('datas'),
                        ['snap_token'=>$snapToken]);
        // return view('data.bayar.index', compact('datas'));
    }
}
