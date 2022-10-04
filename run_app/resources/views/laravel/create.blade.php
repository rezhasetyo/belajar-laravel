@extends('template/master')

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
            @error('nama')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            @error('jenis_kelamin')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="tanggal_hutang">Tanggal Hutang</label>
                <input type="date" id="tanggal_hutang" name="tanggal_hutang" class="form-control">
            </div>
            @error('tanggal_hutang')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" 
                placeholder="Inputkan Alamat Lengkap"></textarea>
            </div>
            @error('alamat')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="cicilan_id">Cicilan</label>
                <select name="cicilan_id" class="form-control" id="cicilan_id">
                    <option value="" disabled selected>-- Pilih Cicilan --</option>
                    @foreach ($cicilan as $item)
                        <option value="{{ $item->id }}">{{ $item->waktu }}</option>
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
                <input type="number" id="hutang" class="form-control" name="hutang" 
                placeholder="Jumlah Hutang" >
            </div>
            @error('hutang')
                <div class="mb-3" style="color:red;">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="jaminan">Upload Jaminan</label>
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