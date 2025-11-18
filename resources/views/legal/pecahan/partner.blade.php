<section class="py-5 bg-white">
    <div class="container">
        <!-- Heading Row -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="sec-heading center">
                    <h2 class="display-5 fw-bold mb-3">Portofolio Klien Kami</h2>
                    <p class="lead text-muted">Menjadi pilihan utama berbagai perusahaan dari berbagai sektor industri</p>
                </div>
            </div>
        </div>

        <!-- Category Filter -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="category-filter">
                    <button class="filter-btn active" data-filter="all">Semua</button>
                    <button class="filter-btn" data-filter="corporate">Perusahaan</button>
                    <button class="filter-btn" data-filter="individual">Individu</button>
                    <button class="filter-btn" data-filter="government">Pemerintah</button>
                </div>
            </div>
        </div>

        <!-- Client Grid -->
        <div class="row g-4" id="client-grid">
            @foreach ($client as $client)
            <div class="col-xl-3 col-lg-4 col-md-6 client-item" data-category="{{ $client->kategori }}">
                <div class="client-grid-card">
                    <div class="client-header">
                        <div class="client-logo">
                            <img src="{{ asset($client->path_gambar) }}" alt="{{ $client->nama }}" />
                        </div>
                        <span class="client-category">{{ $client->kategori }}</span>
                    </div>
                    <div class="client-body">
                        <h5 class="client-title">{{ $client->nama }}</h5>
                        <p class="client-desc">{{ $client->deskripsi }}</p>
                        <div class="client-meta">
                            <span class="meta-item">
                                <i class="bi bi-clock"></i>
                                {{ $client->durasi }}
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-check-circle"></i>
                                Selesai
                            </span>
                        </div>
                    </div>
                    <div class="client-footer">
                        <div class="success-rate">
                            <div class="rate-progress">
                                <div class="progress-bar" style="width: {{ $client->tingkat_keberhasilan }}%"></div>
                            </div>
                            <span class="rate-text">{{ $client->tingkat_keberhasilan }}% Keberhasilan</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<style>
.category-filter {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.filter-btn {
    padding: 10px 25px;
    border: 2px solid #e0e0e0;
    background: white;
    border-radius: 25px;
    font-weight: 500;
    color: #6c757d;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn.active,
.filter-btn:hover {
    background: #1a237e;
    color: white;
    border-color: #1a237e;
}

.client-grid-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    overflow: hidden;
    height: 100%;
}

.client-grid-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.client-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 0;
    margin-bottom: 15px;
}

.client-logo {
    width: 60px;
    height: 60px;
    background: #f8f9fa;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.client-logo img {
    max-width: 100%;
    max-height: 35px;
    filter: grayscale(100%);
    transition: all 0.3s ease;
}

.client-grid-card:hover .client-logo img {
    filter: grayscale(0%);
}

.client-category {
    background: #e3f2fd;
    color: #1a237e;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 500;
}

.client-body {
    padding: 0 20px;
}

.client-title {
    font-weight: 600;
    color: #1a237e;
    margin-bottom: 10px;
    font-size: 16px;
}

.client-desc {
    color: #6c757d;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 15px;
}

.client-meta {
    display: flex;
    gap: 15px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    color: #6c757d;
}

.meta-item i {
    color: #1a237e;
}

.client-footer {
    padding: 15px 20px 20px;
    border-top: 1px solid #f0f0f0;
    margin-top: 15px;
}

.success-rate {
    display: flex;
    align-items: center;
    gap: 10px;
}

.rate-progress {
    flex: 1;
    height: 6px;
    background: #e0e0e0;
    border-radius: 3px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #4caf50, #8bc34a);
    border-radius: 3px;
    transition: width 1s ease;
}

.rate-text {
    font-size: 12px;
    color: #6c757d;
    font-weight: 500;
}

.cta-section {
    background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
    color: white;
    padding: 50px;
    border-radius: 20px;
    margin-top: 30px;
}

.cta-section h4 {
    color: white;
}

.cta-section .text-muted {
    color: rgba(255,255,255,0.8) !important;
}

@media (max-width: 768px) {
    .category-filter {
        gap: 10px;
    }
    
    .filter-btn {
        padding: 8px 20px;
        font-size: 14px;
    }
    
    .client-header {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }
    
    .cta-section {
        padding: 30px 20px;
    }
}
</style>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const clientItems = document.querySelectorAll('.client-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            clientItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>