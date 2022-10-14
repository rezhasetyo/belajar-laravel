<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Si Mapol</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        .navbar-default { margin : 0 !important; }
        .carousel-item .img-fluid {
            width:100%;
            height:100%;
        }
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light" style="background-color: white;">
    <div class="container">
        <a href="#" class="navbar-brand mr-3"><img width="40" height="40" class="d-inline-block align-top" alt="" src="/logo/logo.png"></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
            </div>
            <div class="navbar-nav ml-auto">
                <a href="/home" class="nav-item nav-link">Home</a>
                <a href="/about" class="nav-item nav-link">About</a>
                <a href="https://www.polines.ac.id/id/index.php/berita/" class="nav-item nav-link">Blog</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <div class="mt-5 pt-5 pb-5 footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                <h2 style="color:white;">Si Mapol</h2>
                <p class="pr-5 text-white-50">Sistem Informasi Ormawa Polines atau Si Mapol adalah sistem informasi yang dibuat oleh Mahasiswa IK2D untuk membantu pengelolaan ormawa di Politeknik Negeri Semarang.</p>
                <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a></p>
            </div>
            <div class="col-lg-3 col-xs-12 links">
                <h4 class="mt-lg-0 mt-sm-3" style="color: white;">Links</h4>
                <ul class="m-0 p-0">
                <li>- <a href="#" class="pr-5 text-white-50">Home</a></li>
                <li>- <a href="#" class="pr-5 text-white-50">Data Ormawa</a></li>
                <li>- <a href="#" class="pr-5 text-white-50">About Si Mapo</a></li>
                <li>- <a href="#" class="pr-5 text-white-50">Team Developer</a></li>
                <li>- <a href="#" class="pr-5 text-white-50">Blog</a></li>
                <li>- <a href="#" class="pr-5 text-white-50">Website Politeknik Negeri Semarang</a></li>
                </ul>
            </div>
            <br/>
            <div class="col-lg-4 col-xs-12 location">
                <h4 class="mt-lg-0 mt-sm-4" style="color: white;">Contact</h4>
                <p class="pr-5 text-white-50">22, Lorem ipsum dolor, consectetur adipiscing</p>
                <p class="mb-0 pr-5 text-white-50"><i class="fa fa-phone mr-3"></i>(541) 754-3010</p>
                <p class="pr-5 text-white-50"><i class="fa fa-envelope-o mr-3"></i>info@hsdf.com</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col copyright">
            <p class=""><small class="text-white-50">© 2019. All Rights Reserved.</small></p>
            </div>
        </div>
        </div>
        </div>
</body>
</html>
