<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Firma Hukum Anda" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Corporate Legal Advice - Firma Hukum | Layanan Hukum Perusahaan</title>
    
    <!-- Custom CSS -->
    <link href="{{ asset('assets2/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/colors.css') }}" rel="stylesheet">
    
    <style>
        /* Corporate Legal Specific Styles */
       
        
        .service-feature {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
            border-top: 4px solid #1a237e;
        }
        
        .service-feature:hover {
            transform: translateY(-10px);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: #e8eaf6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }
        
        .feature-icon i {
            font-size: 35px;
            color: #1a237e;
        }
        
        .process-step {
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background: #1a237e;
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
            border-left: 4px solid #1a237e;
            height: 100%;
        }
        
        .industry-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        
        .industry-card:hover {
            transform: translateY(-5px);
            border-color: #1a237e;
        }
        
        .industry-icon {
            font-size: 40px;
            color: #1a237e;
            margin-bottom: 15px;
        }
        
        .pricing-card {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .pricing-card.featured {
            border-color: #1a237e;
            transform: scale(1.05);
        }
        
        .pricing-card.featured::before {
            content: 'REKOMENDASI';
            position: absolute;
            top: 20px;
            right: -30px;
            background: #1a237e;
            color: white;
            padding: 5px 30px;
            font-size: 12px;
            font-weight: 600;
            transform: rotate(45deg);
        }
        
        .pricing-price {
            font-size: 3rem;
            font-weight: 700;
            color: #1a237e;
            margin: 20px 0;
        }
        
        .benefit-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .benefit-list li {
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .benefit-list li:last-child {
            border-bottom: none;
        }
        
        .benefit-list li i {
            color: #4caf50;
            margin-right: 10px;
        }
        
        .consultation-form {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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

                            <li class="active"><a href="{{ route('depan') }}">Beranda</a></li>

                            <li><a href="#">Layanan<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="#">Corporate Legal Advice</a></li>
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
                        <h2 class="display-5 fw-bold mb-4">Mengapa Corporate Legal Advice Penting?</h2>
                        <p class="lead mb-4">Dalam lingkungan bisnis yang kompleks dan dinamis, memiliki penasihat hukum yang andal bukan lagi pilihan, melainkan kebutuhan strategis.</p>
                        
                        <div class="mb-4">
                            <h5><i class="bi bi-shield-check text-primary me-2"></i> Perlindungan Hukum</h5>
                            <p class="text-muted">Melindungi perusahaan dari risiko hukum dan sengketa yang dapat mengganggu operasional bisnis.</p>
                        </div>
                        
                        <div class="mb-4">
                            <h5><i class="bi bi-graph-up text-primary me-2"></i> Kepastian Bisnis</h5>
                            <p class="text-muted">Memberikan kepastian hukum dalam setiap keputusan dan transaksi bisnis perusahaan.</p>
                        </div>
                        
                        <div class="mb-4">
                            <h5><i class="bi bi-award text-primary me-2"></i> Kepatuhan Regulasi</h5>
                            <p class="text-muted">Memastikan perusahaan selalu mematuhi peraturan perundang-undangan yang berlaku.</p>
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
                        <h2 class="display-5 fw-bold mb-3">Layanan Corporate Legal Kami</h2>
                        <p class="lead text-muted">Solusi hukum komprehensif untuk semua kebutuhan bisnis perusahaan Anda</p>
                    </div>
                </div>
                
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <h4>Struktur Perusahaan</h4>
                            <p class="text-muted">Konsultasi mengenai struktur perusahaan yang optimal, pendirian PT, PMA, dan entitas bisnis lainnya.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Pendirian Perusahaan</li>
                                <li><i class="bi bi-check text-success me-2"></i> Restrukturisasi</li>
                                <li><i class="bi bi-check text-success me-2"></i> Merger & Akuisisi</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h4>Kepatuhan Regulasi</h4>
                            <p class="text-muted">Memastikan perusahaan mematuhi semua peraturan yang berlaku dan menghindari sanksi hukum.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Compliance Audit</li>
                                <li><i class="bi bi-check text-success me-2"></i> Regulatory Update</li>
                                <li><i class="bi bi-check text-success me-2"></i> Licensing & Permits</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-handshake"></i>
                            </div>
                            <h4>Kontrak Bisnis</h4>
                            <p class="text-muted">Penyusunan, review, dan negosiasi berbagai jenis kontrak bisnis untuk melindungi kepentingan perusahaan.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Kontrak Kerjasama</li>
                                <li><i class="bi bi-check text-success me-2"></i> Perjanjian Distribusi</li>
                                <li><i class="bi bi-check text-success me-2"></i> Kontrak Ketenagakerjaan</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-bank"></i>
                            </div>
                            <h4>Hukum Perbankan & Keuangan</h4>
                            <p class="text-muted">Konsultasi mengenai transaksi keuangan, pembiayaan, dan kepatuhan sektor perbankan.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Loan Agreement</li>
                                <li><i class="bi bi-check text-success me-2"></i> Security Documents</li>
                                <li><i class="bi bi-check text-success me-2"></i> Financial Compliance</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-cpu"></i>
                            </div>
                            <h4>Kekayaan Intelektual</h4>
                            <p class="text-muted">Perlindungan hak kekayaan intelektual perusahaan termasuk merek, paten, dan hak cipta.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> Pendaftaran Merek</li>
                                <li><i class="bi bi-check text-success me-2"></i> Perlindungan Paten</li>
                                <li><i class="bi bi-check text-success me-2"></i> Lisensi & Royalti</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="bi bi-globe"></i>
                            </div>
                            <h4>Hukum Internasional</h4>
                            <p class="text-muted">Konsultasi untuk transaksi bisnis internasional dan kepatuhan hukum lintas negara.</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-check text-success me-2"></i> International Contract</li>
                                <li><i class="bi bi-check text-success me-2"></i> Cross-border Transaction</li>
                                <li><i class="bi bi-check text-success me-2"></i> International Compliance</li>
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
                        <h2 class="display-5 fw-bold mb-3">Proses Kerja Kami</h2>
                        <p class="lead text-muted">Metode terstruktur untuk memberikan solusi hukum yang efektif dan efisien</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step">
                            <div class="step-number">1</div>
                            <h5>Konsultasi Awal</h5>
                            <p class="text-muted">Memahami kebutuhan dan masalah hukum perusahaan Anda melalui konsultasi mendalam.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step">
                            <div class="step-number">2</div>
                            <h5>Analisis Hukum</h5>
                            <p class="text-muted">Melakukan penelitian dan analisis mendalam terhadap aspek hukum yang relevan.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step">
                            <div class="step-number">3</div>
                            <h5>Penyusunan Strategi</h5>
                            <p class="text-muted">Mengembangkan strategi hukum yang tepat untuk mencapai tujuan bisnis Anda.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step">
                            <div class="step-number">4</div>
                            <h5>Implementasi & Monitoring</h5>
                            <p class="text-muted">Melaksanakan solusi dan memantau perkembangan untuk memastikan keberhasilan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Industry Specialization -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2 class="display-5 fw-bold mb-3">Spesialisasi Industri</h2>
                        <p class="lead text-muted">Pengalaman luas dalam berbagai sektor industri</p>
                    </div>
                </div>
                
                <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="industry-card">
                            <div class="industry-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <h6>Properti & Real Estate</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="industry-card">
                            <div class="industry-icon">
                                <i class="bi bi-cart"></i>
                            </div>
                            <h6>Retail & E-commerce</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="industry-card">
                            <div class="industry-icon">
                                <i class="bi bi-cpu"></i>
                            </div>
                            <h6>Teknologi & Startup</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="industry-card">
                            <div class="industry-icon">
                                <i class="bi bi-droplet"></i>
                            </div>
                            <h6>Manufacturing</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="industry-card">
                            <div class="industry-icon">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <h6>Kesehatan & Farmasi</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="industry-card">
                            <div class="industry-icon">
                                <i class="bi bi-truck"></i>
                            </div>
                            <h6>Logistik & Transportasi</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="industry-card">
                            <div class="industry-icon">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                            <h6>Keuangan & Perbankan</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="industry-card">
                            <div class="industry-icon">
                                <i class="bi bi-lightning"></i>
                            </div>
                            <h6>Energi & Pertambangan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- Consultation Modal -->
        <div class="modal fade" id="consultationModal" tabindex="-1" aria-labelledby="consultationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="consultationModalLabel">Konsultasi Corporate Legal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="consultation-form">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jabatan *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Perusahaan *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Industri *</label>
                                        <select class="form-control" required>
                                            <option value="">Pilih Industri</option>
                                            <option>Teknologi</option>
                                            <option>Manufaktur</option>
                                            <option>Retail</option>
                                            <option>Jasa</option>
                                            <option>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email *</label>
                                        <input type="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Telepon *</label>
                                        <input type="tel" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Jenis Layanan yang Dibutuhkan *</label>
                                        <select class="form-control" required>
                                            <option value="">Pilih Layanan</option>
                                            <option>Konsultasi Struktur Perusahaan</option>
                                            <option>Review Kepatuhan Regulasi</option>
                                            <option>Penyusunan Kontrak Bisnis</option>
                                            <option>Merger & Akuisisi</option>
                                            <option>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Deskripsi Masalah/Kebutuhan *</label>
                                        <textarea class="form-control" rows="4" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg w-100">Kirim Permintaan Konsultasi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

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