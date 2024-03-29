<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Belajar Framework Laravel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="{{ asset('template/images/laravel.ico') }}" rel="SHORTCUT ICON"/>  <!-- ICON -->

  <link rel="stylesheet" href="{{asset('template')}}/css/bootstrap.min.css" />
  {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">  --}}
  @stack('css')
</head>

<body>
  <!-- HEADER -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand">Belajar Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/hutang')}}">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Ajax</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/bayar')}}">Payment</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="{{url('/user')}}">Status Akun</a>
                  <a class="dropdown-item" href="{{url('api/documentation')}}" target="_blank" rel="noopener noreferrer">Dokumentasi Api</a>
                  <a class="dropdown-item" href="https://simulator.sandbox.midtrans.com/indomaret/index" target="_blank" rel="noopener noreferrer">Indomaret Simulator</a>
                </div>
              </li>
            </ul>
        </ul>
  
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
  
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
  
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
  
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
  </nav>
  
  <!-- CONTENT BODY -->
  <section class="content">
    @yield('content')
  </section>

  <!-- FOOTER -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-bottom bg-dark">
    <div class="container">
      
    </div>
  </nav>
</body>

<script src="{{asset('template')}}/js/jquery-3.4.1.slim.min.js"></script>
<script src="{{asset('template')}}/js/bootstrap.min.js"></script>
@stack('javascript')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) {{-- @include('sweetalert::alert') --}}
</html>