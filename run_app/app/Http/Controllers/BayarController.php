<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;
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
        $json = json_decode($request->get('json'));
        $payment = new Pembayaran();
        $payment->status = $json->transaction_status;
        $payment->name = $request->get('name');
        $payment->email = $request->get('email');
        $payment->id_hutang = $request->get('id_hutang');
        $payment->transaction_id = $json->transaction_id;
        $payment->order_id = $json->order_id;
        $payment->gross_amount = $json->gross_amount;
        $payment->payment_type = $json->payment_type;
        $payment->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $payment->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        $payment->save();

        $model = Hutang::find($id);
        if ($payment->status == "settlement") {
            $model->status = "LUNAS";
            $model->tanggal_bayar = Carbon::now()->timestamp;
            $model->save();
            Alert::success('Sukses', 'Pembayaran Berhasil');
        }if ($payment->status == "pending") {
            Alert::warning('Peringatan', 'Pembayaran Dipending');
        }

        // return $payment->save() ? redirect()->back()->with('alert-success', 'Order berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
        return redirect()->back();
    }

}
