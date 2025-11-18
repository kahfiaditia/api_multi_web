<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Dhasatra Money Transfer" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Produk Kami - Dhasatra Money Transfer</title>

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
                            <h1 class="big-header-capt text-dark mb-3">Produk Kami</h1>
                            <p class="lead text-muted">Dhasatra Money Transfer menyediakan beragam solusi pembayaran
                                digital yang aman, cepat, dan mudah digunakan untuk berbagai kebutuhan bisnis maupun
                                personal.</p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-12 d-none d-lg-block">
                        <img src="{{ asset('assets2/img/hero-img-3.png') }}" class="img-fluid" alt="Produk Kami">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->

        <!-- Produk Section -->
        <section class="bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2>Solusi Pembayaran Digital</h2>
                        <p class="text-muted">Produk unggulan kami dirancang untuk mendukung kebutuhan transaksi
                            digital yang efisien dan terpercaya.</p>
                    </div>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Virtual Account -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="prc-wraps text-center shadow-sm p-4 bg-white rounded-3 h-100">
                            <div class="prc-thumb mb-3">
                                <img src="{{ asset('assets2/img/schedule.png') }}" class="img-fluid w-25" alt="Virtual Account">
                            </div>
                            <h5>Virtual Account</h5>
                            <p class="text-muted">Menyediakan nomor pembayaran unik untuk mempermudah pencatatan,
                                mempercepat proses verifikasi, dan mengurangi kesalahan transaksi.</p>
                        </div>
                    </div>

                    <!-- Fund Transfer -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="prc-wraps text-center shadow-sm p-4 bg-white rounded-3 h-100">
                            <div class="prc-thumb mb-3">
                                <img src="{{ asset('assets2/img/search.png') }}" class="img-fluid w-25" alt="Fund Transfer">
                            </div>
                            <h5>Fund Transfer</h5>
                            <p class="text-muted">Layanan transfer dana antar bank secara cepat, aman, dan praktis
                                untuk kebutuhan personal maupun bisnis.</p>
                        </div>
                    </div>

                    <!-- QR Codes -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="prc-wraps text-center shadow-sm p-4 bg-white rounded-3 h-100">
                            <div class="prc-thumb mb-3">
                                <img src="{{ asset('assets2/img/medal.png') }}" class="img-fluid w-25" alt="QR Codes">
                            </div>
                            <h5>QR Codes</h5>
                            <p class="text-muted">Kemudahan pembayaran instan dengan scan QR menggunakan ponsel,
                                mendukung transaksi cepat dan tanpa kontak.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="newsletter bg-main position-relative" style="background:url(assets/img/subscribe-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9 col-md-10 col-sm-12">
                        <div class="text-start">
                            <div class="subscribe-caption d-block mb-4">
                                <h2 class="fs-1 lh-base text-light">Siap menggunakan produk kami?</h2>
                                <p class="text-light opacity-75">Hubungi tim kami untuk mendapatkan informasi lebih
                                    lengkap mengenai layanan Virtual Account, Fund Transfer, dan QR Codes.</p>
                            </div>
                            <a href="#" class="btn mid btn-whites rounded-pill px-4">Hubungi Kami<i
                                    class="bi bi-send ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute end-0 bottom-0 d-none d-lg-block">
                <img src="assets/img/subscribe-shapes.png" class="img-fluid" width="500" alt="Image">
            </div>
        </section>

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
