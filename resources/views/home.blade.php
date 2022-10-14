<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a082e8c008.js" crossorigin="anonymous"></script>

        <style>
          .navbar a{
            color:black;
          }
          .navbar a:hover{
            color: #f07749;
          }
          .navbar button:hover{
            color: #f07749;
          }
          footer {
            text-align: center;
            padding: 3px;
            background-color: white;
            color: black;
          }
        </style>
    </head>
<body>
    <!--Navigation Bar 1-->
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #fff;">
            <!--Logo-->
            <a class="navbar-brand ml-4" href="/">
              <img src="img/logo.png" alt="Logo" style="width:120px;">
            </a>
            <!--Search-->
                <form class="mr-2 my-auto w-100 d-inline-block order-1 ml-3 mr-4">
                  <div class="input-group">
                      <input type="text" class="form-control border border-right-0" placeholder="What are you looking for?" style="background-color:#f4f4f4;">
                      <span class="input-group-append">
                          <button class="btn btn-outline-light border border-left-0" type="button" style="background-color:#f07749;">
                              <i class="fa fa-search"></i>
                          </button>
                      </span>
                  </div>
                </form>
            <!--Notification dan Cart-->
            <div class="navbar-collapse collapse flex-shrink-1 flex-grow-0 order-last" id="navbarTogglerDemo01">
                <!--Notification-->
                <ul class="navbar-nav ml-3 mr-3">
                  <div class="dropdown">
                    <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img alt="logo" src="img/lonceng.png" height="23px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item disabled font-weight-bold" href="#">Action</a>
                      <a class="dropdown-item" href="#">Freedom Discount Up to 30% from 13-20 August</a>
                      <a class="dropdown-item" href="#">Free Voucher Cashback Up to 50% for Newcomer</a>
                    </div>
                  </div>
                </ul>
                <!--Cart-->
                <ul class="navbar-nav ml-1 mr-4">
                  <a class="btn" href="#">
                      <img alt="logo" src="img/cart.png" height="24px">
                  </a>
                </ul>
            </div>
        </nav>

    <!--Navigation bar 2-->
    <nav class="navbar navbar-expand-sm" style="background-color:white;color:black;">
      <ul class="navbar-nav mr-auto">
        <!--Home-->
        <li class="nav-item active ml-4">
          <a class="nav-link font-weight-bold" href="/">Home</a>
        </li>
        <!--Product-->
        <li class="nav-item active ml-4">
          <div class="btn-group">
            <button type="button" class="btn"><strong>Product</strong></button>
            <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Scale</a>
              <a class="dropdown-item" href="#">Custom</a>
              <a class="dropdown-item" href="#">Brands</a>
            </div>
          </div>
        </li>
        <!--Scale-->
        <li class="nav-item active ml-4">
          <div class="dropdown">
            <a class="btn dropdown-toggle font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Scale
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <div class="container" style="width:350px;">
                <div class="row">
                  <div class="col-md-6">
                    <img class="ml-2" src="img/shfzio2.jpg" alt="Logo" style="height:200px;">
                    <p>S.H. Figuart Kamen Rider Zi-O II</p>
                  </div>
                  <div class="col-md-6">
                    <a class="dropdown-item disabled font-weight-bold" href="#">Scale</a>
                    <a class="dropdown-item" href="#">Scale 1/2 Figure</a>
                    <a class="dropdown-item" href="#">Scale 1/6 Figure</a>
                    <a class="dropdown-item" href="#">Scale 1/12 Figure</a>
                  </div>
                </div>
          </div>
        </li>
        <!--Custom-->
        <li class="nav-item active ml-4">
          <div class="dropdown">
            <a class="btn dropdown-toggle font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Custom
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <div class="container" style="width:350px;">
                <div class="row">
                  <div class="col-md-6">
                    <img class="ml-3" src="img/grandistaluffy.jpg" alt="Logo" style="height:200px;">
                    <p>Grandista Monkey D. Luffy</p>
                  </div>
                  <div class="col-md-6">
                    <a class="dropdown-item disabled font-weight-bold" href="#">Gender</a>
                    <a class="dropdown-item" href="#">Male</a>
                    <a class="dropdown-item" href="#">Female</a>
                  </div>
                </div>
          </div>
        </li>
        <!--brands-->
        <li class="nav-item active ml-4">
          <div class="dropdown">
            <a class="btn dropdown-toggle font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Brands
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <div class="container" style="width:350px;">
                <div class="row">
                  <div class="col-md-6">
                    <img class="ml-3" src="img/figmacapt.jpg" alt="Logo" style="height:200px;">
                    <p>Figma Captain America</p>
                  </div>
                  <div class="col-md-6">
                    <a class="dropdown-item disabled font-weight-bold" href="#">Brands</a>
                    <a class="dropdown-item" href="#">Grandista</a>
                    <a class="dropdown-item" href="#">Ichiban Kuji</a>
                    <a class="dropdown-item" href="#">Figma</a>
                    <a class="dropdown-item" href="#">SH Figuart</a>
                    <a class="dropdown-item" href="#">Funko</a>
                  </div>
                </div>
          </div>
        </li>
        <!--Data-->
        <li class="nav-item active ml-4">
          <div class="dropdown">
            <a class="btn dropdown-toggle font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Data
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/about">About</a>
                    <a class="dropdown-item" href="/mahasiswa">Mahasiswa</a>
                    <a class="dropdown-item" href="/dataku">Dataku</a>
          </div>
        </li>
        <!--Admin-->
        <li class="nav-item active ml-4">
          <div class="dropdown">
            <a class="btn dropdown-toggle font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/admin/mahasiswa">Mahasiswa</a>
                    <a class="dropdown-item" href="/admin/dosen">Dosen</a>
                    <a class="dropdown-item" href="/admin/karyawan">Karyawan</a>
          </div>
        </li>
      </ul>
      
      <!--Login dan Signup-->
      <ul class="navbar-nav mr-4 ml-auto">
        <div class="dropdown">
          <a class="btn dropdown-toggle font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Login
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Login</a>
            <a class="dropdown-item" href="#">Signup</a>
          </div>
        </div>
      </ul>
    </nav>


      <!--Carousel-->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/crlogan.jpeg" class="d-block w-100" alt="logan">
          </div>
          <div class="carousel-item">
            <img src="img/crship.jpg" class="d-block w-100" alt="shipping">
          </div>
          <div class="carousel-item">
            <img src="img/crdis.png" class="d-block w-100" alt="discount">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    <!--Container-->
    <div class="container-fluid" style="background-color:#f4f4f4;">

    </div>

    <!--Footer-->
    <footer>
    <p><small>&copy; 2021 All Rights Reserved.</small></p>
    </footer>

</body>
</html>