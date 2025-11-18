@extends('legal.struktur.awal')
@section('hukum')
    <style>
        /* Homepage Specific Styles */
        .hero-slider {
            position: relative;
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
        }

        .slide-item {
            padding: 100px 0 60px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .slide-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.1;
        }

        .service-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            border-top: 4px solid #1a237e;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: #e8eaf6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .service-icon i {
            font-size: 28px;
            color: #1a237e;
        }

        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 30px 25px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #1a237e;
        }

        .team-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
        }

        .team-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 4px solid #e8eaf6;
        }

        .testimonial-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #1a237e;
            height: 100%;
        }

        .client-logo {
            height: 50px;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .client-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
        }

        .slider-controls {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 10;
        }

        .slider-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slider-dot.active {
            background: white;
            transform: scale(1.2);
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .slider-arrow:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .slider-arrow.prev {
            left: 20px;
        }

        .slider-arrow.next {
            right: 20px;
        }

        .cta-section {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            color: white;
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }

        .cta-pattern {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="white" opacity="0.05"><polygon points="0,0 100,0 50,100"/></svg>');
            background-size: cover;
        }

        /* Adjusted font sizes */
        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .team-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .team-position {
            font-size: 0.9rem;
            color: #1a237e;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
    </style>

    @include('legal.pecahan.banner')

    <!-- Stats Section -->
    {{-- <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-number text-primary">15+</div>
                        <h5>Tahun Pengalaman</h5>
                        <p class="text-muted mb-0 small">Melayani klien korporasi dan individu</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-number text-primary">2,500+</div>
                        <h5>Kasus Berhasil</h5>
                        <p class="text-muted mb-0 small">Berbagai jenis kasus hukum ditangani</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-number text-primary">98%</div>
                        <h5>Kepuasan Klien</h5>
                        <p class="text-muted mb-0 small">Tingkat kepuasan klien yang tinggi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-number text-primary">50+</div>
                        <h5>Pengacara Ahli</h5>
                        <p class="text-muted mb-0 small">Tim profesional berpengalaman</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Services Section -->
    <section id="layanan" class="py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
    @if ($layanan_legal->isNotEmpty())
        <div class="col-lg-8 text-center">
            <h2 class="section-title">{{ $layanan_legal[0]->title }}</h2>
            <p class="section-subtitle">{{ $layanan_legal[0]->title_deskripsi }}</p>
        </div>
    @else
        <div class="col-lg-8 text-center">
            <h2 class="section-title">Layanan Legal</h2>
            <p class="section-subtitle">Deskripsi layanan belum tersedia.</p>
        </div>
    @endif
</div>

            <div class="row g-4">
                @foreach ($layanan_legal as $item)
                     <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $item->icon }}"></i>
                        </div>
                        <h4 class="card-title">{{ $item->judul_bagian }}</h4>
                        <p class="text-muted">{{ $item->deskripsi }}</p>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i> {{ $item->poin1 }}</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i> {{ $item->poin2 }}</li>
                            <li class="mb-0"><i class="bi bi-check text-success me-2"></i> {{ $item->poin3 }}</li>
                        </ul>
                        <a href="{{ $item->keterangan }}" class="btn btn-outline-primary btn-sm">Selengkapnya</a>
                    </div>
                </div>
                @endforeach
               

               
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Tentang Firma Hukum Kami</h2>
                    <p class="lead mb-4">{!! $about->area ?? 'Ini area' !!}.</p>

                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Pengacara Berpengalaman</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Solusi Hukum Terpadu</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Layanan 24/7</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                <span>Kerahasiaan Terjamin</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <a href="{{ route('tentang') }}" class="btn btn-primary">Kenali Tim Kami</a>
                        <a href="{{ route('tentang') }}" class="btn btn-outline-primary">Visi & Misi</a>
                    </div>
                </div>
               <div class="col-lg-6">
                <div class="p-4">
    @if (!empty($about) && !empty($about->path_sambutan))
        <img src="{{ asset($about->path_sambutan) }}" alt="Importance of Corporate Legal" class="img-fluid rounded-3">
    @else
        <img src="{{ asset('assets/images/default-image.jpg') }}" alt="Default Image" class="img-fluid rounded-3">
    @endif
</div>
            </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="tim" class="py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Tim Profesional Kami</h2>
                    <p class="section-subtitle">Didukung oleh tim pengacara ahli yang berpengalaman di berbagai bidang
                        hukum</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <img src="{{ asset('assets2/img/hero-img-3.png') }}" alt="Senior Partner" class="team-img">
                        <h5 class="team-name">Dr. Ahmad Wijaya, S.H., M.H.</h5>
                        <p class="team-position">Senior Partner</p>
                        <p class="small text-muted">Spesialis hukum korporasi dan M&A dengan 25 tahun pengalaman</p>
                        <div class="mt-3">
                            <a href="mailto:ahmad@firmahukum.com" class="text-decoration-none small">
                                <i class="bi bi-envelope me-1"></i>ahmad@firmahukum.com
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <img src="{{ asset('assets2/img/hero-img-3.png') }}" alt="Managing Partner" class="team-img">
                        <h5 class="team-name">Budi Santoso, S.H., LL.M.</h5>
                        <p class="team-position">Managing Partner</p>
                        <p class="small text-muted">Ahli hukum kontrak dan transaksi bisnis internasional</p>
                        <div class="mt-3">
                            <a href="mailto:budi@firmahukum.com" class="text-decoration-none small">
                                <i class="bi bi-envelope me-1"></i>budi@firmahukum.com
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <img src="{{ asset('assets2/img/hero-img-3.png') }}" alt="Partner" class="team-img">
                        <h5 class="team-name">Maria Sari, S.H.</h5>
                        <p class="team-position">Partner</p>
                        <p class="small text-muted">Spesialis hukum ketenagakerjaan dan hubungan industrial</p>
                        <div class="mt-3">
                            <a href="mailto:maria@firmahukum.com" class="text-decoration-none small">
                                <i class="bi bi-envelope me-1"></i>maria@firmahukum.com
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <img src="{{ asset('assets2/img/hero-img-3.png') }}" alt="Senior Associate" class="team-img">
                        <h5 class="team-name">Rizki Pratama, S.H.</h5>
                        <p class="team-position">Senior Associate</p>
                        <p class="small text-muted">Ahli hukum kekayaan intelektual dan teknologi</p>
                        <div class="mt-3">
                            <a href="mailto:rizki@firmahukum.com" class="text-decoration-none small">
                                <i class="bi bi-envelope me-1"></i>rizki@firmahukum.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('kontak') }}" class="btn btn-primary">Konsultasi dengan Tim Kami</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Apa Kata Klien Kami</h2>
                <p class="section-subtitle">
                    Testimoni dari klien yang telah mempercayakan masalah hukum mereka kepada kami
                </p>
            </div>
        </div>

        <!-- SLIDER START -->
        <div id="testimonialSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="testimonial-card mx-auto" style="max-width: 700px;">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('assets2/img/yoga.png') }}" alt="Client 1"
                                class="rounded-circle me-3" width="60" height="60">
                            <div>
                                <h5 class="mb-1">Bapak Hendra</h5>
                                <p class="text-muted mb-0 small">Direktur PT. Maju Jaya</p>
                            </div>
                        </div>
                        <p class="text-muted small">
                            "Firma hukum ini membantu perusahaan kami dalam proses akuisisi dengan sangat profesional.
                            Hasilnya beyond expectation!"
                        </p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="testimonial-card mx-auto" style="max-width: 700px;">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('assets2/img/yoga.png') }}" alt="Client 2"
                                class="rounded-circle me-3" width="60" height="60">
                            <div>
                                <h5 class="mb-1">Ibu Sari</h5>
                                <p class="text-muted mb-0 small">Owner Startup Teknologi</p>
                            </div>
                        </div>
                        <p class="text-muted small">
                            "Layanan legal audit mereka sangat membantu kami mengidentifikasi risiko sejak dini. Sangat
                            recommended untuk startup!"
                        </p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="testimonial-card mx-auto" style="max-width: 700px;">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('assets2/img/yoga.png') }}" alt="Client 3"
                                class="rounded-circle me-3" width="60" height="60">
                            <div>
                                <h5 class="mb-1">Ibu Leni Widjaja</h5>
                                <p class="text-muted mb-0 small">Wirausaha</p>
                            </div>
                        </div>
                        <p class="text-muted small">
                            "Tim hukum mereka sangat responsif dan ramah. Semua urusan kontrak bisnis saya jadi lebih
                            aman dan jelas."
                        </p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="carousel-item">
                    <div class="testimonial-card mx-auto" style="max-width: 700px;">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('assets2/img/yoga.png') }}" alt="Client 4"
                                class="rounded-circle me-3" width="60" height="60">
                            <div>
                                <h5 class="mb-1">Bapak Joko</h5>
                                <p class="text-muted mb-0 small">Karyawan Swasta</p>
                            </div>
                        </div>
                        <p class="text-muted small">
                            "Program pro bono mereka sangat membantu keluarga saya dalam menyelesaikan masalah warisan.
                            Terima kasih atas bantuannya!"
                        </p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Selanjutnya</span>
            </button>

            <!-- Indicators -->
            <div class="carousel-indicators mt-4">
                <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>
        </div>
        <!-- SLIDER END -->
    </div>
</section>


    {{-- <!-- Clients Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Klien yang Mempercayai Kami</h2>
                    <p class="section-subtitle">Kami bangga telah bekerja sama dengan berbagai perusahaan ternama</p>
                </div>
            </div>

            <div class="row align-items-center justify-content-center g-4">
                <div class="col-lg-2 col-md-3 col-4 text-center">
                    <img src="/assets/img/client-logo1.png" alt="Client 1" class="client-logo img-fluid">
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center">
                    <img src="/assets/img/client-logo2.png" alt="Client 2" class="client-logo img-fluid">
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center">
                    <img src="/assets/img/client-logo3.png" alt="Client 3" class="client-logo img-fluid">
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center">
                    <img src="/assets/img/client-logo4.png" alt="Client 4" class="client-logo img-fluid">
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center">
                    <img src="/assets/img/client-logo5.png" alt="Client 5" class="client-logo img-fluid">
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center">
                    <img src="/assets/img/client-logo6.png" alt="Client 6" class="client-logo img-fluid">
                </div>
            </div>
        </div>
    </section> --}}



    @include('legal.pecahan.mengapa')

    <script>
        // Slider functionality
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide-item');
            const dots = document.querySelectorAll('.slider-dot');
            const prevBtn = document.querySelector('.slider-arrow.prev');
            const nextBtn = document.querySelector('.slider-arrow.next');
            let currentSlide = 0;

            function showSlide(n) {
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));

                currentSlide = (n + slides.length) % slides.length;

                slides[currentSlide].classList.add('active');
                dots[currentSlide].classList.add('active');
            }

            function nextSlide() {
                showSlide(currentSlide + 1);
            }

            function prevSlide() {
                showSlide(currentSlide - 1);
            }

            // Event listeners
            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => showSlide(index));
            });

            // Auto slide
            setInterval(nextSlide, 5000);

            // Smooth scroll for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
@endsection
