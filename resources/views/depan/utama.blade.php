
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Desa Pasirkecapi </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets2/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets2/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets2/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets2/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="ReRoof Multipurpose HTML 5 Template " />


    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/font-awesome-all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/aos.css') }}" />


    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/banner.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/brand.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/services.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/why-choose.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/process.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/portfolio.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/testimonial.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/pricing.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/newsletter.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/features.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/working-process.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/team.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/faq.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/module-css/counter.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/responsive.css') }}" />
    <style>
        .hero-slider {
            position: relative;
            height: 350px;
            border-radius: 20px;
            overflow: hidden; /* Penting agar sudut rounded tidak bikin potongan aneh */
        }
        
        .slide {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .hero-slider {
            margin: 20px auto;
            max-width: 1400px; /* atau sesuaikan lebar banner */
        }
    
    </style>
        
        
        
        
</head>

<body class="custom-cursor">


    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!--Start Preloader-->
    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!--End Preloader-->

    <div class="page-wrapper">
        <header class="main-header main-header-two">
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="container">
                        <div class="main-menu__wrapper-inner">
                            <div class="main-menu__left">
                                <div class="main-menu__logo">
                                    <a href="#"><img src="{{ asset('assets/images/lebak_banten.png') }}" alt="" style="width: 70px; height: 70px;"></a>
                                </div>
                            </div>

                            <div class="main-menu__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li>
                                        <a href="{{ route('utama') }}">Home</a>
                                    </li>
                                   
                                    <li>
                                        <a href="#">Wilayah</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Services +</a>
                                        <ul>
                                            <li><a href="service.html">Services +</a></li>
                                            <li><a href="flashing-repairs.html">Roof Flashing Repairs</a>
                                            </li>
                                            <li><a href="inspections-installations.html">Inspections Installations</a>
                                            </li>
                                            <li><a href="roof-masters.html">Roof Masters</a>
                                            </li>
                                            <li><a href="chimney-flashing.html">Chimney Flashing and Repairs</a>
                                            </li>
                                            <li><a href="roof-insulation-services.html">Roof Insulation Services</a>
                                            </li>
                                            <li><a href="roof-genius.html">Roof Genius</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="team.html">Team</a></li>
                                            <li><a href="project.html">projects</a></li>
                                            <li><a href="project-details.html">Project Details</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li>

                                    

                                    <li class="dropdown">
                                        <a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="main-menu__right">
                                <div class="main-menu__search">
                                    <a href="#"><span
                                            class="searcher-toggler-box icon-search-interface-symbol"></span></a>
                                </div>

                                <div class="main-menu__btn">
                                    <a href="contact.html" class="thm-btn">Get a quote <span
                                            class="icon-next1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricky-header-two stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!-- Banner-->
        <section class="hero-slider">
            <div class="container">
              <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="border-radius: 20px; overflow: hidden;">
                  <div class="carousel-item active">
                    <div class="slide" style="background-image: url('{{ asset('assets/images/banner/banner_1.png') }}'); height: 350px; background-size: cover; background-position: center;"></div>
                  </div>
                  <div class="carousel-item">
                    <div class="slide" style="background-image: url('{{ asset('assets/images/banner/banner_2.png') }}'); height: 350px; background-size: cover; background-position: center;"></div>
                  </div>
                </div>
              </div>
            </div>
        </section>
          <!-- Banner-->
      

        <!--Bawah Banner-->
        <section class="counter-two">
            <div class="container">
                <div class="row">
                    <!--Start Counter Two Single-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="counter-two__single">
                            <div class="counter-two__single-icon">
                                <span class="icon-roof-3"></span>
                            </div>

                            <div class="counter-two__single-content">
                                <div class="count-box">
                                    <h2 class="count-text" data-stop="800" data-speed="1500">00</h2>
                                    {{-- <span class="plus">+</span> --}}
                                </div>

                                <p>Jumlah Rumah</p>
                            </div>
                        </div>
                    </div>
                    <!--End Counter Two Single-->

                    <!--Start Counter Two Single-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInDown" data-wow-duration="1500ms">
                        <div class="counter-two__single">
                            <div class="counter-two__single-icon">
                                <span class="icon-roof-12"></span>
                            </div>

                            <div class="counter-two__single-content">
                                <div class="count-box">
                                    <h2 class="count-text" data-stop="22" data-speed="1500">00</h2>
                                    {{-- <span class="plus">+</span> --}}
                                </div>

                                <p>Jumlah RT</p>
                            </div>
                        </div>
                    </div>
                    <!--End Counter Two Single-->

                    <!--Start Counter Two Single-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="counter-two__single">
                            <div class="counter-two__single-icon">
                                <span class="icon-roof-9"></span>
                            </div>

                            <div class="counter-two__single-content">
                                <div class="count-box">
                                    <h2 class="count-text" data-stop="12" data-speed="1500">00</h2>
                                    {{-- <span class="plus">+</span> --}}
                                </div>

                                <p>Jumlah RW</p>
                            </div>
                        </div>
                    </div>
                    <!--End Counter Two Single-->

                    <!--Start Counter Two Single-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInDown" data-wow-duration="1500ms">
                        <div class="counter-two__single">
                            <div class="counter-two__single-icon">
                                <span class="icon-roof-14"></span>
                            </div>

                            <div class="counter-two__single-content">
                                <div class="count-box">
                                    <h2 class="count-text" data-stop="4000" data-speed="1500">00</h2>
                                    <span class="plus">+</span>
                                </div>

                                <p>Jumlah Warga</p>
                            </div>
                        </div>
                    </div>
                    <!--End Counter Two Single-->
                </div>
            </div>
        </section>
        <!--Bawah Banner-->

        <!--Sambutan-->
        <section class="about-two">
            <div class="container">
                <div class="row">
                    <!--Start About Two Img-->
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-two__img">
                            <div class="shape2"><img src="assets2/images/shapes/about-v2-shape2.png" alt=""></div>
                            <div class="about-two__img-inner">
                                <div class="shape1"><img src="assets2/images/shapes/about-v2-shape1.png" alt=""></div>
                                <img src="{{ asset('assets/images/sambutan/'. $sambutan->gambar_sambutan) }}" alt="#">
                            </div>

                            <div class="about-two__experience-box">
                                <div class="count-box">
                                    <h2 class="count-text" data-stop="21" data-speed="1500">00</h2>
                                    <span class="plus">+</span>
                                </div>

                                <p>Years of Experience <br>
                                    Berbagai Bidang</p>
                            </div>
                        </div>
                    </div>
                    <!--End About Two Img-->

                    <!--Start About Two Content-->
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-two__content">
                            <div class="section-title sec-title-animation animation-style2">
                                <div class="section-title__tagline title-animation">
                                    <h4>Sambutan Kepala Desa</h4>
                                </div>
                                <h2 class="section-title__title title-animation">{{ $sambutan->keterangan }}</h2>
                            </div>

                            <div class="about-two__content-text">
                                <p>{!! $sambutan->area !!}</p>
                            </div>

                            <div class="about-two__content-middle">
                                <ul class="about-two__content-list">
                                    <li>
                                        <p><span class="icon-verified"></span> Akses Informasi Masyarakat</p>
                                    </li>
                                    <li>
                                        <p><span class="icon-verified"></span> Media Aspirasi dan Partisipasi Warga</p>
                                    </li>
                                    <li>
                                        <p><span class="icon-verified"></span> Dokumentasi Program dan Kegiatan</p>
                                    </li>
                                </ul>

                                <div class="about-two__counter-box">
                                    <div class="about-two__counter-box-inner">
                                        <div class="icon-box">
                                            <span class="icon-roof-16"></span>
                                        </div>

                                        <div class="count-box">
                                            <h2 class="count-text" data-stop="9" data-speed="1500">00</h2>
                                            <span class="k">k</span>
                                            <span class="plus">+</span>
                                        </div>
                                    </div>

                                    <p>Complete Projects</p>
                                </div>
                            </div>

                            {{-- <div class="about-two__content-text2">
                                <p>We ensure to quality workmanship and materials for lasting protection <br> roofing
                                    desi services hers tailored to needs your </p>
                            </div> --}}

                            <div class="about-two__btn">
                                <a href="about.html" class="thm-btn">About Us <span class="icon-next1"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--End About Two Content-->
                </div>
            </div>
        </section>
        <!--Sambutan-->

        <!--Lokasi-->
        <section class="blog-one blog-one--two">
            <div class="container">
                <div class="row">
                    <!--Start Why Choose One Content-->
                    <div class="col-xl- wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        {{-- <div class="why-choose-one__content">
                            <div class="section-title sec-title-animation animation-style2">
                                <div class="section-title__tagline title-animation">
                                    <h4>Lokasi</h4>
                                </div>
                                <h2 class="section-title__title title-animation">Informasi lokasi Desa Pasirkecapi</h2>
                            </div>

                            <div class="why-choose-one__content-text">
                                <p>Lokasi kami di provinsi banten dengan gambaran peta yang jelas </p>
                            </div>
                        </div> --}}
                        <div class="col-xl-12 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">

                                <div class="why-choose-one__content-bottom">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="why-choose-one__content-single">
                                                <div class="icon-box">
                                                    <span class="icon-workers"></span>
                                                </div>
                                                <div class="title-box">
                                                    <h3>Kecamatan Maja</h3>
                                                </div>
                                            </div>

                                            
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="why-choose-one__content-single">
                                                <div class="icon-box">
                                                    <span class="icon-customer-service"></span>
                                                </div>
                                                <div class="title-box">
                                                    <h3>Kabupaten Lebak</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="why-choose-one__content-single">
                                                <div class="icon-box">
                                                    <span class="icon-roof-1"></span>
                                                </div>
                                                <div class="title-box">
                                                    <h3>Provinsi Banten</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="why-choose-one__content-single">
                                                <div class="icon-box">
                                                    <span class="icon-satisfaction"></span>
                                                </div>
                                                <div class="title-box">
                                                    <h3>Indonesia</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!--End Why Choose One Content-->

                    <!--Start Why Choose One Form-->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15860.315427653108!2d106.39151016172971!3d-6.383823522968131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e420e8f711d18b5%3A0x1447e4e3bd7a9bc!2sPasir%20Kecapi%2C%20Kec.%20Maja%2C%20Kabupaten%20Lebak%2C%20Banten%2C%20Indonesia!5e0!3m2!1sid!2sus!4v1744779630681!5m2!1sid!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <!--End Why Choose One Form-->
                </div>
                

              

            </div>
             <!--Start Why Choose One Form-->
             
            <!--End Why Choose One Form-->
        </section>
        <!--Lokasi-->

        <!--Potensi-->
        <section class="service-two">
            <div class="container">
                <div class="service-two__top">
                    <div class="section-title sec-title-animation animation-style2">
                        <div class="section-title__tagline title-animation">
                            <h4>Potensi Desa</h4>
                        </div>
                        <h2 class="section-title__title title-animation">Potensi-potensi yang ada
                        </h2>
                    </div>

                    <div class="service-two__top-btn">
                        <a href="service.html" class="thm-btn">Selengkapnya <span class="icon-next1"></span></a>
                    </div>
                </div>

                <div class="row">
                    <!--Start Service Two Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                        <div class="service-two__single">
                            <div class="service-two__single-icon">
                                <span class="icon-roof-13"></span>
                            </div>

                            <div class="service-two__single-title">
                                <h2><a href="#">Potensi Sumber Daya Alam (SDA)</a></h2>
                            </div>

                            <div class="service-two__single-img">
                                <img src="assets2/images/services/service-v2-img1.jpg" alt="">
                                <img src="assets2/images/services/service-v2-img1.jpg" alt="">
                                <a href="flashing-repairs.html" class="service-two__single-img-link"><span
                                        class="icon-next1"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--End Service Two Single-->

                    <!--Start Service Two Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInDown" data-wow-delay=".3s">
                        <div class="service-two__single">
                            <div class="service-two__single-icon">
                                <span class="icon-roof-10"></span>
                            </div>

                            <div class="service-two__single-title">
                                <h2><a href="flashing-repairs.html"> Potensi Sumber Daya Ekonomi</a></h2>
                            </div>

                            <div class="service-two__single-img">
                                <img src="assets2/images/services/service-v2-img2.jpg" alt="">
                                <img src="assets2/images/services/service-v2-img2.jpg" alt="">
                                <a href="flashing-repairs.html" class="service-two__single-img-link"><span
                                        class="icon-next1"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--End Service Two Single-->

                    <!--Start Service Two Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                        <div class="service-two__single">
                            <div class="service-two__single-icon">
                                <span class="icon-roof-14"></span>
                            </div>

                            <div class="service-two__single-title">
                                <h2><a href="flashing-repairs.html">Potensi Sumber Daya Infrastruktur</a></h2>
                            </div>

                            <div class="service-two__single-img">
                                <img src="assets2/images/services/service-v2-img3.jpg" alt="">
                                <img src="assets2/images/services/service-v2-img3.jpg" alt="">
                                <a href="flashing-repairs.html" class="service-two__single-img-link"><span
                                        class="icon-next1"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--End Service Two Single-->
                </div>
            </div>
        </section>
        <!--Potensi-->

        <!--Start Work Process Two -->
        <section class="work-process-two">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline title-animation">
                        <h4>// Work Process //</h4>
                    </div>
                    <h2 class="section-title__title title-animation">Elegant Slate Roofing <br> Timeless Look</h2>
                </div>

                <div class="row">
                    <!--Start Work Process Two Single-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="work-process-two__single">
                            <div class="counting-text">
                                01
                            </div>
                            <div class="work-process-two__single-icon">
                                <span class="icon-roof"></span>
                            </div>

                            <div class="work-process-two__single-title">
                                <h2><a href="#">Roof Planning</a></h2>
                            </div>
                        </div>
                    </div>
                    <!--End Work Process Two Single-->

                    <!--Start Work Process Two Single-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="work-process-two__single">
                            <div class="counting-text">
                                02
                            </div>
                            <div class="work-process-two__single-icon">
                                <span class="icon-roof-6"></span>
                            </div>

                            <div class="work-process-two__single-title">
                                <h2><a href="#">Roof Sealing</a></h2>
                            </div>
                        </div>
                    </div>
                    <!--End Work Process Two Single-->

                    <!--Start Work Process Two Single-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="work-process-two__single">
                            <div class="counting-text">
                                03
                            </div>
                            <div class="work-process-two__single-icon">
                                <span class="icon-roof-7"></span>
                            </div>

                            <div class="work-process-two__single-title">
                                <h2><a href="#">Roof Installation</a></h2>
                            </div>
                        </div>
                    </div>
                    <!--End Work Process Two Single-->

                    <!--Start Work Process Two Single-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="work-process-two__single">
                            <div class="counting-text">
                                04
                            </div>
                            <div class="work-process-two__single-icon">
                                <span class="icon-roof-15"></span>
                            </div>

                            <div class="work-process-two__single-title">
                                <h2><a href="#">Finished Roof</a></h2>
                            </div>
                        </div>
                    </div>
                    <!--End Work Process Two Single-->
                </div>
            </div>
        </section>
        <!--End Work Process Two -->

        <!--Start Projects Two-->
        <section class="projects-one projects-one--two">
            <div class="projects-two__top">
                <div class="container">
                    <div class="projects-two__top-inner">
                        <div class="section-title sec-title-animation animation-style2">
                            <div class="section-title__tagline title-animation">
                                <h4>// Our Projects //</h4>
                            </div>
                            <h2 class="section-title__title title-animation">Metal Roofing Latest <br> Enhanced Projects
                            </h2>
                        </div>

                        <div class="projects-two__top-btn">
                            <a href="project.html" class="thm-btn">All Projects <span class="icon-next1"></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auto-container">
                <div class="row">
                    <!--Start Projects Two Single-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
                            <div class="projects-one__single-img">
                                <div class="projects-one__single-img-inner">
                                    <img src="assets2/images/project/projects-v2-img1.jpg" alt="#">
                                </div>

                                <div class="projects-one__overlay-content">
                                    <div class="content-box">
                                        <p>Express Roof</p>
                                        <h2><a href="project-details.html">Roofing Protection</a></h2>
                                    </div>

                                    <div class="projects-one__single-icon">
                                        <a href="project-details.html"><span class="icon-next1"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
                            <div class="projects-one__single-img">
                                <div class="projects-one__single-img-inner">
                                    <img src="assets2/images/project/projects-v2-img2.jpg" alt="#">
                                </div>

                                <div class="projects-one__overlay-content">
                                    <div class="content-box">
                                        <p>Express Roof</p>
                                        <h2><a href="project-details.html">Roofing Protection</a></h2>
                                    </div>

                                    <div class="projects-one__single-icon">
                                        <a href="project-details.html"><span class="icon-next1"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Projects Two Single-->

                    <!--Start Projects Two Single-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
                            <div class="projects-one__single-img">
                                <div class="projects-one__single-img-inner">
                                    <img src="assets2/images/project/projects-v2-img3.jpg" alt="#">
                                </div>

                                <div class="projects-one__overlay-content">
                                    <div class="content-box">
                                        <p>Express Roof</p>
                                        <h2><a href="project-details.html">Roofing Protection</a></h2>
                                    </div>

                                    <div class="projects-one__single-icon">
                                        <a href="project-details.html"><span class="icon-next1"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Projects Two Single-->

                    <!--Start Projects Two Single-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
                            <div class="projects-one__single-img">
                                <div class="projects-one__single-img-inner">
                                    <img src="assets2/images/project/projects-v2-img4.jpg" alt="#">
                                </div>

                                <div class="projects-one__overlay-content">
                                    <div class="content-box">
                                        <p>Express Roof</p>
                                        <h2><a href="project-details.html">Roofing Protection</a></h2>
                                    </div>

                                    <div class="projects-one__single-icon">
                                        <a href="project-details.html"><span class="icon-next1"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
                            <div class="projects-one__single-img">
                                <div class="projects-one__single-img-inner">
                                    <img src="assets2/images/project/projects-v2-img5.jpg" alt="#">
                                </div>

                                <div class="projects-one__overlay-content">
                                    <div class="content-box">
                                        <p>Express Roof</p>
                                        <h2><a href="project-details.html">Roofing Protection</a></h2>
                                    </div>

                                    <div class="projects-one__single-icon">
                                        <a href="project-details.html"><span class="icon-next1"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Projects Two Single-->
                </div>
            </div>
        </section>
        <!--End Projects Two-->

        <!--Start Why Choose One-->
        <section class="why-choose-one">
            <div class="container">
                <div class="row">
                    <!--Start Why Choose One Content-->
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="why-choose-one__content">
                            <div class="section-title sec-title-animation animation-style2">
                                <div class="section-title__tagline title-animation">
                                    <h4>// Why Choose Us //</h4>
                                </div>
                                <h2 class="section-title__title title-animation">Top-Quality Roof Repairs <br> and
                                    Installations</h2>
                            </div>

                            <div class="why-choose-one__content-text">
                                <p>Experience superior roof repairs and installations with our expert team. We use
                                    premium materials </p>
                            </div>

                            <div class="why-choose-one__content-bottom">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="why-choose-one__content-single">
                                            <div class="icon-box">
                                                <span class="icon-workers"></span>
                                            </div>
                                            <div class="title-box">
                                                <h3>Experienced Worker</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="why-choose-one__content-single">
                                            <div class="icon-box">
                                                <span class="icon-customer-service"></span>
                                            </div>
                                            <div class="title-box">
                                                <h3>24/7 Our Support</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="why-choose-one__content-single">
                                            <div class="icon-box">
                                                <span class="icon-roof-1"></span>
                                            </div>
                                            <div class="title-box">
                                                <h3>Modern Renovate</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="why-choose-one__content-single">
                                            <div class="icon-box">
                                                <span class="icon-satisfaction"></span>
                                            </div>
                                            <div class="title-box">
                                                <h3>Certified Company</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Why Choose One Content-->

                    <!--Start Why Choose One Form-->
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="why-choose-one__form">
                            <div class="title-box">
                                <h2>Request A Free Estimate</h2>
                            </div>
                            <form method="post" action="index.html">
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="Your Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Email Address" value="" name="form_email"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="date" value="" placeholder="Inspection Date"
                                        id="datepicker">
                                </div>
                                <div class="form-group">
                                    <div class="select-box">
                                        <select class="selectmenu wide">
                                            <option selected="selected">You Location</option>
                                            <option>Saudi Arabia</option>
                                            <option>Bangladesh </option>
                                            <option>Pakistan</option>
                                            <option>Malaysia</option>
                                            <option>Iran</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="button-box">
                                            <button class="thm-btn" type="submit" data-loading-text="Please wait...">
                                                Make An Appintment <span class="icon-next1"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--End Why Choose One Form-->
                </div>
            </div>
        </section>
        <!--End Why Choose One-->

        <!--Start Brand One-->
        <section class="brand-one">
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="brand-one__inner">
                            <div class="brand-one__carousel owl-theme owl-carousel">
                                <div class="item">
                                    <div class="brand-one__single">
                                        <div class="brand-one__img">
                                            <img src="assets2/images/brand/brand-1-1.png" alt="">
                                            <img src="assets2/images/brand/brand-1-1.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="brand-one__single">
                                        <div class="brand-one__img">
                                            <img src="assets2/images/brand/brand-1-2.png" alt="">
                                            <img src="assets2/images/brand/brand-1-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="brand-one__single">
                                        <div class="brand-one__img">
                                            <img src="assets2/images/brand/brand-1-3.png" alt="">
                                            <img src="assets2/images/brand/brand-1-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="brand-one__single">
                                        <div class="brand-one__img">
                                            <img src="assets2/images/brand/brand-1-4.png" alt="">
                                            <img src="assets2/images/brand/brand-1-4.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="brand-one__single">
                                        <div class="brand-one__img">
                                            <img src="assets2/images/brand/brand-1-5.png" alt="">
                                            <img src="assets2/images/brand/brand-1-5.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Brand One-->

        <!--Start Testimonials Two-->
        <div class="testimonials-two">
            <div class="auto-container">
                <div class="testimonials-two__outer">
                    <div class="container">
                        <div class="testimonials-two__carousel owl-carousel owl-theme">
                            <!--Start Testimonials Two Single-->
                            <div class="testimonials-two__single">
                                <div class="testimonials-two__single-inner">
                                    <div class="testimonials-two__single-left">
                                        <div class="testimonials-two__single-img">
                                            <div class="icon-box">
                                                <span class="icon-quote"></span>
                                            </div>
                                            <div class="inner">
                                                <img src="assets2/images/testimonial/testimonials-v2-img1.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="author-info">
                                            <h3>Jennifer Garcia</h3>
                                            <p>Marketing Director</p>
                                        </div>
                                    </div>

                                    <div class="testimonials-two__single-text">
                                        <p>Perfect roof Services transformed my documents with their meticulous way
                                            attention to detail. Their with our experts. professional proofreaders
                                            ensured everything was error-free and polished. Highly recommend for anyone
                                            seeking top-nonetti proofing services. Their with our experts. professional
                                            proofreaders
                                            ensured everything was error-free and polished. Highly recommend for anyone
                                            seeking top-nonetti proofing services</p>
                                    </div>
                                </div>
                            </div>
                            <!--End Testimonials Two Single-->

                            <!--Start Testimonials Two Single-->
                            <div class="testimonials-two__single">
                                <div class="testimonials-two__single-inner">
                                    <div class="testimonials-two__single-left">
                                        <div class="testimonials-two__single-img">
                                            <div class="icon-box">
                                                <span class="icon-quote"></span>
                                            </div>
                                            <div class="inner">
                                                <img src="assets2/images/testimonial/testimonials-v2-img2.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="author-info">
                                            <h3>Garcia Jennifer</h3>
                                            <p>Marketing Director</p>
                                        </div>
                                    </div>

                                    <div class="testimonials-two__single-text">
                                        <p>Perfect roof Services transformed my documents with their meticulous way
                                            attention to detail. Their with our experts. professional proofreaders
                                            ensured everything was error-free and polished. Highly recommend for anyone
                                            seeking top-nonetti proofing services. Their with our experts. professional
                                            proofreaders
                                            ensured everything was error-free and polished. Highly recommend for anyone
                                            seeking top-nonetti proofing services</p>
                                    </div>
                                </div>
                            </div>
                            <!--End Testimonials Two Single-->

                            <!--Start Testimonials Two Single-->
                            <div class="testimonials-two__single">
                                <div class="testimonials-two__single-inner">
                                    <div class="testimonials-two__single-left">
                                        <div class="testimonials-two__single-img">
                                            <div class="icon-box">
                                                <span class="icon-quote"></span>
                                            </div>
                                            <div class="inner">
                                                <img src="assets2/images/testimonial/testimonials-v2-img3.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="author-info">
                                            <h3>Darlene Robertson</h3>
                                            <p>Marketing Director</p>
                                        </div>
                                    </div>

                                    <div class="testimonials-two__single-text">
                                        <p>Perfect roof Services transformed my documents with their meticulous way
                                            attention to detail. Their with our experts. professional proofreaders
                                            ensured everything was error-free and polished. Highly recommend for anyone
                                            seeking top-nonetti proofing services. Their with our experts. professional
                                            proofreaders
                                            ensured everything was error-free and polished. Highly recommend for anyone
                                            seeking top-nonetti proofing services</p>
                                    </div>
                                </div>
                            </div>
                            <!--End Testimonials Two Single-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Testimonials Two-->

        <!--Start Blog One-->
        <section class="blog-one blog-one--two">
            <div class="container">
                <div class="blog-one--two__top">
                    <div class="section-title sec-title-animation animation-style2">
                        <div class="section-title__tagline title-animation">
                            <h4>//Latest News //</h4>
                        </div>
                        <h2 class="section-title__title title-animation">Emergency Roof Repair <br>
                            When You Need Us</h2>
                    </div>

                    <div class="blog-one--two__top-btn">
                        <a href="contact.html" class="thm-btn">Read More <span class="icon-next1"></span></a>
                    </div>
                </div>

                <div class="row">
                    <!--Start Blog One Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <div class="blog-one__single-img-inner">
                                    <img src="assets2/images/blog/blog-v2-img1.jpg" alt="#">
                                </div>
                                <div class="date-box">
                                    <h4>27 August</h4>
                                </div>
                            </div>

                            <div class="blog-one__single-content">
                                <h2><a href="blog-details.html">Severe Weather Causes Widespread <br> Damage</a></h2>
                                <div class="btn-box">
                                    <a href="blog-details.html">Read More <span class="icon-next1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Blog One Single-->

                    <!--Start Blog One Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInDown" data-wow-delay=".3s">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <div class="blog-one__single-img-inner">
                                    <img src="assets2/images/blog/blog-v2-img2.jpg" alt="#">
                                </div>
                                <div class="date-box">
                                    <h4>27 August</h4>
                                </div>
                            </div>

                            <div class="blog-one__single-content">
                                <h2><a href="blog-details.html">Major Sports Event Postponed Due <br> to Health</a></h2>
                                <div class="btn-box">
                                    <a href="blog-details.html">Read More <span class="icon-next1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Blog One Single-->

                    <!--Start Blog One Single-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <div class="blog-one__single-img-inner">
                                    <img src="assets2/images/blog/blog-v2-img3.jpg" alt="#">
                                </div>
                                <div class="date-box">
                                    <h4>27 August</h4>
                                </div>
                            </div>

                            <div class="blog-one__single-content">
                                <h2><a href="blog-details.html">Innovative Startup Disrupts <br> Traditional Market</a>
                                </h2>
                                <div class="btn-box">
                                    <a href="blog-details.html">Read More <span class="icon-next1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Blog One Single-->
                </div>
            </div>
        </section>
        <!--End Blog One-->

       

        <!--Start Newsletter Two-->
        <section class="newsletter-two">
            <div class="container">
                <div class="newsletter-two__inner clearfix">
                    <div class="newsletter-two__bg"
                        style="background-image: url(assets2/images/resources/newsletter-v2-bg.jpg);"></div>
                    <div class="newsletter-two__content">
                        <div class="text-box">
                            <h2>Subscribe to Our <br> Newsletter</h2>
                            <p>It is a long established fact that a reader will be <br> distracted by the readable
                                content
                            </p>
                        </div>

                        <div class="newsletter-two__form">
                            <form class="newsletter-form" action="#">
                                <input type="email" name="email" placeholder="Enter Your Email">
                                <button type="submit"><span class="icon-send"></span></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--End Newsletter Two-->

        <!--Site Footer Two Start-->
        <footer class="site-footer site-footer--two">
            <div class="site-footer--two__pattern"
                style="background-image: url(assets2/images/pattern/site-footer-v2-pattern.png);"></div>
            <div class="site-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms">
                            <div class="footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="index.html"><img src="{{ asset('assets/images/lebak_banten.png') }}" alt="" style="width: 70px; height: 90px;"></a>
                                </div>

                                <p class="footer-widget__about-text">We provide top-quality roofing's services tailored
                                    to meet in the unique needs of our client. </p>
                                <div class="footer-widget__contact-social-links">
                                    <a href="#"><span class="icon-instagram"></span></a>
                                    <a href="#"><span class="icon-linkedin"></span></a>
                                    <a href="#"><span class="icon-twitter"></span></a>
                                    <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__links">
                                <h4 class="footer-widget__title">About Company</h4>
                                <ul class="footer-widget__links-list">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="service.html">Services</a></li>
                                    <li><a href="team.html">Our Team</a></li>
                                    <li><a href="blog.html">Latest Blog</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__links footer-widget__services">
                                <h4 class="footer-widget__title">Services</h4>
                                <ul class="footer-widget__links-list">
                                    <li><a href="flashing-repairs.html"> Reliable Roof Repairs</a>
                                    </li>
                                    <li><a href="flashing-repairs.html"> Skylight
                                            Installation</a></li>
                                    <li><a href="flashing-repairs.html"> Expert Roof Leak
                                            Repairs</a></li>
                                    <li><a href="flashing-repairs.html"> Tile Roof Restoration</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget__contact">
                                <h4 class="footer-widget__title">Contact Info</h4>

                                <ul class="footer-widget__contact-list">
                                    <li>
                                        <div class="text">
                                            <p>4517 Washington Ave. <br> Manchester, Kentucky 3945</p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="text">
                                            <p><a href="tel:57123456789">(+57) 123 456 789</a></p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="text">
                                            <p><a href="mailto:yourmail@email.com">example@gmail.com</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <div class="site-footer__copyright">
                                    <p class="site-footer__copyright-text">
                                        &copy; 2025 Desa Pasirkecapi By Silmi Nasution.
                                        
                                        All Rights Reserved.
                                    </p>
                                </div>

                                <div class="site-footer__bottom-menu">
                                    <ul>
                                        <li>
                                            <p><a href="about.html">Trams & Condition</a></p>
                                        </li>
                                        <li>
                                            <p><a href="about.html">Privacy Policy</a></p>
                                        </li>
                                        <li>
                                            <p><a href="contact.html">Contact Us</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer Two End-->

    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets2/images/resources/logo-4.png" width="140"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@reroof.com</a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->

        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->


    <!-- Search Popup -->
    <div class="search-popup">
        <div class="color-layer"></div>
        <button class="close-search"><span class="far fa-times fa-fw"></span></button>
        <form method="post" action="blog.html">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Search Popup -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>


    <script src="{{ asset('assets2/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets2/js/swiper.min.j') }}s"></script>
    <script src="{{ asset('assets2/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets2/js/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets2/js/wow.js') }}"></script>
    <script src="{{ asset('assets2/js/isotope.js') }}"></script>
    <script src="{{ asset('assets2/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets2/js/marquee.min.js') }}"></script>
    <script src="{{ asset('assets2/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.fittext.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery-sidebar-content.js') }}"></script>
    <script src="{{ asset('assets2/js/aos.js') }}"></script>
    <script src="{{ asset('assets2/js/typed-2.0.11.js') }}"></script>


    <script src="{{ asset('assets2/js/gsap/gsap.js') }}"></script>
    <script src="{{ asset('assets2/js/gsap/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('assets2/js/gsap/SplitText.js') }}"></script>




    <!-- template js -->
    <script src="{{ asset('assets2/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>