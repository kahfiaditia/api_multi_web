<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Firma Hukum Anda" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>{{ $title }}</title>
    <link href="{{ asset('assets2/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/colors.css') }}" rel="stylesheet">

</head>

<body class="red-skin">


    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <div id="main-wrapper">

       
       @include('legal.struktur.menu')

        <div class="clearfix"></div>

          @yield('hukum')


       @include('legal.struktur.footer')
      

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
