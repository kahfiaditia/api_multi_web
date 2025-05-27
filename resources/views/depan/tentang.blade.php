@extends('depan.utama')
@section('contentx')

    <section class="faq-one faq-one--service">
        <div class="container">
            <div class="row">
                <!--Start Faq One-->
                <div class="col-xl-5 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="faq-one__faq">
                        <div class="section-title sec-title-animation animation-style2">
                            <div class="section-title__tagline title-animation">
                                <h4>Tentang</h4>
                            </div>
                           @if(!empty($profils->nama_desa))
                                <h2 class="section-title__title title-animation">{{ $profils->nama_desa }}</h2>
                            @endif

                        </div>

                        <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-1">

                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>Apa saja potensi yang dimiliki Desa Pasirkecapi?</h4>
                                </div>

                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>Desa Pasirkecapi memiliki potensi di bidang pertanian, peternakan, dan budaya lokal. Selain itu, desa ini juga memiliki sumber daya manusia yang aktif dalam kegiatan sosial dan keagamaan.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>Siapa kepala desa saat ini?</h4>
                                </div>

                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>{{ $profils->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>Bagaimana akses ke Desa Pasirkecapi?</h4>
                                </div>

                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>Desa Pasirkecapi dapat diakses melalui jalur darat, terutama dari arah Stasiun Maja yang merupakan bagian dari jaringan KRL Commuter Line Jabodetabek, menjadikannya lebih mudah dijangkau dari wilayah Tangerang atau Jakarta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Faq One-->

                <!--Start Faq One Counter-->
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="faq-one__counter">
                        <div class="faq-one__counter-text">
                            <p>{{ $profils->deskripsi }}
                            </p>
                        </div>
                        <div class="faq-one__counter-inner">
                            <div class="row">

                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="faq-one__counter-single">
                                        <div class="faq-one__counter-single-icon">
                                            <span class="icon-completion"></span>
                                        </div>

                                        <div class="faq-one__counter-single-content">
                                            <div class="count-box">
                                                <h2 class="count-text" data-stop="450" data-speed="1500">00</h2>
                                                <span class="plus">+</span>
                                            </div>

                                            <p>Project Completed</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="faq-one__counter-single">
                                        <div class="faq-one__counter-single-icon">
                                            <span class="icon-costumer"></span>
                                        </div>

                                        <div class="faq-one__counter-single-content">
                                            <div class="count-box">
                                                <h2 class="count-text" data-stop="300" data-speed="1500">00</h2>
                                                <span class="plus">+</span>
                                            </div>

                                            <p>Satisfied Client</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="faq-one__counter-single">
                                        <div class="faq-one__counter-single-icon">
                                            <span class="icon-team-1"></span>
                                        </div>

                                        <div class="faq-one__counter-single-content">
                                            <div class="count-box">
                                                <h2 class="count-text" data-stop="200" data-speed="1500">00</h2>
                                                <span class="plus">+</span>
                                            </div>

                                            <p>Team Member</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="faq-one__counter-single">
                                        <div class="faq-one__counter-single-icon">
                                            <span class="icon-trophy"></span>
                                        </div>

                                        <div class="faq-one__counter-single-content">
                                            <div class="count-box">
                                                <h2 class="count-text" data-stop="100" data-speed="1500">00</h2>
                                                <span class="plus">+</span>
                                            </div>

                                            <p>Award Winning</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Faq One Counter-->
            </div>
        </div>
    </section>

    <section class="project-details">
        <div class="container">
            <div class="project-details__inner">
                <div class="project-details__text1">
                    <h2>Visi Desa Pasirkecapi</h2>
                    @if(!empty( $visi->visi))
                        <p>{!! $visi->visi !!}</p>
                    @endif
                    </p>
                </div>
                <div class="project-details__text1">
                    <h2>Misi Desa Pasirkecapi</h2>
                     @if(!empty( $visi->misi))
                        <p>
                            {!! $visi->misi !!}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>

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
                                                    @if(!empty($profils->kecamatan))
                                                     <h3>{{ $profils->kecamatan }}</h3>
                                                    @endif
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

@endsection