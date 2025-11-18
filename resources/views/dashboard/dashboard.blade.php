@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Statistik Cards -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0">Total Pengunjung</p>
                                <h4 class="mt-2 mb-0">12,458</h4>
                                <p class="text-success mb-0 mt-2">
                                    <span class="badge bg-success-subtle text-success p-1"><i class="fas fa-arrow-up"></i> 18.25%</span> vs bulan lalu
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-primary bg-opacity-10 text-center">
                                    <i class="fas fa-users text-primary font-size-24"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0">Total Banner</p>
                                <h4 class="mt-2 mb-0">48</h4>
                                <p class="text-success mb-0 mt-2">
                                    <span class="badge bg-success-subtle text-success p-1"><i class="fas fa-arrow-up"></i> 5.2%</span> aktif
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-success bg-opacity-10 text-center">
                                    <i class="fas fa-image text-success font-size-24"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0">Klik Banner</p>
                                <h4 class="mt-2 mb-0">2,548</h4>
                                <p class="text-danger mb-0 mt-2">
                                    <span class="badge bg-danger-subtle text-danger p-1"><i class="fas fa-arrow-down"></i> 2.1%</span> vs bulan lalu
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-warning bg-opacity-10 text-center">
                                    <i class="fas fa-mouse text-warning font-size-24"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0">Konversi</p>
                                <h4 class="mt-2 mb-0">8.45%</h4>
                                <p class="text-success mb-0 mt-2">
                                    <span class="badge bg-success-subtle text-success p-1"><i class="fas fa-arrow-up"></i> 1.25%</span> vs bulan lalu
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="avatar-sm rounded-circle bg-info bg-opacity-10 text-center">
                                    <i class="fas fa-chart-line text-info font-size-24"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts & Analytics -->
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Statistik Klik Banner</h4>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Bulan Ini
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Hari Ini</a></li>
                                    <li><a class="dropdown-item" href="#">Minggu Ini</a></li>
                                    <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                                    <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="chart-container" style="height: 300px;">
                            <!-- Chart akan diisi oleh JavaScript -->
                            <canvas id="bannerChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Banner Terpopuler</h4>
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/60" alt="banner" class="rounded" width="60">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="font-size-16 mb-1">Promo Spesial</h5>
                                <p class="text-muted mb-0">1,245 klik</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-success">Aktif</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/60" alt="banner" class="rounded" width="60">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="font-size-16 mb-1">New Collection</h5>
                                <p class="text-muted mb-0">987 klik</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-success">Aktif</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/60" alt="banner" class="rounded" width="60">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="font-size-16 mb-1">Summer Sale</h5>
                                <p class="text-muted mb-0">756 klik</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-warning">Paused</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/60" alt="banner" class="rounded" width="60">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="font-size-16 mb-1">Flash Sale</h5>
                                <p class="text-muted mb-0">543 klik</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-success">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Aktivitas Terbaru</h4>
                            <a href="#" class="btn btn-light">Lihat Semua</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Banner</th>
                                        <th>Waktu</th>
                                        <th>Aktivitas</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://via.placeholder.com/40" alt="banner" class="rounded me-3" width="40">
                                                <div>
                                                    <h5 class="font-size-14 mb-1">Promo Spesial</h5>
                                                    <p class="text-muted mb-0">Homepage</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2 jam yang lalu</td>
                                        <td>Dibuat</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light btn-sm">Edit</button>
                                                <button type="button" class="btn btn-light btn-sm">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://via.placeholder.com/40" alt="banner" class="rounded me-3" width="40">
                                                <div>
                                                    <h5 class="font-size-14 mb-1">New Collection</h5>
                                                    <p class="text-muted mb-0">Category Page</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>5 jam yang lalu</td>
                                        <td>Diupdate</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light btn-sm">Edit</button>
                                                <button type="button" class="btn btn-light btn-sm">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://via.placeholder.com/40" alt="banner" class="rounded me-3" width="40">
                                                <div>
                                                    <h5 class="font-size-14 mb-1">Summer Sale</h5>
                                                    <p class="text-muted mb-0">Homepage</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1 hari yang lalu</td>
                                        <td>Diaktifkan</td>
                                        <td><span class="badge bg-warning">Paused</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light btn-sm">Edit</button>
                                                <button type="button" class="btn btn-light btn-sm">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>

<style>
.card-animate {
    transition: all 0.3s ease;
}
.card-animate:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.avatar-sm {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.bg-opacity-10 {
    opacity: 0.1;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('bannerChart').getContext('2d');
    var bannerChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['1 Mar', '5 Mar', '10 Mar', '15 Mar', '20 Mar', '25 Mar', '30 Mar'],
            datasets: [{
                label: 'Klik Banner',
                data: [120, 150, 180, 90, 200, 160, 220],
                borderColor: '#4361ee',
                backgroundColor: 'rgba(67, 97, 238, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>
@endsection
