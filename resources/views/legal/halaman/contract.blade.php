@extends('legal.struktur.awal')
@section('hukum')

<style>
    /* Contract and Preparation Specific Styles */
    .contract-hero {
        background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
        color: white;
        padding: 80px 0 60px;
    }
    
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
    
    .contract-type-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
    }
    
    .contract-type-card:hover {
        transform: translateY(-5px);
        border-color: #1a237e;
    }
    
    .contract-icon {
        font-size: 32px;
        color: #1a237e;
        margin-bottom: 12px;
    }
    
    .consultation-form {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
    
    .contract-category-title {
        font-size: 1rem;
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

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <h5 class="benefit-title">{{ $produk->judul_poin1 }}</h5>
                        <p class="text-muted mb-0 small">{{ $produk->deskripsi_poin1 }}</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <div>
                        <h5 class="benefit-title">{{ $produk->judul_poin2 }}</h5>
                        <p class="text-muted mb-0 small">{{ $produk->deskripsi_poin2 }}</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <div>
                        <h5 class="benefit-title">{{ $produk->judul_poin3 }}</h5>
                        <p class="text-muted mb-0 small">{{ $produk->deskripsi_poin3 }}</p>
                    </div>
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
                <h2 class="section-title">Proses Penyusunan Kontrak</h2>
                <p class="section-subtitle">Metode terstruktur untuk memastikan kontrak yang komprehensif dan melindungi kepentingan Anda</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h5 class="process-title">Konsultasi Kebutuhan</h5>
                    <p class="text-muted small">Memahami kebutuhan bisnis dan tujuan hukum dari kontrak yang akan disusun.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h5 class="process-title">Analisis Hukum</h5>
                    <p class="text-muted small">Meneliti aspek hukum yang relevan dan mengidentifikasi risiko potensial.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h5 class="process-title">Drafting Kontrak</h5>
                    <p class="text-muted small">Menyusun draft kontrak dengan klausul yang komprehensif dan melindungi.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h5 class="process-title">Review & Finalisasi</h5>
                    <p class="text-muted small">Review final dan negosiasi hingga kontrak siap untuk ditandatangani.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contract Types Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Spesialisasi Industri</h2>
                <p class="section-subtitle">Pengalaman luas dalam menyusun kontrak untuk berbagai sektor industri</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="contract-type-card">
                    <div class="contract-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <h6 class="contract-category-title">Properti & Real Estate</h6>
                    <p class="text-muted small">Kontrak development, sewa, dan jual beli properti</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="contract-type-card">
                    <div class="contract-icon">
                        <i class="bi bi-cart"></i>
                    </div>
                    <h6 class="contract-category-title">Retail & E-commerce</h6>
                    <p class="text-muted small">Kontrak distribusi, franchise, dan online marketplace</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="contract-type-card">
                    <div class="contract-icon">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <h6 class="contract-category-title">Teknologi & Startup</h6>
                    <p class="text-muted small">Kontrak software, SaaS, dan partnership teknologi</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="contract-type-card">
                    <div class="contract-icon">
                        <i class="bi bi-droplet"></i>
                    </div>
                    <h6 class="contract-category-title">Manufacturing</h6>
                    <p class="text-muted small">Kontrak produksi, supply chain, dan OEM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="contract-type-card">
                    <div class="contract-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h6 class="contract-category-title">Kesehatan & Farmasi</h6>
                    <p class="text-muted small">Kontrak healthcare, research, dan distribution</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="contract-type-card">
                    <div class="contract-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h6 class="contract-category-title">Logistik & Transportasi</h6>
                    <p class="text-muted small">Kontrak logistics, shipping, dan transportation</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="contract-type-card">
                    <div class="contract-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h6 class="contract-category-title">Keuangan & Perbankan</h6>
                    <p class="text-muted small">Kontrak financial services dan banking</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="contract-type-card">
                    <div class="contract-icon">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <h6 class="contract-category-title">Energi & Pertambangan</h6>
                    <p class="text-muted small">Kontrak energy, mining, dan natural resources</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection