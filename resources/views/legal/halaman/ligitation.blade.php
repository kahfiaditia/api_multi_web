@extends('legal.struktur.awal')
@section('hukum')
    <style>
        /* Litigation Specific Styles */
        .litigation-hero {
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

        .court-type-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .court-type-card:hover {
            transform: translateY(-5px);
            border-color: #1a237e;
        }

        .court-icon {
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

        .urgent-badge {
            background: #ff6b6b;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 12px;
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
        
        .court-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .benefit-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
    </style>

    <!-- Overview Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">{{ $produk->judul_bagian }}</h2>
                    <p class="lead mb-4">{{ $produk->deskripsi }}</p>

                    <div class="mb-4">
                        <h5 class="benefit-title"><i class="bi bi-shield-check text-primary me-2"></i> {{ $produk->judul_poin1 }}</h5>
                        <p class="text-muted mb-3">{{ $produk->deskripsi_poin1 }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="benefit-title"><i class="bi bi-graph-up text-primary me-2"></i> {{ $produk->judul_poin2 }}</h5>
                        <p class="text-muted mb-3">{{ $produk->deskripsi_poin2 }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="benefit-title"><i class="bi bi-award text-primary me-2"></i> {{ $produk->judul_poin3 }}</h5>
                        <p class="text-muted mb-3">{{ $produk->deskripsi_poin3 }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="p-4">
                    <img src="{{ asset($produk->path_gambar) }}" alt="Importance of Corporate Legal" class="img-fluid rounded-3">
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

    <!-- Process Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Proses Penanganan Kasus Litigation</h2>
                    <p class="section-subtitle">Metode terstruktur untuk memastikan perlindungan hukum maksimal</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h5 class="process-title">Konsultasi Awal</h5>
                        <p class="text-muted small">Analisis awal kasus dan identifikasi strategi hukum yang paling efektif.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h5 class="process-title">Pengumpulan Bukti</h5>
                        <p class="text-muted small">Mengumpulkan dan mengorganisir semua bukti dan dokumen pendukung.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h5 class="process-title">Penyusunan Gugatan</h5>
                        <p class="text-muted small">Menyusun gugatan/pledoi yang kuat berdasarkan fakta dan hukum.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h5 class="process-title">Proses Pengadilan</h5>
                        <p class="text-muted small">Pendampingan di semua tingkat pengadilan hingga putusan berkekuatan hukum tetap.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Court Types Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Tingkatan Pengadilan</h2>
                    <p class="section-subtitle">Pengalaman menangani kasus di semua tingkatan peradilan</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="court-type-card">
                        <div class="court-icon">
                            <i class="bi bi-house"></i>
                        </div>
                        <h5 class="court-title">Pengadilan Negeri</h5>
                        <p class="text-muted small">Penanganan perkara di tingkat pertama untuk semua jenis sengketa.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="court-type-card">
                        <div class="court-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h5 class="court-title">Pengadilan Tinggi</h5>
                        <p class="text-muted small">Proses banding untuk perkara yang memerlukan peninjauan ulang.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="court-type-card">
                        <div class="court-icon">
                            <i class="bi bi-shield"></i>
                        </div>
                        <h5 class="court-title">Mahkamah Agung</h5>
                        <p class="text-muted small">Penanganan kasasi dan peninjauan kembali putusan pengadilan bawah.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="court-type-card">
                        <div class="court-icon">
                            <i class="bi bi-shield"></i>
                        </div>
                        <h5 class="court-title">PTUN</h5>
                        <p class="text-muted small">Pengadilan Tata Usaha Negara untuk sengketa dengan instansi pemerintah.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="court-type-card">
                        <div class="court-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="court-title">Pengadilan Hubungan Industrial</h5>
                        <p class="text-muted small">Khusus menangani sengketa ketenagakerjaan dan hubungan industrial.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="court-type-card">
                        <div class="court-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h5 class="court-title">Pengadilan Niaga</h5>
                        <p class="text-muted small">Penanganan perkara kepailitan, sengketa bisnis dan data lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection