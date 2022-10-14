@extends('layouts.app')

@section('content')
<div class="container">
        <div id="carousel-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
            <ol class="carousel-indicators">
                <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-2" data-slide-to="1"></li>
                <li data-target="#carousel-2" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="height: 553px;">
                    <img src="/blog/ldk.jpg" alt="responsive image" class="d-block img-fluid">
                        <div class="carousel-caption">
                            <div>
                                <h2>Latihan Dasar Kemimpinan 2021</h2>
                            </div>
                        </div>
                    </a>
                </div> 
                <div class="carousel-item" style="height: 553px;">
                    <img src="/blog/warna.jpg" alt="responsive image" class="d-block img-fluid">
                        <div class="carousel-caption justify-content-center align-items-center">
                            <div>
                                <h2>Warna Mahasiswa Polines 2021</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="carousel-item" style="height: 553px;">
                    <img src="/blog/pp_belajar.jpg" alt="responsive image" class="d-block img-fluid">
                        <div class="carousel-caption justify-content-center align-items-center">
                            <div>
                                <h2>UKM PP Belajar Bersama</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </br>

        <div class="card-deck">
            <div class="card border-info mb-3" style="">
                <div class="card-body">
                <h5 class="card-title"><center>Data Ormawa<center></h5>
                <p class="card-text"><center>
                    Kumpulan data Organisasi Mahasiswa Politeknik Negeri Semarang.</p>
                    <center>
                    <a class="btn btn-info" href="{{ route('orma.index') }}">Pergi</a>
                </div>
            </div>
            <div class="card border-info mb-3" style="">
                <div class="card-body">
                <h5 class="card-title"><center>Blog<center></h5>
                <p class="card-text"><center>
                    Portal Berita Politeknik Negeri Semarang yang diupdate setiap hari.</p>
                    <center>
                    <a class="btn btn-info" href="">Pergi</a>
                </div>
            </div>
            <div class="card border-info mb-3" style="">
                <div class="card-body">
                <h5 class="card-title"><center>Tentang Si Mapol<center></h5>
                <p class="card-text"><center>
                    Mengetahui lebih dalam tentang Si Mapol (Sistem Ormawa Politeknik Negeri Semarang).</p>
                    <center>
                    <a class="btn btn-info" href="">Pergi</a>
                </div>
            </div>
        </div>
        
        </br>


        <div id="main-content" class="blog-page">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">

                    <div class="card single_post">
                        <div class="body">
                            
                            <div class="img-post">
                                <img class="d-block img-fluid" src="/blog/blog1.jpg" style="width:150rem;height:20rem;">
                            </div>
                            <div style="padding: 20px;">
                                <h3><a href="https://www.polines.ac.id/id/index.php/berita/1400-tim-polines-raih-juara-1-lomba-iot">Tim Polines Raih Juara 1 Lomba IoT</a></h3>
                                <p>
                                Kondisi pandemi Covid 19 tidak menyurutkan semangat mahasiswa Politeknik Negeri Semarang (Polines) untuk berprestasi. Hal itu dibuktikan oleh tim Polines Telkom Jaya yang beranggotakan Fitri Yuni Astuti, Yulia Setiani, dan Yusitania Prameswari mahasiswa jurusan Teknik Elektro Polines berhasil meraih juara 1 kategori IoT E-Time 2021 yang diselenggarakan oleh Himpunan Mahasiswa...
                                </p>
                                <a href="https://www.polines.ac.id/id/index.php/berita/1400-tim-polines-raih-juara-1-lomba-iot" class="btn btn-outline-secondary">Continue Reading</a>
                            </div>
                        </div>
                    </div>

                    </br>

                    <div class="card single_post">
                        <div class="body">
                            <div class="img-post">
                                <img class="d-block img-fluid" src="/blog/blog2.jpg" alt="" style="width:150rem;height:20rem;">
                            </div>
                            <div style="padding: 20px;">
                                <h3><a href="https://www.polines.ac.id/id/index.php/berita/1390-kegiatan-national-polytechnic-english-olympics-npeo">National Polytechnic English Olympics (NPEO)</a></h3>
                                <p>
                                Kegiatan National Polytechnic English Olympics (NPEO) yang ke 8 Tahun 2021 yang dilaksanakan secara daring di Politeknik Negeri Semarang (Polines) selama 3 hari, 15 -17 Juni 2021, berjalan lancar dan sukses. Kesuksesan ini adalah hasil dari kerjasama seluruh pihak, panitia internal polines  dan pihak eksternal yaitu para coordinator lomba dan Tim IT, termasuk para juri, peserta...
                                </p>
                                <a href="https://www.polines.ac.id/id/index.php/berita/1390-kegiatan-national-polytechnic-english-olympics-npeo" class="btn btn-outline-secondary">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                </div>

                <br/>

                <div class="col-lg-4 col-md-12 right-box">
                    <div class="card">
                        <div class="body search">
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">                                    
                            </div>
                        </div>
                    </div>

                    <br/>

                    <div class="card" style="padding: 20px;">
                        <div class="header">
                            <h2>Layanan Kemahasiswaan</h2>
                        </div>
                        <div class="body widget">
                            <ul class="list-unstyled categories-clouds m-b-0">
                                <li><a href="javascript:void(0);">Badan Eksekutif Mahasiswa</a></li>
                                <li><a href="javascript:void(0);">Badan Perwakilan Mahasiswa</a></li>
                                <li><a href="javascript:void(0);">Himpunan Mahasiswa Elektro</a></li>
                                <li><a href="javascript:void(0);">Himpunan Mahasiswa Sipil</a></li>
                                <li><a href="javascript:void(0);">Himpunan Mahasiswa Mesin</a></li>
                                <li><a href="javascript:void(0);">Himpunan Mahasiswa Administrasi Bisnis</a></li>
                                <li><a href="javascript:void(0);">Himpunan Mahasiswa Akuntansi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
