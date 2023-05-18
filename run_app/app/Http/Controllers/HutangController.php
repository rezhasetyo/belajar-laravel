<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Hutang;

class HutangController extends Controller
{
    public function __construct()   {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        $datas = Hutang::all();
        return view('data.hutang.index', compact('datas'));
    }

    public function form($id = null){
        $cicilan = DB::table('cicilan')->get();
        $model = null;
    
        if ($id != null) {
            $model = Hutang::find($id);
            $id = $model->id;
        }
    
        return view('data.hutang.form', compact('model', 'cicilan', 'id'));
    }

    public function save(Request $request){
        # Validasi Request
        $request->validate([
                            'nama' => 'required',
                            'jenis_kelamin' => 'required',
                            'alamat' => 'required',
                            'tanggal_hutang' => 'required',
                            'cicilan_id' => 'required',
                            'jaminan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            'hutang' => 'required|numeric'
          ],[
                            'nama.required' => 'Nama harus diisi !',
                            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi !',
                            'alamat.required' => 'Alamat harus diisi !',
                            'tanggal_hutang.required' => 'Tanggal Hutang harus diisi !',
                            'cicilan_id.required' => 'Cicilan harus diisi !',
                            'hutang.required' => 'Hutang harus diisi !',
                            'jaminan.image' => 'Format gambar harus jpeg,png,jpg,gif,svg!',
                            'jaminan.mimes' => 'Format gambar harus jpeg,png,jpg,gif,svg! ',
                            'jaminan.max' => 'Maksimal ukuran gambar adalah 2 MB !'
        ]);

        # Request Data from Input
        $id = $request->id;
        $nama = $request->nama;
        $jenis_kelamin = $request->jenis_kelamin;
        $alamat = $request->alamat;
        $tanggal_hutang = $request->tanggal_hutang;
        $hutang = $request->hutang;
        $cicilan_id = $request->cicilan_id;
        $status = 'BELUM LUNAS';
        $namaJaminanLama = $request->nama_jaminan_lama;

        # Validasi Request (Jaminan)
        if($id == ''){
            $request->validate(['jaminan' => 'required'],   ['jaminan.required' => 'Jaminan harus diisi !']);
        }

        # Get Jatuh Tempo
        $jatuhTempo = Hutang::get_jatuh_tempo($cicilan_id, $tanggal_hutang);

        # Save Image
        if($request->has(['jaminan'])){
            # Delete Image if Update
            if($id != ''){
                $model = Hutang::find($id);
                File::delete('web/images/jaminan/'. $model->jaminan);
            }

            $path = 'web/images/jaminan';
            $namaJaminan = $id .'(' .$nama .').' .$request->jaminan->extension();
            $request->jaminan->move($path, $namaJaminan);
            $jaminan = $namaJaminan;        // nama pada db
        }else{
            $jaminan = $namaJaminanLama;    // nama pada db
        }

        # Save Data Request in Array
        $array = [
                    'nama' => $nama,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat' => $alamat,
                    'tanggal_hutang' => $tanggal_hutang,
                    'hutang' => $hutang,
                    'cicilan_id' => $cicilan_id,
                    'status' => $status,
                    'jaminan' => $jaminan,
                    'jatuhTempo' => $jatuhTempo,
        ];
        
        # Action Store/Update
        if($id == ''){
            $model = new Hutang;
            $model->fill($array);
            $model->save();
            Alert::success('Sukses', 'Berhasil Menyimpan Data');
            return redirect('hutang');
        }else {
            $model = Hutang::find($id);
            $model->fill($array);
            $model->save();
            Alert::success('Sukses', 'Berhasil Mengupdate Data');
            return redirect('hutang');
        }
    } 

    public function delete($id){
        $hutang = Hutang::find($id);
        $hutang->delete();

        File::delete('web/images/jaminan/'. $hutang->jaminan);
        Alert::warning('Sukses', 'Berhasil Menghapus Data');
        return redirect('hutang');
    }
}
