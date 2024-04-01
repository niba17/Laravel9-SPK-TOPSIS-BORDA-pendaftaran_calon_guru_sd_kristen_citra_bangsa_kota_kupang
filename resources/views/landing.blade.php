@extends('layouts.masterLanding')
@section('title', 'SPK | Landing')
@section('content')

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top ">
            <div class="container d-flex align-items-center">

                <h1 class="logo me-auto"><a type="text">SD Kristen Citra Bangsa Kota Kupang</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('landing') }}/assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="#about">Persyaratan</a></li>
                        <li><a class="nav-link scrollto" href="#alur">Alur</a></li>
                        {{-- <li><a class="nav-link scrollto" href="#services">Frameworks & Libraries</a></li> --}}
                        <li><a class="nav-link scrollto" href="#contact">Hubungi Kami</a></li>
                        <li><a class="getstarted scrollto" href="/akun-add">Buat Akun</a></li>
                        <li><a class="getstarted scrollto" href="/login">Login</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center" style=" height:55vh;">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 text-align-center"
                        data-aos="fade-up" data-aos-delay="200">
                        <h1 class="text-center" style="font-size:35px;">Selamat Datang di Website Pendaftaran Calon Guru
                            SD Kristen Citra Bangsa Kota Kupang
                        </h1>
                        {{-- <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, omnis?</h2> --}}
                        {{-- <div class="d-flex justify-content-center justify-content-lg-start">
                            <a href="#about" class="btn-get-started scrollto">Get Started</a> --}}
                        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i --}}
                        {{-- class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                        {{-- </div> --}}
                    </div>
                    {{-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ asset('landing') }}/assets/img/hero-img.png" class="img-fluid animated" alt="">
                    </div> --}}
                </div>
            </div>

        </section><!-- End Hero -->

        <main id="main">



            <!-- ======= About Us Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Persyaratan</h2>
                    </div>

                    <div class="row content justify-content-center">
                        <div class="col-lg-6">
                            <li>Pendidikan minimal strata 1</li>
                            <li>
                                Memiliki pengalaman kerja sebagai guru di bidang terkait
                            </li>
                            <li>
                                Usia maksimal 30 tahun
                            </li>
                            <li>
                                Mahir menggunakan MS Office (MS Power Point, MS Word, MS Exel)
                            </li>

                        </div>
                    </div>

                </div>
            </section><!-- End About Us Section -->

            <!-- ======= alur Us Section ======= -->
            <section id="alur" class="alur">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Alur</h2>
                    </div>

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Alur Pendaftaran
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Buat akun pendaftaran</li>
                                        <li>Login akun</li>
                                        <li>Lengkapi data diri</li>
                                        <li>Upload data diri</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Alur Seleksi
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Seleksi administrasi
                                            <ul>
                                                <li>Seleksi berkas</li>
                                                <li>Pengumuman hasil seleksi administrasi
                                            </ul>
                                        </li>
                                        <li>Seleksi Test
                                            <ul>
                                                <li>Seleksi Kompetensi</li>
                                                <li>Wawancara</li>
                                                <li>Pengumuman hasil seleksi test</li>
                                            </ul>
                                        </li>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables. It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </section><!-- End alur Us Section -->

            <!-- ======= Why Us Section ======= -->


            <!-- ======= Services Section ======= -->
            {{-- <section id="services" class="services section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Frameworks & Libraries</h2>
                        <p>Untuk mendukung performa <i>back-end</i> yang cepat dan desain <i>front-end</i> yang responsif,
                            Website ini
                            menggunakan Framework dan Library yang terpopuler dan terupdate di bahasa pemrogramannya.</p>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="fa-brands fa-laravel fa-solid"
                                        style="font-size: 50px; color:#f9322c;"></i>
                                </div>
                                <h4><a href="https://laravel.com/">Laravel 9</a></h4>
                                <p>Laravel 9 adalah versi terbaru dari Laravel, framework PHP terpopuler saat ini. Laravel 9
                                    membawa banyak fitur baru dan perubahan, seperti Symfony Mailer dan persyaratan minimal
                                    PHP 8.</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                            data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="fa-brands fa-bootstrap"
                                        style="font-size: 50px; color:#7952b3;"></i></div>
                                <h4><a href="https://getbootstrap.com/">Bootstrap 5.2</a></h4>
                                <p>Bootstrap 5 adalah versi terbaru dari salah satu front-end framework terbaik yang cepat
                                    dan ringan. untuk membantu proses pengembangan website.</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                            data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="fa-brands fa-js"
                                        style="font-size: 50px;color:rgb(212,237,49);"></i></div>
                                <h4><a href="https://jquery.com/">jQuery 3.6.0</a></h4>
                                <p>jQuery adalah pustaka JavaScript lintas-platform yang didesain untuk menyederhanakan
                                    client-side scripting pada HTML. Dewasa ini, jQuery merupakan pustaka JavaScript yang
                                    paling populer.
                                </p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                            data-aos-delay="400">
                            <div class="icon-box">
                                <div class="icon"><i class="fa-brands fa-airbnb fa-solid"
                                        style="font-size: 50px;color:#0E1833;"></i>
                                </div>
                                <h4><a href="https://adminlte.io/">Admin LTE 3</a></h4>
                                <p>AdminLTE adalah salahsatu thema bootstrap untuk membuat halaman Dasboard, Halaman User,
                                    Aplikasi web dan berbagai aplikasi pengolahan data lainnya.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Services Section --> --}}

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Hubungi Kami</h2>
                        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                            sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                            ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                    </div>

                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-sm-10 d-flex align-items-stretch">
                            <div class="info">
                                <div class="address mt-3">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <h4>Whatsapp</h4>
                                    <p>Lorem.</p>
                                </div>
                                <hr>
                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email</h4>
                                    <p>sdkcitrabangsa@gmail.com</p>
                                </div>
                                <hr>
                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Telepon</h4>
                                    <p>(0380) 8553961</p>
                                </div>
                            </div>

                        </div>




                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

    @endsection
