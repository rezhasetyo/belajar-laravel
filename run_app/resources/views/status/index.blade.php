@extends('template/master')

@section('content')
<div class="jumbotron">
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif
    {{-- @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif --}}

    <div class="panel-body">
      Check Status Admin:
      <a href="{{route('admin')}}">Klik</a>
    </div>  <br>

    <div class="panel-body">
      Check Verfikasi Email:
      <a href="{{route('verifEmail')}}">Klik</a>
    </div>
</div>

@endsection