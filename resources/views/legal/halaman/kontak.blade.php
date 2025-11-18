@extends('legal.struktur.awal')
@section('hukum')

<style>
    /* Contact Specific Styles */
    .contact-hero {
        background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
        color: white;
        padding: 80px 0 60px;
    }
    
    .contact-card {
        background: white;
        border-radius: 12px;
        padding: 30px 25px;
        text-align: center;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
        border-top: 4px solid #1a237e;
    }
    
    .contact-card:hover {
        transform: translateY(-10px);
    }
    
    .contact-icon {
        width: 70px;
        height: 70px;
        background: #e8eaf6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    
    .contact-icon i {
        font-size: 28px;
        color: #1a237e;
    }
    
    .office-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        border-left: 4px solid #1a237e;
        height: 100%;
    }
    
    .team-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
    }
    
    .team-card:hover {
        transform: translateY(-5px);
        border-color: #1a237e;
    }
    
    .team-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 15px;
        border: 4px solid #e8eaf6;
    }
    
    .contact-form {
        background: white;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .service-highlight {
        background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
        color: white;
        border-radius: 12px;
        padding: 35px 25px;
        text-align: center;
    }

    .highlight-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
    }

    .info-icon {
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

    .map-container {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .department-badge {
        background: #1a237e;
        color: white;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .social-link {
        width: 38px;
        height: 38px;
        background: #e8eaf6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1a237e;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: #1a237e;
        color: white;
        transform: translateY(-3px);
    }

    .office-feature {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .office-feature i {
        color: #1a237e;
        font-size: 16px;
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
    
    .contact-number {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .office-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
</style>

<!-- Hero Section -->


<!-- Contact Methods Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Berbagai Cara Menghubungi Kami</h2>
                <p class="section-subtitle">Pilih metode yang paling nyaman bagi Anda untuk terhubung dengan tim hukum kami</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h4 class="card-title">Telepon</h4>
                    <p class="text-muted">Hubungi kami langsung untuk konsultasi cepat dan respons langsung.</p>
                    <div class="mt-4">
                        <div class="contact-number text-primary">{{ $profil->telepon_1 }}</div>
                        <p class="text-muted small">Senin - Jumat: 08.00 - 17.00 WIB</p>
                        <a href="tel:+622112345678" class="btn btn-outline-primary btn-sm mt-2">Telepon Sekarang</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h4 class="card-title">Email</h4>
                    <p class="text-muted">Kirimkan pertanyaan detail dan dokumen pendukung melalui email.</p>
                    <div class="mt-4">
                        <div class="contact-number text-primary">{{ $profil->email_1 }}</div>
                        <p class="text-muted small">Response dalam 2-4 jam kerja</p>
                        <a href="mailto:info@firmahukum.com" class="btn btn-outline-primary btn-sm mt-2">Kirim Email</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h4 class="card-title">Live Chat</h4>
                    <p class="text-muted">Chat langsung dengan tim customer service kami secara real-time.</p>
                    <div class="mt-4">
                        <div class="contact-number text-primary">Online 24/7</div>
                        <p class="text-muted small">Support cepat kapan saja</p>
                        <button class="btn btn-outline-primary btn-sm mt-2" onclick="openLiveChat()">Mulai Chat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Office Locations -->
<section id="lokasi" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Kantor Kami</h2>
                <p class="section-subtitle">Kunjungi kantor kami di berbagai kota untuk konsultasi tatap muka</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="office-card">
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-primary rounded-circle p-2 me-3">
                            <i class="bi bi-building text-white"></i>
                        </div>
                        <div>
                            <h4 class="office-title">Kantor Pusat Jakarta</h4>
                            <span class="department-badge">Head Office</span>
                        </div>
                    </div>
                    
                    <div class="office-feature">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <strong>Alamat</strong>
                            <p class="mb-0 small">Jl. Sudirman Kav. 25, Gedung Equity Tower Lt. 15<br>Jakarta Selatan 12920</p>
                        </div>
                    </div>
                    
                    <div class="office-feature">
                        <i class="bi bi-telephone"></i>
                        <div>
                            <strong>Telepon</strong>
                            <p class="mb-0 small">(021) 1234-5678</p>
                        </div>
                    </div>
                    
                    <div class="office-feature">
                        <i class="bi bi-clock"></i>
                        <div>
                            <strong>Jam Operasional</strong>
                            <p class="mb-0 small">Senin - Jumat: 08.00 - 17.00 WIB<br>Sabtu: 09.00 - 14.00 WIB</p>
                        </div>
                    </div>
                    
                    <div class="office-feature">
                        <i class="bi bi-subway"></i>
                        <div>
                            <strong>Akses Transportasi</strong>
                            <p class="mb-0 small">5 menit dari Stasiun MRT Sudirman<br>10 menit dari Halte TransJakarta</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="https://maps.google.com" target="_blank" class="btn btn-primary btn-sm me-2">
                            <i class="bi bi-map me-1"></i>Lihat di Maps
                        </a>
                        <a href="tel:+622112345678" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-telephone me-1"></i>Telepon
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="office-card">
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success rounded-circle p-2 me-3">
                            <i class="bi bi-building text-white"></i>
                        </div>
                        <div>
                            <h4 class="office-title">Kantor Cabang Surabaya</h4>
                            <span class="department-badge" style="background: #28a745;">East Java Office</span>
                        </div>
                    </div>
                    
                    <div class="office-feature">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <strong>Alamat</strong>
                            <p class="mb-0 small">{{ $profil->alamat_lengkap }}</p>
                        </div>
                    </div>
                    
                    <div class="office-feature">
                        <i class="bi bi-telephone"></i>
                        <div>
                            <strong>Telepon</strong>
                            <p class="mb-0 small">(031) 9876-5432</p>
                        </div>
                    </div>
                    
                    <div class="office-feature">
                        <i class="bi bi-clock"></i>
                        <div>
                            <strong>Jam Operasional</strong>
                            <p class="mb-0 small">Senin - Jumat: 08.00 - 17.00 WIB<br>Sabtu: 09.00 - 13.00 WIB</p>
                        </div>
                    </div>
                    
                    <div class="office-feature">
                        <i class="bi bi-subway"></i>
                        <div>
                            <strong>Akses Transportasi</strong>
                            <p class="mb-0 small">Dekat Tunjungan Plaza<br>Akses mudah dari tol dalam kota</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="https://maps.google.com" target="_blank" class="btn btn-primary btn-sm me-2">
                            <i class="bi bi-map me-1"></i>Lihat di Maps
                        </a>
                        <a href="tel:+623198765432" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-telephone me-1"></i>Telepon
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.81956135000001!3d-6.194595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e83956a7cc74!2sSudirman%20Central%20Business%20District!5e0!3m2!1sen!2sid!4v1234567890" 
                        width="100%" 
                        height="350" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Highlights -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Mengapa Memilih Layanan Kami?</h2>
                <p class="section-subtitle">Keunggulan yang membuat kami menjadi pilihan terbaik untuk kebutuhan hukum Anda</p>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="info-item justify-content-center text-center">
                    <div class="info-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">Respons Cepat</h5>
                        <p class="text-muted mb-0 small">Respon dalam 1 jam untuk konsultasi mendesak</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 text-center">
                <div class="info-item justify-content-center text-center">
                    <div class="info-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">Kerahasiaan</h5>
                        <p class="text-muted mb-0 small">Data klien dijamin kerahasiaannya 100%</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 text-center">
                <div class="info-item justify-content-center text-center">
                    <div class="info-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">Tim Profesional</h5>
                        <p class="text-muted mb-0 small">Pengacara berpengalaman dan bersertifikat</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 text-center">
                <div class="info-item justify-content-center text-center">
                    <div class="info-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold">Berpengalaman</h5>
                        <p class="text-muted mb-0 small">Lebih dari 1000 kasus berhasil ditangani</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    function openLiveChat() {
        // Implementation for live chat
        alert('Live chat akan segera dimulai. Tim customer service kami akan membantu Anda.');
        // In real implementation, this would open a chat widget
    }
</script>

@endsection