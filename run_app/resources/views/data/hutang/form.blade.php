@extends('template/master')

@section('content')
<div class="jumbotron">
    <div class="col-6">
    <br><h3>Tambah Hutang</h3>

        <form method="POST" action="{{ route('hutang.save') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{  isset($model->id) ? $model->id :'' }}">

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control"  value="{{  isset($model->nama) ? $model->nama : '' }}"
                placeholder="Input Nama Lengkap">
            </div>
            @error('nama')
                <div class="mb-3" style="color:red;"> {{ $message }} </div>
            @enderror

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="" disabled selected>---Pilih Jenis Kelamin---</option>
                    <option value="Laki-laki" {{ isset($model->jenis_kelamin) && $model->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ isset($model->jenis_kelamin) && $model->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            @error('jenis_kelamin')
                <div class="mb-3" style="color:red;"> {{ $message }} </div>
            @enderror

            <div class="form-group">
                <label for="tanggal_hutang">Tanggal Hutang</label>
                <input type="date" name="tanggal_hutang" class="form-control" value="{{ isset($model['tanggal_hutang']) ? showDateTime4($model['tanggal_hutang']) : '' }}">
            </div>
            @error('tanggal_hutang')
                <div class="mb-3" style="color:red;"> {{ $message }} </div>
            @enderror

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" rows="2"
                placeholder="Inputkan Alamat Lengkap">{{  isset($model->alamat) ? $model->alamat : '' }}</textarea>
            </div>
            @error('alamat')
                <div class="mb-3" style="color:red;"> {{ $message }} </div>
            @enderror

            <div class="form-group">
                <label for="cicilan_id">Cicilan</label>
                <select name="cicilan_id" class="form-control" id="cicilan_id">
                    <option value="" disabled selected>-- Pilih Cicilan --</option>
                    @foreach ($cicilan as $item)
                        @if ($model && $item->id === $model->cicilan_id)
                            <option value="{{ $item->id }}" selected>{{ $item->waktu }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->waktu }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('cicilan_id')
                <div class="mb-3" style="color:red;"> {{ $message }} </div>
            @enderror

            <div class="form-group">
                <label for="hutang">Hutang Berapa?</label>
                <input type="number" class="form-control" name="hutang" value="{{  isset($model->hutang) ? $model->hutang : '' }}"
                placeholder="Jumlah Hutang" >
            </div>
            @error('hutang')
                <div class="mb-3" style="color:red;"> {{ $message }} </div>
            @enderror

            <div class="form-group">
                <label for="jaminan">Upload Jaminan</label><br>
                @if(isset($model->id) != NULL)
                    <img src="{{asset('web/images/jaminan/'. $model->jaminan)}}" style="height:300px;">
                @else
                @endif

                <input type="file" name="jaminan" class="form-control">
                <input type="hidden" name="nama_jaminan_lama" value="{{  isset($model->jaminan) ? $model->jaminan : '' }}">
            </div>
            @error('jaminan')
                <div class="mb-3" style="color:red;"> {{ $message }} </div>
            @enderror
      
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('hutang.home') }}"><button type="button" class="btn btn-danger">Batal</button></a>
        </form>
    </div>
</div>
@endsection