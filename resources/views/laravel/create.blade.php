@extends('jumbotron/template')

@section('content')
<div class="jumbotron">
    <div class="col-6">
    <br><h3>Tambah Hutang</h3>

        <form method="POST" action="{{ url('laravel') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" 
                placeholder="Input Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <option>--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" 
                placeholder="Inputkan Tanggal Lahir">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" 
                placeholder="Inputkan Alamat Lengkap"></textarea>
            </div>
            <div class="form-group">
                <label for="cicilan_id">Cicilan</label>
                <select name="cicilan_id" class="form-control" id="cicilan_id">
                    <option>-- Pilih Cicilan --</option>
                    @foreach ($cicilan as $item)
                        <option value="{{ $item->id }}">{{ $item->waktu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="hutang">Hutang Berapa?</label>
                <input type="number" id="hutang" class="form-control" name="hutang" 
                placeholder="Jumlah Hutang" >
            </div>
            <div class="form-group">
                <label for="hutang">Upload Jaminan</label>
                <input type="file" name="jaminan" class="form-control">
            </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="/laravel"><button type="button" class="btn btn-danger">Batal</button></a>
    </form>
    </div>
  </div>
@endsection