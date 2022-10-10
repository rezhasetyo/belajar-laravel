@extends('template/master')

@section('content')
<div class="jumbotron">
    <p>Email Anda Belum Terverifikasi</p>
    <p> <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
    </form></p>
</div>
@endsection