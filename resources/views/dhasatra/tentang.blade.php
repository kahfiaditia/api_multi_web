<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Dhasatra Money Transfer" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Tentang Kami - Dhasatra Money Transfer</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets2/img/logo/fav.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('assets2/img/logo/fav.png') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('assets2/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/colors.css') }}" rel="stylesheet">
</head>

<body class="red-skin">

    <div id="main-wrapper">

        <!-- Header -->
        @include('dhasatra.menu')
        <div class="clearfix"></div>

        <!-- Hero Banner -->
        <div class="hero_banner home-4 position-relative">
            <div class="container">
                <div class="row align-items-center justify-content-between g-4">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div class="hero-caption mb-3">
                            <h1 class="big-header-capt text-dark mb-3">Tentang Dhasatra</h1>
                            <p class="lead text-muted">Kami adalah perusahaan <b>Payment Gateway</b> yang hadir untuk
                                memberikan solusi transaksi digital yang aman, cepat, dan terpercaya bagi bisnis dan
                                individu.</p>
                        </div>
                        <a href="#visi-misi" class="btn btn-main rounded-pill px-4">Pelajari Lebih Lanjut</a>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-12 d-none d-lg-block">
                        <img src="{{ asset('assets2/img/hero-img-2.png') }}" class="img-fluid" alt="Tentang Kami">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->

        <!-- Sejarah Perusahaan -->
        <section class="bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2>Sejarah Kami</h2>
                        <p class="text-muted">Sejak berdiri, Dhasatra Money Transfer berkomitmen untuk menyediakan
                            layanan pembayaran digital yang modern. Dengan dukungan teknologi mutakhir, kami membantu
                            perusahaan dari berbagai sektor untuk mengelola transaksi keuangan dengan lebih efisien.</p>
                    </div>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-lg-4">
                        <div class="prc-wraps text-center">
                            <div class="prc-thumb mb-3">
                                <img src="{{ asset('assets2/img/medal.png') }}" class="img-fluid w-25" alt="">
                            </div>
                            <h5>Pengalaman</h5>
                            <p class="text-muted">Bertahun-tahun melayani kebutuhan transaksi keuangan digital di
                                Indonesia.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="prc-wraps text-center">
                            <div class="prc-thumb mb-3">
                                <img src="{{ asset('assets2/img/briefcase.png') }}" class="img-fluid w-25" alt="">
                            </div>
                            <h5>Inovasi</h5>
                            <p class="text-muted">Kami selalu mengembangkan solusi baru untuk mengikuti perkembangan
                                teknologi finansial.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="prc-wraps text-center">
                            <div class="prc-thumb mb-3">
                                <img src="{{ asset('assets2/img/content.png') }}" class="img-fluid w-25" alt="">
                            </div>
                            <h5>Kepercayaan</h5>
                            <p class="text-muted">Dipercaya oleh banyak mitra bisnis dan pelanggan individu untuk
                                transaksi harian mereka.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi Misi -->
       

        <!-- Tim Kami -->
       

        <!-- Newsletter -->
       

        <!-- Footer -->
        @include('dhasatra.footer')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets2/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets2/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/js/custom.js') }}"></script>

</body>
</html>
