@extends('legal.struktur.awal')
@section('hukum')

<style>
    /* Corporate Legal Specific Styles */
    .service-feature {
        background: white;
        border-radius: 12px;
        padding: 30px 25px;
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
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        border-left: 4px solid #1a237e;
        height: 100%;
    }
    
    .industry-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
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
        font-size: 32px;
        color: #1a237e;
        margin-bottom: 12px;
    }
    
    .pricing-card {
        background: white;
        border-radius: 12px;
        padding: 30px 25px;
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
        top: 15px;
        right: -30px;
        background: #1a237e;
        color: white;
        padding: 4px 30px;
        font-size: 11px;
        font-weight: 600;
        transform: rotate(45deg);
    }
    
    .pricing-price {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a237e;
        margin: 15px 0;
    }
    
    .benefit-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .benefit-list li {
        padding: 6px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .benefit-list li:last-child {
        border-bottom: none;
    }
    
    .benefit-list li i {
        color: #4caf50;
        margin-right: 8px;
    }
    
    .consultation-form {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
    
    .industry-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
</style>
{{-- {{ dd($produk) }} --}}
<!-- Overview Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">{{ $produk->judul_bagian}}</h2>
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
                    <img src="{{ asset($produk->path_gambar) }}" alt="Importance of Corporate Legal" class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </div>
</section>
{{-- {{ dd($layanan_legal) }} --}}
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
                <h2 class="section-title">Proses Kerja Kami</h2>
                <p class="section-subtitle">Metode terstruktur untuk memberikan solusi hukum yang efektif dan efisien</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h5 class="process-title">Konsultasi Awal</h5>
                    <p class="text-muted small">Memahami kebutuhan dan masalah hukum perusahaan Anda melalui konsultasi mendalam.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h5 class="process-title">Analisis Hukum</h5>
                    <p class="text-muted small">Melakukan penelitian dan analisis mendalam terhadap aspek hukum yang relevan.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h5 class="process-title">Penyusunan Strategi</h5>
                    <p class="text-muted small">Mengembangkan strategi hukum yang tepat untuk mencapai tujuan bisnis Anda.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h5 class="process-title">Implementasi & Monitoring</h5>
                    <p class="text-muted small">Melaksanakan solusi dan memantau perkembangan untuk memastikan keberhasilan.</p>
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
                <h2 class="section-title">Spesialisasi Industri</h2>
                <p class="section-subtitle">Pengalaman luas dalam berbagai sektor industri</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <h6 class="industry-title">Properti & Real Estate</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="bi bi-cart"></i>
                    </div>
                    <h6 class="industry-title">Retail & E-commerce</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <h6 class="industry-title">Teknologi & Startup</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="bi bi-droplet"></i>
                    </div>
                    <h6 class="industry-title">Manufacturing</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h6 class="industry-title">Kesehatan & Farmasi</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h6 class="industry-title">Logistik & Transportasi</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h6 class="industry-title">Keuangan & Perbankan</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="industry-card">
                    <div class="industry-icon">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <h6 class="industry-title">Energi & Pertambangan</h6>
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
                                <select class="form-select" required>
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
                                <select class="form-select" required>
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
                                <button type="submit" class="btn btn-primary w-100">Kirim Permintaan Konsultasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection