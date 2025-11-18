@extends('legal.struktur.awal')
@section('hukum')
    <style>
        /* Pro Bono Specific Styles */
        .pro-bono-hero {
            background: linear-gradient(135deg, #2E7D32 0%, #4CAF50 100%);
            color: white;
            padding: 100px 0 80px;
        }

        .service-feature {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%;
            border-top: 4px solid #2E7D32;
        }

        .service-feature:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: #E8F5E8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .feature-icon i {
            font-size: 35px;
            color: #2E7D32;
        }

        .process-step {
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: #2E7D32;
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
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #2E7D32;
            height: 100%;
        }

        .assistance-type-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .assistance-type-card:hover {
            transform: translateY(-5px);
            border-color: #2E7D32;
        }

        .assistance-icon {
            font-size: 40px;
            color: #2E7D32;
            margin-bottom: 15px;
        }

        .consultation-form {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .impact-stats {
            background: linear-gradient(135deg, #2E7D32 0%, #4CAF50 100%);
            color: white;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
        }

        .stat-number {
            font-size: 3.5rem;
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
            width: 50px;
            height: 50px;
            background: #E8F5E8;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2E7D32;
            font-size: 20px;
            flex-shrink: 0;
        }

        .eligibility-badge {
            background: #FF9800;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 10px;
        }

        .criteria-card {
            background: #E8F5E8;
            border-radius: 12px;
            padding: 25px;
            border-left: 4px solid #2E7D32;
            height: 100%;
        }

        .volunteer-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .volunteer-card:hover {
            transform: translateY(-5px);
        }

        .volunteer-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 4px solid #E8F5E8;
        }

        .urgent-tag {
            background: #f44336;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            position: absolute;
            top: 15px;
            right: 15px;
        }
    </style>

    <!-- Overview Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="h1 fw-bold mb-4">{{ $produk->judul_bagian }}</h2>
                    <p class="lead mb-4">{{ $produk->deskripsi }}</p>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="{{ $produk->icon1 }}"></i>
                        </div>
                        <div>
                            <h5>{{ $produk->judul_poin1 }}</h5>
                            <p class="text-muted mb-0">{{ $produk->deskripsi_poin1 }}</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="{{ $produk->icon2 }}"></i>
                        </div>
                        <div>
                            <h5>{{ $produk->judul_poin2 }}</h5>
                            <p class="text-muted mb-0">{{ $produk->deskripsi_poin2 }}</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="{{ $produk->icon3 }}"></i>
                        </div>
                        <div>
                            <h5>{{ $produk->judul_poin3 }}</h5>
                            <p class="text-muted mb-0">{{ $produk->deskripsi_poin3 }}</p>
                        </div>
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

    <!-- Eligibility Criteria -->
    <section id="kriteria" class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="h2 fw-bold mb-3">Kriteria Kelayakan Bantuan Hukum</h2>
                    <p class="lead text-muted">Syarat-syarat untuk dapat menerima layanan bantuan hukum pro bono</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="criteria-card">
                        <h4 class="fw-bold mb-3">Kriteria Ekonomi</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Penghasilan di bawah UMR</strong>
                                <p class="text-muted mb-0 ms-4">Penghasilan bulanan di bawah Upah Minimum Regional</p>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Tidak memiliki aset produktif</strong>
                                <p class="text-muted mb-0 ms-4">Tidak memiliki properti, kendaraan, atau usaha yang
                                    menghasilkan</p>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Penerima bantuan sosial</strong>
                                <p class="text-muted mb-0 ms-4">Tercatat sebagai penerima PKH, BST, atau program bantuan
                                    lainnya</p>
                            </li>
                            <li class="mb-0">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Keluarga prasejahtera</strong>
                                <p class="text-muted mb-0 ms-4">Berdasarkan data BPS atau surat keterangan tidak mampu</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="criteria-card">
                        <h4 class="fw-bold mb-3">Kriteria Kasus</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Kasus perdata sederhana</strong>
                                <p class="text-muted mb-0 ms-4">Sengketa hutang piutang, sewa menyewa, warisan sederhana</p>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Hukum keluarga</strong>
                                <p class="text-muted mb-0 ms-4">Perwalian, pengampuan, penetapan ahli waris</p>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Hukum pidana ringan</strong>
                                <p class="text-muted mb-0 ms-4">Dengan ancaman pidana di bawah 5 tahun</p>
                            </li>
                            <li class="mb-0">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Administrasi kependudukan</strong>
                                <p class="text-muted mb-0 ms-4">Masalah akta kelahiran, KTP, kartu keluarga</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Features -->
    <section id="layanan-kami" class="py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="h2 fw-bold mb-3">{{ $layanan_legal[0]->title }}</h2>
                    <p class="lead text-muted">{{ $layanan_legal[0]->title_deskripsi }}</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($layanan_legal as $item)
                    <div class="col-lg-4 col-md-6">
                    <div class="service-feature">
                        <div class="feature-icon">
                            <i class="{{ $item->icon }}"></i>
                        </div>
                        <h4>{{ $item->judul_bagian }}</h4>
                        <p class="text-muted">{{ $item->deskripsi }}</p>
                        <ul class="list-unstyled text-start">
                            <li><i class="bi bi-check text-success me-2"></i> {{ $item->poin1 }}</li>
                            <li><i class="bi bi-check text-success me-2"></i> {{ $item->poin2 }}</li>
                            <li><i class="bi bi-check text-success me-2"></i> {{ $item->poin3 }}</li>
                        </ul>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Assistance Types Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="h2 fw-bold mb-3">Bentuk Bantuan yang Disediakan</h2>
                    <p class="lead text-muted">Berbagai bentuk dukungan hukum yang dapat diperoleh melalui program ini</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="assistance-type-card">
                        <div class="assistance-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <h6>Konsultasi Hukum</h6>
                        <p class="text-muted small">Konsultasi gratis untuk masalah hukum yang dihadapi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="assistance-type-card">
                        <div class="assistance-icon">
                            <i class="bi bi-pen"></i>
                        </div>
                        <h6>Pembuatan Dokumen</h6>
                        <p class="text-muted small">Bantuan membuat dokumen hukum yang diperlukan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="assistance-type-card">
                        <div class="assistance-icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <h6>Pendampingan Hukum</h6>
                        <p class="text-muted small">Didampingi pengacara dalam proses hukum</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="assistance-type-card">
                        <div class="assistance-icon">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <h6>Mediasi & Negosiasi</h6>
                        <p class="text-muted small">Bantuan menyelesaikan sengketa di luar pengadilan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="assistance-type-card">
                        <div class="assistance-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h6>Review Dokumen</h6>
                        <p class="text-muted small">Pengecekan dokumen hukum yang dimiliki</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="assistance-type-card">
                        <div class="assistance-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h6>Hotline Darurat</h6>
                        <p class="text-muted small">Layanan telepon untuk keadaan darurat hukum</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="assistance-type-card">
                        <div class="assistance-icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <h6>Edukasi Hukum</h6>
                        <p class="text-muted small">Penyuluhan dan pendidikan hukum masyarakat</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="assistance-type-card">
                        <div class="assistance-icon">
                            <i class="bi bi-share"></i>
                        </div>
                        <h6>Rujukan Layanan</h6>
                        <p class="text-muted small">Direkomendasikan ke lembaga bantuan hukum lain</p>
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
                    <h2 class="h2 fw-bold mb-3">Proses Pengajuan Bantuan Hukum</h2>
                    <p class="lead text-muted">Langkah-langkah mudah untuk mendapatkan bantuan hukum pro bono</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h5>Pengajuan Permohonan</h5>
                        <p class="text-muted">Isi formulir pengajuan online atau datang langsung ke kantor kami.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h5>Verifikasi Dokumen</h5>
                        <p class="text-muted">Tim kami akan memverifikasi kelengkapan dan keaslian dokumen.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h5>Wawancara & Assessment</h5>
                        <p class="text-muted">Proses wawancara untuk memahami masalah hukum yang dihadapi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h5>Penetapan Bantuan</h5>
                        <p class="text-muted">Penetapan kelayakan dan penugasan pengacara untuk menangani kasus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection