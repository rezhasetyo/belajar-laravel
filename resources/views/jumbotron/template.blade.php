<!-- HEADER -->
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Belajar Laravel 8</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="{{asset('template')}}/css/bootstrap.min.css" />

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand">Latihan Laravel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
 
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="form">Form</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/hutang">Data</a>
          </li>
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
	
	
	<nav class="navbar navbar-expand-md navbar-dark fixed-bottom bg-dark">
      <div class="container">
        
      </div>
    </nav>