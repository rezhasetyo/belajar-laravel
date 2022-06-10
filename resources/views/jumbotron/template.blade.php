<!-- HEADER -->
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Belajar Framework Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ICON -->
    <link href="{{ asset('laravel.ico') }}" rel="SHORTCUT ICON"/>

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="{{asset('template')}}/css/bootstrap.min.css" />
    @stack('css')

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
                            <a class="nav-link" href="/">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/laravel">Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/hutang">Jquery</a>
                          </li>
                        </ul>
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
    </nav>


    <section class="content">
    @yield('content')
    </section>
    



<!-- FOOTER -->
    <!-- Optional JavaScript -->
    <!-- Pertama load jQuery, kemudian Bootstrap JS -->
    <script src="{{asset('template')}}/js/jquery-3.4.1.slim.min.js"></script>
    <script src="{{asset('template')}}/js/bootstrap.min.js"></script>
	@stack('javascript')
    @include('sweetalert::alert')
	
	<nav class="navbar navbar-expand-md navbar-dark fixed-bottom bg-dark">
      <div class="container">
        
      </div>
    </nav>