@extends('template/master')

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
            @error('nama')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <option value="" disabled selected>---Pilih Jenis Kelamin---</option>
                    <option value="Laki-laki" {{ $model->jenis_kelamin == "Laki-laki" ? 'selected' : ''}}>Laki-Laki</option>
                    <option value="Perempuan" {{ $model->jenis_kelamin == "Perempuan" ? 'selected' : ''}}>Perempuan</option>
                </select>
            </div>
            @error('jenis_kelamin')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" rows="2" 
                placeholder="Inputkan Alamat Lengkap">{{ $model->alamat }}</textarea>
            </div>
            @error('alamat')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="tanggal_hutang">Tanggal Hutang</label>
                <input type="date" id="tanggal_hutang" name="tanggal_hutang" class="form-control" 
                value="{{ $model->tanggal_hutang }}">
            </div>
            @error('tanggal_hutang')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="cicilan_id"> Cicilan Paket</label>
                <select name="cicilan_id" class="form-control" id="">
                    <option value="" disabled selected>---Pilih Cicilan ---</option>
                    @foreach ($cicilan as $item)
                        @if($item->id === $model->cicilan_id)
                          <option value="{{ $item->id }}" selected>{{ $item->waktu }}</option>
                        @else
                         <option value="{{ $item->id }}">{{ $item->waktu }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('cicilan_id')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="hutang">Hutang Berapa?</label>
                <input type="text" value="{{ $model->hutang }}" class="form-control" name="hutang" 
                placeholder="Jumlah Hutang" >
            </div>
            @error('hutang')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="jaminan">Upload Jaminan</label><br>
                <img src="{{asset('webImages/jaminan/'. $model->jaminan)}}" style="height:300px;">
                <input type="file" name="jaminan" class="form-control">
            </div>
            @error('jaminan')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror
      
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ url('laravel') }}"><button type="button" class="btn btn-danger">Batal</button></a>
    </form>
    </div>
  </div>
@endsection