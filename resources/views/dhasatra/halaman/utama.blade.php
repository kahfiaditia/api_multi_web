<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Firma Hukum Anda" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Firma Hukum | Layanan Hukum Profesional</title>

    <!-- Custom CSS -->
    <link href="{{ asset('assets2/css/styles.css') }}" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{ asset('assets2/css/colors.css') }}" rel="stylesheet">

</head>

<body class="red-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-light head-shadow">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{ route('depan') }}">
                            <img src="{{ asset('assets2/img/logo/legalitas.png') }}" class="logo"
                                alt="Logo Firma Hukum" />
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu">

                            <li class="active"><a href="{{ route('depan') }}">Beranda</a></li>

                            <li><a href="#">Layanan<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ route('produk') }}">Corporate Legal Advice</a></li>
                                    <li><a href="#">Litigation</a></li>
                                    <li><a href="#">Contract and Preparation</a></li>
                                    <li><a href="#">Legal Audit</a></li>
                                    <li><a href="#">Legal Opinion</a></li>
                                    <li><a href="#">Legal Protection</a></li>
                                    <li><a href="#">Probono (Legal Aid)</a></li>
                                </ul>
                            </li>

                            <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>

                            <li><a href="#">Tim Pengacara</a></li>

                            <li><a href="#">Kontak</a></li>

                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">
                            <li class="join-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#login"><i
                                        class="bi bi-box-arrow-in-right"></i>Konsultasi Gratis</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <!-- ============================ Hero Banner  Start================================== -->
        @include('hukum.banner')
        <!-- ============================ Hero Banner End ================================== -->


        <!-- ============================== Trusted Partner Start =========================== -->
        <section>
            <div class="container">
                 <!-- Heading Row -->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="sec-heading center">
                            <h2>Perusahaan dan Individu</h2>
                            <p>Kami telah bekerja sama dengan perusahaan dan individu besar di seluruh Indonesia</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-12">
                        <div class="single_brand" id="brand-slide">
                            @foreach ($client as $client)
                                <div class="single_brands">
                                    <img src="{{ asset($client->path_gambar) }}" class="img-fluid" alt="Klien 1" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>



            </div>
        </section>
        <!-- ============================== Trusted Partner End =========================== -->


        <!-- ============================  Our Services Start ================================== -->
        <section class="pt-0">
            <div class="container">

                <!-- Heading Row -->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="sec-heading center">
                            <h2>Layanan Hukum Kami</h2>
                            <p>Kami menyediakan berbagai layanan hukum profesional untuk memenuhi kebutuhan hukum bisnis
                                dan individu</p>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row justify-content-center">

                    <!-- Single Service -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="education_block_grid border">

                            <div class="education-thumb position-relative">
                                <a href="#"><img src="https://placehold.co/800x550" class="img-fluid"
                                        alt="Corporate Legal Advice"></a>
                            </div>

                            <div class="education-body p-3">
                                <div class="education-title">
                                    <h4 class="fs-6 fw-medium"><a href="#">Corporate Legal Advice</a></h4>
                                </div>

                                <div class="cources-info">
                                    <p>Konsultasi hukum komprehensif untuk perusahaan, termasuk struktur bisnis,
                                        kepatuhan regulasi, dan strategi hukum korporat.</p>
                                </div>
                            </div>

                            <div class="education-footer p-3">
                                <div class="enrolled-link"><a href="#" class="main-link fw-medium">Selengkapnya<i
                                            class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="education_block_grid border">

                            <div class="education-thumb position-relative">
                                <a href="#"><img src="https://placehold.co/800x550" class="img-fluid"
                                        alt="Litigation"></a>
                            </div>

                            <div class="education-body p-3">
                                <div class="education-title">
                                    <h4 class="fs-6 fw-medium"><a href="#">Litigation</a></h4>
                                </div>

                                <div class="cources-info">
                                    <p>Perwakilan hukum di pengadilan untuk berbagai jenis sengketa, termasuk perdata,
                                        pidana, dan perselisihan bisnis.</p>
                                </div>
                            </div>

                            <div class="education-footer p-3">
                                <div class="enrolled-link"><a href="#" class="main-link fw-medium">Selengkapnya<i
                                            class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="education_block_grid border">

                            <div class="education-thumb position-relative">
                                <a href="#"><img src="https://placehold.co/800x550" class="img-fluid"
                                        alt="Contract and Preparation"></a>
                            </div>

                            <div class="education-body p-3">
                                <div class="education-title">
                                    <h4 class="fs-6 fw-medium"><a href="#">Contract and Preparation</a></h4>
                                </div>

                                <div class="cources-info">
                                    <p>Penyusunan, peninjauan, dan negosiasi berbagai jenis kontrak bisnis untuk
                                        melindungi kepentingan hukum klien.</p>
                                </div>
                            </div>

                            <div class="education-footer p-3">
                                <div class="enrolled-link"><a href="#"
                                        class="main-link fw-medium">Selengkapnya<i
                                            class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="education_block_grid border">

                            <div class="education-thumb position-relative">
                                <a href="#"><img src="https://placehold.co/800x550" class="img-fluid"
                                        alt="Legal Audit"></a>
                            </div>

                            <div class="education-body p-3">
                                <div class="education-title">
                                    <h4 class="fs-6 fw-medium"><a href="#">Legal Audit</a></h4>
                                </div>

                                <div class="cources-info">
                                    <p>Pemeriksaan menyeluruh terhadap kepatuhan hukum perusahaan dan identifikasi
                                        risiko hukum yang mungkin timbul.</p>
                                </div>
                            </div>

                            <div class="education-footer p-3">
                                <div class="enrolled-link"><a href="#"
                                        class="main-link fw-medium">Selengkapnya<i
                                            class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="education_block_grid border">

                            <div class="education-thumb position-relative">
                                <a href="#"><img src="https://placehold.co/800x550" class="img-fluid"
                                        alt="Legal Opinion"></a>
                            </div>

                            <div class="education-body p-3">
                                <div class="education-title">
                                    <h4 class="fs-6 fw-medium"><a href="#">Legal Opinion</a></h4>
                                </div>

                                <div class="cources-info">
                                    <p>Pendapat hukum tertulis yang komprehensif mengenai berbagai masalah hukum untuk
                                        membantu pengambilan keputusan.</p>
                                </div>
                            </div>

                            <div class="education-footer p-3">
                                <div class="enrolled-link"><a href="#"
                                        class="main-link fw-medium">Selengkapnya<i
                                            class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="education_block_grid border">

                            <div class="education-thumb position-relative">
                                <a href="#"><img src="https://placehold.co/800x550" class="img-fluid"
                                        alt="Legal Protection"></a>
                            </div>

                            <div class="education-body p-3">
                                <div class="education-title">
                                    <h4 class="fs-6 fw-medium"><a href="#">Legal Protection</a></h4>
                                </div>

                                <div class="cources-info">
                                    <p>Perlindungan hukum menyeluruh untuk individu dan bisnis, termasuk hak kekayaan
                                        intelektual dan perlindungan konsumen.</p>
                                </div>
                            </div>

                            <div class="education-footer p-3">
                                <div class="enrolled-link"><a href="#"
                                        class="main-link fw-medium">Selengkapnya<i
                                            class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-xl-4 col-lg-4 col-md-6 mx-auto">
                        <div class="education_block_grid border">

                            <div class="education-thumb position-relative">
                                <a href="#"><img src="https://placehold.co/800x550" class="img-fluid"
                                        alt="Probono (Legal Aid)"></a>
                            </div>

                            <div class="education-body p-3">
                                <div class="education-title">
                                    <h4 class="fs-6 fw-medium"><a href="#">Probono (Legal Aid)</a></h4>
                                </div>

                                <div class="cources-info">
                                    <p>Layanan hukum gratis untuk masyarakat yang kurang mampu sebagai bentuk tanggung
                                        jawab sosial kami.</p>
                                </div>
                            </div>

                            <div class="education-footer p-3">
                                <div class="enrolled-link"><a href="#"
                                        class="main-link fw-medium">Selengkapnya<i
                                            class="bi bi-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- ============================   Our Services End ================================== -->


        <!-- ============================== Why Choose Us Start ================================== -->
        <section class="py-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="bg-cover bg-main rounded-4 position-relative"
                            style="background:url(assets/img/become-bg.png)no-repeat;">
                            <div class="row align-items-start">
                                <div class="col-xxl-6 col-xl-7 col-lg-9">
                                    <div class="py-5 px-md-5 px-4">
                                        <div class="become-content d-block mb-4">
                                            <h2 class="text-light">Mengapa Memilih Firma Hukum Kami?</h2>
                                            <p class="text-light fs-6 opacity-75">Kami berkomitmen memberikan layanan
                                                hukum terbaik dengan pendekatan personal dan profesional</p>
                                        </div>
                                        <div class="btn-block">
                                            <a href="#" class="btn btn-lg btn-dark rounded-pill px-5">Konsultasi
                                                Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-absolute end-0 bottom-0 d-lg-block d-none">
                                <img src="{{ asset('assets2/img/2.png') }}" class="img-fluid" width="470" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================================= Why Choose Us End =============================== -->


        <!-- ========================== Meet Our Team Section Start =============================== -->
        <section class="bg-light">
            <div class="container">

                <!-- Heading Row -->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="sec-heading center">
                            <h2>Tim Pengacara Kami</h2>
                            <p>Bertemu dengan tim pengacara berpengalaman yang siap membantu menyelesaikan masalah hukum
                                Anda</p>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-lg-12">

                        <div class="arrow_slide four_slide arrow_middle">

                            <!-- Single Slide -->
                            <div class="singles_items">
                                <div class="tutor-card card border rounded-3 px-3 py-4 pt-5">

                                    <div class="position-absolute end-0 top-0 mt-3 me-3"><span
                                            class="badge bg-light-pro text-pro fw-semibold text-uppercase">Senior</span>
                                    </div>
                                    <div class="tutor-thumb d-flex align-items-center justify-content-center mb-2">
                                        <div class="square--90"><img src="{{ asset('assets2/img/2.png') }}"
                                                class="img-fluid circle" alt="Pengacara"></div>
                                    </div>

                                    <div class="d-flex flex-column gap-1 mb-5">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h6 class="fw-semibold lh-0 m-0">Dr. Emily Watson, S.H., M.H.</h6>
                                        </div>
                                        <div class="d-block text-center"><span class="text-muted">Spesialis Hukum
                                                Perusahaan</span></div>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <span class="fw-semibold text-dark">15+ Tahun Pengalaman</span>
                                        </div>
                                    </div>

                                    <div class="tutor-thumb d-flex align-items-center justify-content-center">
                                        <a href="instructor-detail.html"
                                            class="btn btn-md btn-gray rounded-pill w-100">Profil Lengkap</a>
                                    </div>

                                </div>
                            </div>

                            <!-- Single Slide -->
                            <div class="singles_items">
                                <div class="tutor-card card border rounded-3 px-3 py-4 pt-5">
                                    <div class="tutor-thumb d-flex align-items-center justify-content-center mb-2">
                                        <div class="square--90"><img src="{{ asset('assets2/img/2.png') }}"
                                                class="img-fluid circle" alt="Pengacara"></div>
                                    </div>

                                    <div class="d-flex flex-column gap-1 mb-5">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h6 class="fw-semibold lh-0 m-0">Ms. Isabella Rossi, S.H.</h6>
                                        </div>
                                        <div class="d-block text-center"><span class="text-muted">Spesialis
                                                Litigasi</span></div>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <span class="fw-semibold text-dark">12+ Tahun Pengalaman</span>
                                        </div>
                                    </div>

                                    <div class="tutor-thumb d-flex align-items-center justify-content-center">
                                        <a href="instructor-detail.html"
                                            class="btn btn-md btn-gray rounded-pill w-100">Profil Lengkap</a>
                                    </div>

                                </div>
                            </div>

                            <!-- Single Slide -->
                            <div class="singles_items">
                                <div class="tutor-card card border rounded-3 px-3 py-4 pt-5">

                                    <div class="position-absolute end-0 top-0 mt-3 me-3"><span
                                            class="badge bg-light-green text-green fw-semibold text-uppercase">Associate</span>
                                    </div>
                                    <div class="tutor-thumb d-flex align-items-center justify-content-center mb-2">
                                        <div class="square--90"><img src="{{ asset('assets2/img/2.png') }}"
                                                class="img-fluid circle" alt="Pengacara"></div>
                                    </div>

                                    <div class="d-flex flex-column gap-1 mb-5">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h6 class="fw-semibold lh-0 m-0">Liam Anderson, S.H.</h6>
                                        </div>
                                        <div class="d-block text-center"><span class="text-muted">Spesialis
                                                Kontrak</span></div>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <span class="fw-semibold text-dark">8+ Tahun Pengalaman</span>
                                        </div>
                                    </div>

                                    <div class="tutor-thumb d-flex align-items-center justify-content-center">
                                        <a href="instructor-detail.html"
                                            class="btn btn-md btn-gray rounded-pill w-100">Profil Lengkap</a>
                                    </div>

                                </div>
                            </div>

                            <!-- Single Slide -->
                            <div class="singles_items">
                                <div class="tutor-card card border rounded-3 px-3 py-4 pt-5">
                                    <div class="tutor-thumb d-flex align-items-center justify-content-center mb-2">
                                        <div class="square--90"><img src="https://placehold.co/500x500"
                                                class="img-fluid circle" alt="Pengacara"></div>
                                    </div>

                                    <div class="d-flex flex-column gap-1 mb-5">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h6 class="fw-semibold lh-0 m-0">Carlos Rodríguez, S.H., LL.M.</h6>
                                        </div>
                                        <div class="d-block text-center"><span class="text-muted">Spesialis Hukum
                                                Internasional</span></div>
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <span class="fw-semibold text-dark">10+ Tahun Pengalaman</span>
                                        </div>
                                    </div>

                                    <div class="tutor-thumb d-flex align-items-center justify-content-center">
                                        <a href="instructor-detail.html"
                                            class="btn btn-md btn-gray rounded-pill w-100">Profil Lengkap</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- ========================== Meet Our Team Section End =============================== -->


        <!-- ========================== About Facts List Section =============================== -->
        <section>
            <div class="container">

                <div class="row align-items-center justify-content-center gx-lg-5 g-4">

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="benifit-oflearning">
                            <div class="d-block mb-4">
                                <h2 class="display-5 fw-normal text-dark">Tentang Firma Hukum Kami</h2>
                                <p class="text-muted">Kami adalah firma hukum yang berdedikasi untuk memberikan solusi
                                    hukum terbaik bagi klien kami, baik individu maupun perusahaan.</p>
                                <p class="text-muted">Dengan pengalaman bertahun-tahun di berbagai bidang hukum, kami
                                    telah membantu ratusan klien menyelesaikan masalah hukum mereka dengan hasil yang
                                    memuaskan.</p>
                            </div>

                            <div class="benifit-wraps mb-4">
                                <ul class="p-0 m-0 row g-4">
                                    <li class="col-sm-6 fs-5">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="icons"><i
                                                    class="bi bi-patch-check-fill text-green"></i></span><span
                                                class="fs-6">Pengacara Berpengalaman</span>
                                        </div>
                                    </li>
                                    <li class="col-sm-6 fs-5">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="icons"><i
                                                    class="bi bi-patch-check-fill text-green"></i></span><span
                                                class="fs-6">Layanan Komprehensif</span>
                                        </div>
                                    </li>

                                    <li class="col-sm-6 fs-5">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="icons"><i
                                                    class="bi bi-patch-check-fill text-green"></i></span><span
                                                class="fs-6">Pendekatan Personal</span>
                                        </div>
                                    </li>
                                    <li class="col-sm-6 fs-5">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="icons"><i
                                                    class="bi bi-patch-check-fill text-green"></i></span><span
                                                class="fs-6">Hasil Terbukti</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="btn btn-main rounded-pill px-5">Hubungi Kami</a>
                        </div>

                    </div>

                    <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
                        <div class="facts-img">
                            <img src="https://placehold.co/850x1000" class="img-fluid" alt="Tentang Kami" />
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- ========================== About Facts List Section =============================== -->

        <!-- ============================== Start Newsletter ================================== -->
        <section class="bg-cover newsletter bg-main" style="background:url(assets/img/subscribe-bg.png);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8 col-sm-12">
                        <div class="text-center">
                            <div class="subscribe-caption d-block mb-4">
                                <h2 class="text-light">Butuh Konsultasi Hukum?</h2>
                                <p class="text-light opacity-75">Hubungi kami sekarang untuk konsultasi gratis dan
                                    dapatkan solusi terbaik untuk masalah hukum Anda!</p>
                            </div>
                            <div class="d-block mt-2">
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <a href="#" class="btn btn-light px-4">Hubungi Kami</a>
                                    <a href="#" class="btn btn-outline-light">Konsultasi Online</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================================= End Newsletter =============================== -->


        <!-- ============================ Footer Start ================================== -->
        <footer class="dark-footer">
            <div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <img src="assets/img/logo-light.svg" class="img-footer" alt="" />
                                <div class="footer-add">
                                    <address class="mb-4 lh-base">Jl. Hukum No. 123, Jakarta Pusat<br>Indonesia 10110
                                    </address>
                                    <div class="d-flex align-items-center call-now gap-2 mb-3">
                                        <div class="square--30 circle bg-light-main text-main"><i
                                                class="bi bi-telephone"></i></div>
                                        <div class="fs-6 fw-semibold">(021) 1234-5678</div>
                                    </div>
                                    <div class="d-flex align-items-center call-now gap-2">
                                        <div class="square--30 circle bg-light-main text-main"><i
                                                class="bi bi-envelope"></i></div>
                                        <div class="fs-6 fw-semibold">info@firmahukum.com</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">Navigasi</h4>
                                <ul class="footer-menu">
                                    <li><a href="about-us.html">Tentang Kami</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="contact.html">Kontak</a></li>
                                    <li><a href="blog.html">Blog Hukum</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">Layanan</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">Corporate Legal Advice</a></li>
                                    <li><a href="#">Litigation</a></li>
                                    <li><a href="#">Contract and Preparation</a></li>
                                    <li><a href="#">Legal Audit</a></li>
                                    <li><a href="#">Legal Opinion</a></li>
                                    <li><a href="#">Legal Protection</a></li>
                                    <li><a href="#">Probono (Legal Aid)</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">Bantuan</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">Konsultasi Gratis</a></li>
                                    <li><a href="#">Live Chat</a></li>
                                    <li><a href="#">Privasi</a></li>
                                    <li><a href="#">Syarat & Ketentuan</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12">
                            <div class="footer-widget">
                                <h4 class="widget-title">Jam Operasional</h4>
                                <div class="opening-hours">
                                    <p>Senin - Jumat: 08:00 - 17:00</p>
                                    <p>Sabtu: 09:00 - 15:00</p>
                                    <p>Minggu: Tutup</p>
                                </div>
                                <div class="social-links mt-3">
                                    <a href="#" class="btn btn-sm btn-outline-light me-2"><i
                                            class="bi bi-facebook"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-light me-2"><i
                                            class="bi bi-twitter"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-light me-2"><i
                                            class="bi bi-linkedin"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-light"><i
                                            class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center g-3">

                        <div class="col-lg-6 col-md-6">
                            <p class="mb-0">© 2020-2025 Firma Hukum. Hak Cipta Dilindungi.</p>
                        </div>

                        <div class="col-lg-6 col-md-6 text-md-end">
                            <ul class="footer-bottom-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="registermodal">
                    <div class="position-absolute end-0 top-0 mt-3 me-3 z-1">
                        <span class="square--30 circle bg-light z-2" data-bs-dismiss="modal" aria-hidden="true"><i
                                class="bi bi-x"></i></span>
                    </div>
                    <div class="modal-body p-4">
                        <div class="login-card">

                            <div class="web-logo d-flex align-items-center justify-content-center mb-3">
                                <div class="logo"><img src="assets/img/logo-icon.png" class="img-fluid"
                                        width="60" alt="Logo"></div>
                            </div>

                            <div class="login-caps mb-3">
                                <div class="text-center">
                                    <h3 class="fw-semibold m-0">Konsultasi Hukum Gratis</h3>
                                    <span>Isi formulir di bawah ini untuk mendapatkan konsultasi hukum gratis dari tim
                                        kami.</span>
                                </div>
                            </div>

                            <div class="login-form">
                                <form>

                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap">
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="tel" class="form-control" placeholder="Nomor Telepon">
                                    </div>

                                    <div class="form-group mb-4">
                                        <select class="form-control">
                                            <option value="">Pilih Jenis Layanan</option>
                                            <option value="corporate">Corporate Legal Advice</option>
                                            <option value="litigation">Litigation</option>
                                            <option value="contract">Contract and Preparation</option>
                                            <option value="audit">Legal Audit</option>
                                            <option value="opinion">Legal Opinion</option>
                                            <option value="protection">Legal Protection</option>
                                            <option value="probono">Probono (Legal Aid)</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <textarea class="form-control" placeholder="Jelaskan masalah hukum Anda secara singkat"></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="button" class="btn btn-main w-100">Kirim Permintaan
                                            Konsultasi</button>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

        <!-- ============================ FLOATING WHATSAPP BUTTON ============================ -->
        <div class="floating-whatsapp">
            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20hukum%20dengan%20firma%20hukum%20Anda" 
               target="_blank" 
               class="whatsapp-button"
               title="Konsultasi via WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
            <div class="whatsapp-tooltip">
                Konsultasi Gratis via WhatsApp
            </div>
        </div>
        <!-- ============================ END FLOATING WHATSAPP BUTTON ============================ -->
        <style>
            .floating-whatsapp {
                position: fixed;
                bottom: 90px;
                right: 20px;
                z-index: 1000;
            }

            .whatsapp-button {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 60px;
                height: 60px;
                background-color: #25D366;
                color: white;
                border-radius: 50%;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                text-decoration: none;
                font-size: 30px;
            }

            .whatsapp-button:hover {
                background-color: #20b358;
                color: white;
            }

            .whatsapp-tooltip {
                display: none;
                position: absolute;
                bottom: 70px;
                right: 0;
                background-color: #25D366;
                color: white;
                padding: 8px 12px;
                border-radius: 4px;
                font-size: 14px;
                white-space: nowrap;
            }

            .floating-whatsapp:hover .whatsapp-tooltip {
                display: block;
            }
        </style>
    </div>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets2/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets2/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets2/js/slick.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/custom.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

</body>

</html>
