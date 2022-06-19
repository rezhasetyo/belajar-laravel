@extends('jumbotron/template')

@section('content')
<div class="jumbotron">
    <div class="col-6">
    <br><h3>Edit Hutang</h3>

        <form method="POST" action="{{ url('laravel/' .$model->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" value="{{ $model->nama }}" name="nama" class="form-control" 
                placeholder="Input Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <!-- <option>---Pilih Jenis Kelamin---</option> -->
                    <option value="Laki-laki" {{ $model->jenis_kelamin == "Laki-laki" ? 'selected' : ''}}>Laki-Laki</option>
                    <option value="Perempuan" {{ $model->jenis_kelamin == "Perempuan" ? 'selected' : ''}}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" 
                placeholder="Inputkan Tanggal Lahir" value="{{ $model->tanggal_lahir }}">
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
            <div class="form-group">
                <label for="cicilan_id"> Cicilan Paket</label>
                <select name="cicilan_id" class="form-control" id="">
                    <option value="">---Pilih Cicilan ---</option>
                    @foreach ($cicilan as $item)
                        @if($item->id === $model->cicilan_id)
                          <option value="{{ $item->id }}" selected>{{ $item->waktu }}</option>
                        @else
                         <option value="{{ $item->id }}">{{ $item->waktu }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="hutang">Upload Jaminan</label><br>
                <img src="{{asset('storage/jaminan/'. $model->jaminan)}}" style="height:300px;">
                <input type="file" name="jaminan" class="form-control">
            </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="/laravel"><button type="button" class="btn btn-danger">Batal</button></a>
    </form>
    </div>
  </div>
@endsection