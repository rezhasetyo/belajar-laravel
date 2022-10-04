@extends('template/master')

@section('content')
<div class="jumbotron">
    <p> Autentifikasi Login </p>
    @if (session('error'))
                    <div class="alert alert-danger">
                      {{ session('error') }}
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <div class="panel-body">
      Check admin view:
      <a href="{{route('admin')}}">Klik</a>
    </div>
</div>

@endsection