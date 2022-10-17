<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hutang;
use Carbon\Carbon;

class BayarController extends Controller{
    public function __construct()   {
        $this->middleware('auth');
    }

    public function index(){
        $datas = Hutang::all();
        return view('data.bayar.index', compact('datas'));
    }

    public function bayar($id){
        $model = Hutang::find($id);
        $total = $model->hutang+1000;

        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');    // Set your Merchant Server Key
        \Midtrans\Config::$isProduction = false;    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isSanitized = true;      // Set sanitization on (default)
        \Midtrans\Config::$is3ds = true;            // Set 3DS transaction for credit card to true

        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $model->total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                // 'last_name' => 'pratama',
                'email' => Auth::user()->email,
                'phone' => '082223000789',
            ),
            'item_details' => array(  
                [
                    'id' => $model->id,
                    'price' => $model->hutang,
                    'quantity' => '1',
                    'name' => 'Jumlah Hutang',
                ],
                [
                    'id' => '404',
                    'price' => '1000',
                    'quantity' => '1',
                    'name' => 'Biaya Admin',
                ],
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('data.bayar.bayar', compact('model'),
                        ['snap_token'=>$snapToken]);
    }

    public function payment_post(Request $request, $id){
        return $request;
    }

}
