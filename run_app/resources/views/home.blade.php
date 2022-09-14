@extends('jumbotron/template')

@section('content')
<div class="jumbotron">
        <h1 class="display-4">Selamat Datang</h1>
        <p class="lead">Mari kita Belajar Framework Laravel</p>
        <hr class="my-4">
        <p>ini adalah komponen <strong>jumbotron</strong> yang ada pada bootstrap</p><br>
         <a class="btn btn-success btn-lg" href="{{ url('laravel/create') }}" role="button">Tambah Data</a>
         <br>    
        <a class="btn btn-info btn-lg mt-3" href="/laravel" role="button">Daftar Hutang</a>
    </div>
@endsection