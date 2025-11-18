@extends('legal.struktur.awal')
@section('hukum')
    <style>
        /* Legal Protection Specific Styles */
        .protection-hero {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            color: white;
            padding: 80px 0 60px;
        }

        .service-feature {
            background: white;
            border-radius: 12px;
            padding: 30px 25px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%;
            border-top: 4px solid #1a237e;
        }

        .service-feature:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: #e8eaf6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .feature-icon i {
            font-size: 28px;
            color: #1a237e;
        }

        .process-step {
            text-align: center;
            padding: 25px 15px;
            position: relative;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: #1a237e;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            margin: 0 auto 15px;
        }

        .case-study-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #1a237e;
            height: 100%;
        }

        .protection-type-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .protection-type-card:hover {
            transform: translateY(-5px);
            border-color: #1a237e;
        }

        .protection-icon {
            font-size: 32px;
            color: #1a237e;
            margin-bottom: 12px;
        }

        .consultation-form {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .success-rate {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            color: white;
            border-radius: 12px;
            padding: 30px 25px;
            text-align: center;
        }

        .rate-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .benefit-icon {
            width: 45px;
            height: 45px;
            background: #e8eaf6;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a237e;
            font-size: 18px;
            flex-shrink: 0;
        }

        .emergency-badge {
            background: #ff6b6b;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 8px;
        }

        .protection-level {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            height: 100%;
        }

        .risk-indicator {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .risk-level {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .risk-low {
            background: #4CAF50;
            color: white;
        }

        .risk-medium {
            background: #FF9800;
            color: white;
        }

        .risk-high {
            background: #f44336;
            color: white;
        }

        /* Adjusted font sizes */
        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }
        
        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .process-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .protection-category-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .benefit-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .risk-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
    </style>

   <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">{{ $produk->judul_bagian }}</h2>
                    <p class="lead mb-4">{{ $produk->deskripsi }}</p>

                    <div class="mb-4">
                        <h5 class="fw-bold"><i class="{{ $produk->icon1 }}"></i> {{ $produk->judul_poin1 }}</h5>
                        <p class="text-muted mb-3">{{ $produk->deskripsi_poin1 }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold"><i class="{{ $produk->icon2 }}"></i> {{ $produk->judul_poin2 }}</h5>
                        <p class="text-muted mb-3">{{ $produk->deskripsi_poin2 }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold"><i class="{{ $produk->icon3 }}"></i> {{ $produk->judul_poin3 }}</h5>
                        <p class="text-muted mb-3">{{ $produk->deskripsi_poin3 }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-4">
                        <img src="{{ asset($produk->path_gambar) }}" alt="Importance of Corporate Legal"
                            class="img-fluid rounded-3">
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
                    <h2 class="section-title">{{ $layanan_legal[0]->title }}</h2>
                    <p class="section-subtitle">{{ $layanan_legal[0]->title_deskripsi }}</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($layanan_legal as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-feature">
                            <div class="feature-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <h4 class="card-title">{{ $item->judul_bagian }}</h4>
                            <p class="text-muted">{{ $item->deskripsi }}</p>
                            <ul class="list-unstyled text-start">
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i> {{ $item->poin1 }}</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i> {{ $item->poin2 }}</li>
                                <li class="mb-0"><i class="bi bi-check text-success me-2"></i> {{ $item->poin3 }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Risk Indicators Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Indikator Risiko Hukum yang Sering Terabaikan</h2>
                    <p class="section-subtitle">Waspadai tanda-tanda ini dalam operasional bisnis Anda</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="risk-indicator">
                        <div>
                            <h6 class="risk-title">Kontrak Tidak Terstandardisasi</h6>
                            <p class="text-muted mb-0 small">Setiap departemen menggunakan format kontrak berbeda</p>
                        </div>
                        <span class="risk-level risk-high">Tinggi</span>
                    </div>

                    <div class="risk-indicator">
                        <div>
                            <h6 class="risk-title">Tidak Ada Database Kontrak</h6>
                            <p class="text-muted mb-0 small">Kontrak tersebar di berbagai komputer staff</p>
                        </div>
                        <span class="risk-level risk-high">Tinggi</span>
                    </div>

                    <div class="risk-indicator">
                        <div>
                            <h6 class="risk-title">Karyawan Tanpa Perjanjian Kerja</h6>
                            <p class="text-muted mb-0 small">Beberapa staff bekerja tanpa dokumen formal</p>
                        </div>
                        <span class="risk-level risk-high">Tinggi</span>
                    </div>

                    <div class="risk-indicator">
                        <div>
                            <h6 class="risk-title">Tidak Ada Compliance Officer</h6>
                            <p class="text-muted mb-0 small">Tidak ada yang memantau perubahan regulasi</p>
                        </div>
                        <span class="risk-level risk-medium">Menengah</span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="risk-indicator">
                        <div>
                            <h6 class="risk-title">Merek Dagang Tidak Terdaftar</h6>
                            <p class="text-muted mb-0 small">Merek bisnis digunakan tanpa pendaftaran resmi</p>
                        </div>
                        <span class="risk-level risk-high">Tinggi</span>
                    </div>

                    <div class="risk-indicator">
                        <div>
                            <h6 class="risk-title">Dokumen Perusahaan Tidak Terorganisir</h6>
                            <p class="text-muted mb-0 small">Minutes meeting dan keputusan direksi tersebar</p>
                        </div>
                        <span class="risk-level risk-medium">Menengah</span>
                    </div>

                    <div class="risk-indicator">
                        <div>
                            <h6 class="risk-title">Tidak Ada Legal Budget</h6>
                            <p class="text-muted mb-0 small">Tidak ada alokasi anggaran untuk kebutuhan hukum</p>
                        </div>
                        <span class="risk-level risk-medium">Menengah</span>
                    </div>

                    <div class="risk-indicator">
                        <div>
                            <h6 class="risk-title">Kontrak Lama Tidak Di-review</h6>
                            <p class="text-muted mb-0 small">Kontrak berjalan lebih dari 3 tahun tanpa review</p>
                        </div>
                        <span class="risk-level risk-medium">Menengah</span>
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
                    <h2 class="section-title">Proses Implementasi Perlindungan Hukum</h2>
                    <p class="section-subtitle">Langkah-langkah sistematis untuk membangun sistem perlindungan hukum yang efektif</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h5 class="process-title">Risk Assessment</h5>
                        <p class="text-muted small">Identifikasi dan pemetaan risiko hukum spesifik perusahaan Anda.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h5 class="process-title">Customized Solution</h5>
                        <p class="text-muted small">Perancangan sistem perlindungan sesuai profil risiko bisnis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h5 class="process-title">Implementation</h5>
                        <p class="text-muted small">Implementasi sistem dan integrasi dengan operasional bisnis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h5 class="process-title">Monitoring & Evaluation</h5>
                        <p class="text-muted small">Pemantauan berkelanjutan dan evaluasi efektivitas sistem.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection