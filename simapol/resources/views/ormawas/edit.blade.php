@extends('layouts.app')

 
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Ormawa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('ormawas.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('ormawas.update',$ormawa->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Ormawa:</strong>
                    <input type="text" name="kode_ormawa" value="{{ $ormawa->kode_ormawa }}" class="form-control" placeholder="kode_ormawa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Ormawa:</strong>
                    <textarea class="form-control" style="height:150px" name="nama_ormawa" placeholder="nama_ormawa">{{ $ormawa->nama_ormawa }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pengampu Ormawa:</strong>
                    <textarea class="form-control" style="height:150px" name="pengampu" placeholder="pengampu">{{ $ormawa->pengampu }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $ormawa->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
</div>
    </form>
@endsection