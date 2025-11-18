<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Firma Hukum Anda" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Litigation - Firma Hukum | Layanan Hukum Perdata dan Pidana</title>
    
    <!-- Custom CSS -->
    <link href="{{ asset('assets2/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/colors.css') }}" rel="stylesheet">
    
    <style>
        /* Litigation Specific Styles */
       
        
        .service-feature {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
            border-top: 4px solid #b71c1c;
        }
        
        .service-feature:hover {
            transform: translateY(-10px);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: #ffebee;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }
        
        .feature-icon i {
            font-size: 35px;
            color: #b71c1c;
        }
        
        .process-step {
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background: #b71c1c;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 20px;
        }
        
        .case-study-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-left: 4px solid #b71c1c;
            height: 100%;
        }
        
        .court-type-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        
        .court-type-card:hover {
            transform: translateY(-5px);
            border-color: #b71c1c;
        }
        
        .court-icon {
            font-size: 40px;
            color: #b71c1c;
            margin-bottom: 15px;
        }
        
        .consultation-form {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .success-rate {
            background: linear-gradient(135deg, #b71c1c 0%, #c62828 100%);
            color: white;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
        }

        .rate-number {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .urgent-badge {
            background: #ff6b6b;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="red-skin">
    <!-- Preloader -->
    <div id="preloader"><div class="preloader"><span></span><span></span></div></div>

    <!-- Main Wrapper -->
    <div id="main-wrapper">

        <!-- Navigation -->
        <div class="header header-light head-shadow">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{ url('/') }}">
                            <img src="{{ asset('assets2/img/logo/legalitas.png') }}" class="logo" alt="Logo Firma Hukum" />
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu">
                            <li><a href="{{ route('depan') }}">Beranda</a></li>
                            <li class="active"><a href="#">Layanan<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ url('/corporate-legal-advice') }}">Corporate Legal Advice</a></li>
                                    <li class="active"><a href="{{ url('/litigation') }}">Litigation</a></li>
                                    <li><a href="{{ url('/contract-preparation') }}">Contract and Preparation</a></li>
                                    <li><a href="{{ url('/legal-audit') }}">Legal Audit</a></li>
                                    <li><a href="{{ url('/legal-opinion') }}">Legal Opinion</a></li>
                                    <li><a href="{{ url('/legal-protection') }}">Legal Protection</a></li>
                                    <li><a href="{{ url('/probono') }}">Probono (Legal Aid)</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                            <li><a href="#">Tim Pengacara</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                        <ul class="nav-menu nav-menu-social align-to-right">
                            <li class="join-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#consultationModal">
                                    <i class="bi bi-box-arrow-in-right"></i>Konsultasi Gratis
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

       
        <!-- Overview Section -->
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold mb-4">Mengapa Memilih Layanan Litigation Kami?</h2>
                        <p class="lead mb-4">Dalam menghadapi proses hukum di pengadilan, pengalaman dan strategi yang tepat menjadi kunci keberhasilan.</p>
                        
                        <div class="mb-4">
                            <h5><i class="bi bi-shield-check text-danger me-2"></i> Pengacara Berpengalaman</h5>
                            <p class="text-muted">Tim litigation kami memiliki pengalaman lebih dari 10 tahun menangani berbagai jenis perkara di semua tingkatan pengadilan.</p>
                        </div>
                        
                        <div class="mb-4">
                            <h5><i class="bi bi-graph-up text-danger me-2"></i> Strategi Litigasi Terbukti</h5>
                            <p class="text-muted">Mengembangkan strategi litigasi yang efektif berdasarkan analisis mendalam terhadap kasus dan yurisprudensi.</p>
                        </div>
                        
                        <div class="mb-4">
                            <h5><i class="bi bi-award text-danger me-2"></i> Tingkat Keberhasilan Tinggi</h5>
                            <p class="text-muted">Rekam jejak keberhasilan yang mengesankan dalam memenangkan berbagai jenis sengketa hukum.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-4">
                            <img src="{{ asset('assets2/img/hero-img-2.png') }}" alt="Importance of Corporate Legal" class="img-fluid rounded-3">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Features -->
        <section id="layanan-kami" class="py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2 class="display-5 fw-bold mb-3">Jenis Layanan Litigation Kami</h2>
                        <p class="lead text-muted">Komprehensif coverage untuk semua jenis sengketa hukum di pengadilan</p>
                    </div>
                </div>
                
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-house-door"></i>
                            </div>
                            <h4>Perdata</h4>
                            <p class="text-muted">Penanganan sengketa perdata termasuk wanprestasi, perbuatan melawan hukum, dan sengketa kontrak.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Sengketa Kontrak</li>
                                <li><i class="bi bi-check text-success me-2"></i> Perbuatan Melawan Hukum</li>
                                <li><i class="bi bi-check text-success me-2"></i> Sengketa Kepemilikan</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-shield-exclamation"></i>
                            </div>
                            <h4>Pidana</h4>
                            <p class="text-muted">Pembelaan hukum dalam perkara pidana umum dan korporasi sebagai kuasa hukum terdakwa.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Pidana Umum</li>
                                <li><i class="bi bi-check text-success me-2"></i> Pidana Korporasi</li>
                                <li><i class="bi bi-check text-success me-2"></i> Pidana Khusus</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <h4>Tata Usaha Negara</h4>
                            <p class="text-muted">Penanganan sengketa antara masyarakat dengan instansi pemerintah di PTUN.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Sengketa Izin</li>
                                <li><i class="bi bi-check text-success me-2"></i> Sengketa Pajak</li>
                                <li><i class="bi bi-check text-success me-2"></i> Sengketa Lelang</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <h4>Bisnis & Korporasi</h4>
                            <p class="text-muted">Sengketa bisnis termasuk kepailitan, hak intelektual, dan persaingan usaha tidak sehat.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Kepailitan</li>
                                <li><i class="bi bi-check text-success me-2"></i> Hak Kekayaan Intelektual</li>
                                <li><i class="bi bi-check text-success me-2"></i> Persaingan Usaha</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <h4>Ketenagakerjaan</h4>
                            <p class="text-muted">Penyelesaian sengketa hubungan industrial antara pengusaha dan pekerja.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> PHK & Pesangon</li>
                                <li><i class="bi bi-check text-success me-2"></i> Hak Normatif</li>
                                <li><i class="bi bi-check text-success me-2"></i> Perselisihan Hubungan Industrial</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-house-heart"></i>
                            </div>
                            <h4>Keluarga & Waris</h4>
                            <p class="text-muted">Penanganan sengketa keluarga termasuk perceraian, harta gono-gini, dan warisan.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Perceraian</li>
                                <li><i class="bi bi-check text-success me-2"></i> Harta Bersama</li>
                                <li><i class="bi bi-check text-success me-2"></i> Sengketa Warisan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2 class="display-5 fw-bold mb-3">Proses Penanganan Kasus Litigation</h2>
                        <p class="lead text-muted">Metode terstruktur untuk memastikan perlindungan hukum maksimal</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step">
                            <div class="step-number">1</div>
                            <h5>Konsultasi Awal</h5>
                            <p class="text-muted">Analisis awal kasus dan identifikasi strategi hukum yang paling efektif.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step">
                            <div class="step-number">2</div>
                            <h5>Pengumpulan Bukti</h5>
                            <p class="text-muted">Mengumpulkan dan mengorganisir semua bukti dan dokumen pendukung.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step">
                            <div class="step-number">3</div>
                            <h5>Penyusunan Gugatan</h5>
                            <p class="text-muted">Menyusun gugatan/pledoi yang kuat berdasarkan fakta dan hukum.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step">
                            <div class="step-number">4</div>
                            <h5>Proses Pengadilan</h5>
                            <p class="text-muted">Pendampingan di semua tingkat pengadilan hingga putusan berkekuatan hukum tetap.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Court Types -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2 class="display-5 fw-bold mb-3">Tingkatan Pengadilan</h2>
                        <p class="lead text-muted">Pengalaman menangani kasus di semua tingkatan peradilan</p>
                    </div>
                </div>
                
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="court-type-card">
                            <div class="court-icon">
                                <i class="bi bi-house"></i>
                            </div>
                            <h5>Pengadilan Negeri</h5>
                            <p class="text-muted">Penanganan perkara di tingkat pertama untuk semua jenis sengketa.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="court-type-card">
                            <div class="court-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <h5>Pengadilan Tinggi</h5>
                            <p class="text-muted">Proses banding untuk perkara yang memerlukan peninjauan ulang.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="court-type-card">
                            <div class="court-icon">
                                <i class="bi bi-shield"></i>
                            </div>
                            <h5>Mahkamah Agung</h5>
                            <p class="text-muted">Penanganan kasasi dan peninjauan kembali putusan pengadilan bawah.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="court-type-card">
                            <div class="court-icon">
                                <i class="bi bi-house"></i>
                            </div>
                            <h5>PTUN</h5>
                            <p class="text-muted">Pengadilan Tata Usaha Negara untuk sengketa dengan instansi pemerintah.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="court-type-card">
                            <div class="court-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <h5>Pengadilan Hubungan Industrial</h5>
                            <p class="text-muted">Khusus menangani sengketa ketenagakerjaan dan hubungan industrial.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="court-type-card">
                            <div class="court-icon">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h5>Pengadilan Niaga</h5>
                            <p class="text-muted">Penanganan perkara kepailitan dan sengketa bisnis lainnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

        

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets2/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets2/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets2/js/slick.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/custom.js') }}"></script>
</body>
</html>