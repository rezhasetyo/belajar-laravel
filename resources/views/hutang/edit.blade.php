@extends('jumbotron/template')

@section('content')
<div class="jumbotron">
    <div class="col-8">
    <br><h3>Edit Hutang</h3>

        <form method="POST" action="{{ url('hutang/' .$model->id) }}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" value="{{ $model->nama }}" name="nama" class="form-control" 
                placeholder="Input Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" rows="2" 
                placeholder="Inputkan Alamat Lengkap">{{ $model->alamat }}</textarea>
            </div>
            <div class="form-group">
                <label for="hutang">Hutang Berapa?</label>
                <input type="text" value="{{ $model->hutang }}" class="form-control" name="hutang" 
                placeholder="Jumlah Hutang" >
            </div>

      
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="/hutang"><button type="button" class="btn btn-danger">Batal</button></a>
    </form>
    </div>
  </div>
@endsection