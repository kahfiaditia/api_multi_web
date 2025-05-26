
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

        /* //whatsapp */
        .floating-whatsapp {
            position: fixed;
            bottom: 180px;
            right: 20px;
            z-index: 9999;
            background-color: #25D366;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .floating-whatsapp:hover {
            transform: scale(1.1);
        }
        .floating-whatsapp img {
            width: 40px;
            height: 40px;
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
                                    {{-- <a href="#"><img src="{{ asset('assets/images/lebak_banten.png') }}" alt="" style="width: 70px; height: 70px;"></a> --}}
                                    <a href="#"><img src="{{ asset('assets/images/desaku_3.png') }}" alt="" ></a>
                                </div>
                            </div>

                            <div class="main-menu__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li>
                                        <a href="{{ route('utama') }}">Home</a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{ route('tentang') }}">Profil</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Data Desa +</a>
                                        <ul>
                                            <li><a href="#">Data Pekerjaan</a></li>
                                            <li><a href="#">Data Agama</a></li>
                                            <li><a href="#">Data Jenis Kelamin</a></li>
                                          
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Tranparansi +</a>
                                        <ul>
                                            <li><a href="{{ route('artikel') }}">Artikel</a></li>
                                            <li><a href="{{ route('kegiatan') }}">Kegiatan</a></li>
                                            <li><a href="{{ route('jadwal') }}">Kalender Kegiatan</a></li>
                                         
                                        </ul>
                                    </li>
                                    

                                    <li>
                                        <a href="{{ route('kontak') }}">Kontak</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="main-menu__right">
                                {{-- <div class="main-menu__search">
                                    <a href="#"><span
                                            class="searcher-toggler-box icon-search-interface-symbol"></span></a>
                                </div> --}}

                                <div class="main-menu__btn">
                                    <a href="#" class="thm-btn">Pengaduan <span
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

            @yield('contentx')
       

        <!--Start Newsletter Two-->
        {{-- <section class="newsletter-two">
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
        </section> --}}
        <!--End Newsletter Two-->
        <a href="https://wa.me/{{ $profils->telepon }}" class="floating-whatsapp" target="_blank">
            <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp">
        </a>

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
                                    <a href="#"><img src="{{ asset('assets/images/desaku.png') }}" alt="" ></a>
                                    {{-- <a href="#"><img src="{{ asset('assets/images/nama.png') }}" alt="" style="width: 100px; height: 200px;"></a> --}}
                                </div>

                                <p class="footer-widget__about-text">Bersatu Membangun, Bersama Mensejahterakan</p>
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
                                <h4 class="footer-widget__title">Menu</h4>
                                <ul class="footer-widget__links-list">
                                    <li><a href="{{ route('tentang') }}">Profil</a></li>
                                    <li><a href="{{ route('kegiatan') }}">Anggaran</a></li>
                                    <li><a href="{{ route('kegiatan') }}">Kegiatan</a></li>
                                    <li><a href="{{ route('kegiatan') }}">Kalender Kegiatan</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__links footer-widget__services">
                                <h4 class="footer-widget__title">Services</h4>
                                <ul class="footer-widget__links-list">
                                    <li><a href=""> Perangkat Desa</a>
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
                                            <p>{{ \Str::limit($profils->deskripsi, 50) }}</p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="text">
                                            <p><a href="{{ $profils->telepon }}">{{ $profils->telepon }}</a></p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="text">
                                            <p><a href="{{ $profils->email }}">{{ $profils->email }}</a></p>
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

                                {{-- <div class="site-footer__bottom-menu">
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
                                </div> --}}
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