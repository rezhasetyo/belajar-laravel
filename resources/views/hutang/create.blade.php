@extends('jumbotron/template')

@section('content')
<div class="jumbotron">
    <div class="col-8">
    <br><h3>Tambah Hutang</h3>

        <form method="POST" action="{{ url('hutang') }}">
        @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" 
                placeholder="Input Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" 
                placeholder="Inputkan Alamat Lengkap"></textarea>
            </div>
            <div class="form-group">
                <label for="hutang">Hutang Berapa?</label>
                <input type="number" id="hutang" class="form-control" name="hutang" 
                placeholder="Jumlah Hutang" >
            </div>

      
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="/hutang"><button type="button" class="btn btn-danger">Batal</button></a>
    </form>
    </div>
  </div>
@endsection