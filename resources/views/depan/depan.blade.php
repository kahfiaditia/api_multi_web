@extends('depan.utama')
@section('contentx')
    

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
                                    <h2 class="count-text" data-stop="{{ $profils->jumlah_rumah }}" data-speed="1500">00</h2>
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
                                    <h2 class="count-text" data-stop="{{ $profils->jumlah_rt }}" data-speed="1500">00</h2>
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
                                    <h2 class="count-text" data-stop="{{ $profils->jumlah_rw }}" data-speed="1500">00</h2>
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
                                    <h2 class="count-text" data-stop="{{ $profils->jumlah_warga }}" data-speed="1500">00</h2>
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
                                 @if (!empty($sambutan->gambar_sambutan))
                                    <img src="{{ asset('assets/images/sambutan/' . $sambutan->gambar_sambutan) }}" alt="#">
                                 @endif
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
                                    <h4>Sambutan Kepala Desa Pasir Kecapi</h4>
                                </div>
                                @if(!empty($sambutan->keterangan))
                                    <h2 class="section-title__title title-animation">{{ $sambutan->keterangan }}</h2>
                                @endif
                            </div>

                            <div class="about-two__content-text">
                                 @if(!empty($sambutan->area))
                                    <p>{!! $sambutan->area !!}</p>
                                @endif
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

                               

                            {{-- <div class="about-two__content-text2">
                                <p>We ensure to quality workmanship and materials for lasting protection <br> roofing
                                    desi services hers tailored to needs your </p>
                            </div> --}}

                            {{-- <div class="about-two__btn">
                                <a href="about.html" class="thm-btn">About Us <span class="icon-next1"></span></a>
                            </div> --}}
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
                       
                        <div class="col-xl-12 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">

                                <div class="why-choose-one__content-bottom">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="why-choose-one__content-single">
                                                <div class="icon-box">
                                                    <span class="icon-roof-6"></span>
                                                </div>
                                                <div class="title-box">
                                                    <h3>{{ $profils->kecamatan }}</h3>
                                                </div>
                                            </div>

                                            
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="why-choose-one__content-single">
                                                <div class="icon-box">
                                                    <span class="icon-roof-2"></span>
                                                </div>
                                                <div class="title-box">
                                                    <h3>{{ $profils->kabupaten }}</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="why-choose-one__content-single">
                                                <div class="icon-box">
                                                    <span class="icon-roof-1"></span>
                                                </div>
                                                <div class="title-box">
                                                    <h3>{{ $profils->provinsi }}</h3>
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
                        <a href="#" class="thm-btn">Selengkapnya <span class="icon-next1"></span></a>
                    </div>
                </div>

                <div class="row">
                    <!--Start Service Two Single-->
                    @foreach ($potensi as $potensi)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                        <div class="service-two__single">
                            <div class="service-two__single-icon">
                                <span class="icon-roof-13"></span>
                            </div>

                            <div class="service-two__single-title">
                                <h2><a href="#">{{ $potensi->judul }}</a></h2>
                            </div>

                            <div class="service-two__single-img">
                                <img src="{{ asset('assets/images/blog/'.  $potensi->gambar1 ) }}" alt="">
                                <img src="{{ asset('assets/images/blog/'. $potensi->gambar1 ) }}" alt="">
                                <a href="#" class="service-two__single-img-link"><span
                                        class="icon-next1"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  
                    <!--End Service Two Single-->

                    <!--Start Service Two Single-->
                    {{-- <div class="col-xl-4 col-lg-4 wow fadeInDown" data-wow-delay=".3s">
                        <div class="service-two__single">
                            <div class="service-two__single-icon">
                                <span class="icon-roof-10"></span>
                            </div>

                            <div class="service-two__single-title">
                                <h2><a href="#"> Potensi Sumber Daya Ekonomi</a></h2>
                            </div>

                            <div class="service-two__single-img">
                                <img src="assets/images/potensi/5.png" alt="">
                                <img src="assets/images/potensi/5.png" alt="">
                                <a href="#" class="service-two__single-img-link"><span
                                        class="icon-next1"></span></a>
                            </div>
                        </div>
                    </div> --}}
                    <!--End Service Two Single-->

                    <!--Start Service Two Single-->
                    {{-- <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                        <div class="service-two__single">
                            <div class="service-two__single-icon">
                                <span class="icon-roof-14"></span>
                            </div>

                            <div class="service-two__single-title">
                                <h2><a href="#">Potensi Sumber Daya Infrastruktur</a></h2>
                            </div>

                            <div class="service-two__single-img">
                                <img src="assets/images/potensi/3.png" alt="">
                                <img src="assets/images/potensi/3.png" alt="">
                                <a href="#" class="service-two__single-img-link"><span
                                        class="icon-next1"></span></a>
                            </div>
                        </div>
                    </div> --}}
                    <!--End Service Two Single-->
                </div>
            </div>
        </section>
        <!--Potensi-->

        <!--Pembangunan -->
        <section class="work-process-two">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style2">
                    <div class="section-title__tagline title-animation">
                        <h4>Proses Pembangunan </h4>
                    </div>
                    <h2 class="section-title__title title-animation">Pembangunan Pondasi Ekonomi</h2>
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
                                <h2><a href="#">Pembangunan Desa</a></h2>
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
                                <h2><a href="#">Pengawasan dan Evaluasi</a></h2>
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
                                <span class="icon-workers"></span>
                            </div>

                            <div class="work-process-two__single-title">
                                <h2><a href="#">Pemberdayaan Masyarakat</a></h2>
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
                                <h2><a href="#">Pemeliharaan dan Keberlanjutan</a></h2>
                            </div>
                        </div>
                    </div>
                    <!--End Work Process Two Single-->
                </div>
            </div>
        </section>
        <!--Pembangunan -->

        <!--Galeri-->
        <section class="projects-one projects-one--two">
            <div class="projects-two__top">
                <div class="container">
                    <div class="projects-two__top-inner">
                        <div class="section-title sec-title-animation animation-style2">
                            <div class="section-title__tagline title-animation">
                                <h4>Galery</h4>
                            </div>
                            <h2 class="section-title__title title-animation">Masyrarakat Bhkati Sosial
                            </h2>
                        </div>

                        <div class="projects-two__top-btn">
                            <a href="#" class="thm-btn">All Projects <span class="icon-next1"></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auto-container">
                <div class="row">
                    <!--Start Projects Two Single-->
                    @foreach ($galeri as $item)
                        <div class="col-xl-4 col-lg-4">
                                <div class="projects-one__single wow fadeInUp" data-wow-delay="0ms">
                                    <div class="projects-one__single-img">
                                        <div class="projects-one__single-img-inner">
                                            <img src="{{ asset('assets/images/galery/' . $item['foto']) }}" alt="{{ $item['judul_galery'] }}">
                                        </div>

                                        <div class="projects-one__overlay-content">
                                            <div class="content-box">
                                                <p>Express Roof</p>
                                                <h2><a href="">{{ $item['judul_galery'] }}</a></h2>
                                            </div>

                                            <div class="projects-one__single-icon">
                                                <a href=""><span class="icon-next1"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Galeri-->

       
        <!--Start Brand One-->
        <section class="brand-one">
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="brand-one__inner">
                            <div class="brand-one__carousel owl-theme owl-carousel">
                                @foreach ($perangkats as $perangkat)
                                    <div class="item">
                                        <div class="brand-one__single">
                                            <div class="blog-one__single-img-inner">
                                                <img src="{{ asset('assets/images/perangkat_desa/' . $perangkat->foto_perangkat) }}" alt="">
                                                {{-- <img src="{{ asset('assets/images/perangkat_desa/perangkat_3.png') }}" alt=""> --}}
                                                <div class="blog-one__single-content">
                                                    <h2><a href="#" style="color: white;">{{ $perangkat->nama_lengkap }}</a></h2>
                                                    <a style="color: white; font-size: 18px;">{{ $perangkat->jabatan }}</a>
                                                    {{-- <div class="btn-box">
                                                        <a href="blog-details.html">Read More <span class="icon-next1"></span></a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Brand One-->

       
        <!--Start Blog One-->
        <section class="blog-one blog-one--two mt-5">
            <div class="container">
                <div class="blog-one--two__top">
                    <div class="section-title sec-title-animation animation-style2">
                        <div class="section-title__tagline title-animation">
                            <h4>Blog dan Artikel</h4>
                        </div>
                        <h2 class="section-title__title title-animation">Desa Pasirkecapi <br>
                            dalam berita</h2>
                    </div>

                    <div class="blog-one--two__top-btn">
                        <a href="#" class="thm-btn">Read More <span class="icon-next1"></span></a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($blog as $data_blog)
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                            <div class="blog-one__single">
                                <div class="blog-one__single-img">
                                    <div class="blog-one__single-img-inner">
                                        <img src="{{ asset('assets/images/blog/'. $data_blog->gambar1) }}" alt="#">
                                    </div>
                                    <div class="date-box">
                                        <h4>{{ $data_blog->created_at->format('d F Y') }}</h4>
                                    </div>
                                </div>

                                <div class="blog-one__single-content">
                                    <h2><a href="{{ route('kegiatan.show', $data_blog->id) }}">{{ $data_blog->judul }}</a></h2>
                                    <div class="btn-box">
                                        <a href="{{ route('kegiatan.show', $data_blog->id) }}">Read More <span class="icon-next1"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </section>
        <!--End Blog One-->

    </div>
    @endsection