@extends('upcube.central')
@section('datacontent')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Detail {{ $submenu }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('sambutan_web.index') }}">{{ $submenu }}</a></li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title text-primary mb-0">
                                    <i class="fas fa-eye"></i> Detail Data {{ $submenu }}
                                </h5>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('sambutan_web.index') }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                    <a href="{{ route('sambutan_web.edit', $sambutan->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Informasi Utama -->
                                <div class="col-md-8">
                                    <div class="card bg-light">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="mb-0"><i class="fas fa-info-circle"></i> Informasi Sambutan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="30%" class="fw-bold">Nama Website</td>
                                                            <td width="5%">:</td>
                                                            <td>{{ $sambutan->website->nama_web }} ({{ $sambutan->website->sub_web }})</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bold">Nama Sambutan</td>
                                                            <td>:</td>
                                                            <td>{{ $sambutan->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bold">Status</td>
                                                            <td>:</td>
                                                            <td>
                                                                @if($sambutan->status1 == 1)
                                                                    <span class="badge bg-success">Aktif</span>
                                                                @else
                                                                    <span class="badge bg-danger">Nonaktif</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bold">Dibuat Pada</td>
                                                            <td>:</td>
                                                            <td>{{ $sambutan->created_at->format('d F Y H:i') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-bold">Diupdate Pada</td>
                                                            <td>:</td>
                                                            <td>{{ $sambutan->updated_at->format('d F Y H:i') }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Area Sambutan -->
                                    <div class="card bg-light mt-4">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="mb-0"><i class="fas fa-file-alt"></i> Isi Sambutan</h6>
                                        </div>
                                        <div class="card-body">
                                            @if($sambutan->area)
                                                <div class="content-area">
                                                    {!! $sambutan->area !!}
                                                </div>
                                            @else
                                                <div class="text-center text-muted py-4">
                                                    <i class="fas fa-file-alt fa-3x mb-2"></i>
                                                    <p>Tidak ada konten sambutan</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Foto Sambutan -->
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="mb-0"><i class="fas fa-image"></i> Foto Sambutan</h6>
                                        </div>
                                        <div class="card-body text-center">
                                            @if($sambutan->path_sambutan)
                                                <div class="mb-3">
                                                    <img src="{{ asset($sambutan->path_sambutan) }}"
                                                         alt="Foto Sambutan {{ $sambutan->nama }}"
                                                         class="img-fluid rounded shadow-sm"
                                                         style="max-height: 300px; object-fit: cover;">
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <a href="{{ asset('storage/' . $sambutan->path_sambutan) }}"
                                                       target="_blank"
                                                       class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-external-link-alt"></i> Lihat Full Size
                                                    </a>
                                                </div>
                                            @else
                                                <div class="text-center text-muted py-4">
                                                    <i class="fas fa-image fa-3x mb-2"></i>
                                                    <p>Tidak ada foto sambutan</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Informasi Tambahan -->
                                    <div class="card bg-light mt-4">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="mb-0"><i class="fas fa-cog"></i> Informasi Tambahan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-outline-info btn-sm" onclick="showInfo()">
                                                    <i class="fas fa-info-circle"></i> Lihat Info Detail
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
<script>
    function showInfo() {
        // Anda bisa menambahkan modal atau alert dengan informasi tambahan
        Swal.fire({
            title: 'Informasi Detail',
            html: `
                <div class="text-start">
                    <p><strong>ID:</strong> {{ $sambutan->id }}</p>
                    <p><strong>Nama Field:</strong> {{ $sambutan->nama }}</p>
                    <p><strong>Status:</strong> {{ $sambutan->status1 == 1 ? 'Aktif' : 'Nonaktif' }}</p>
                    <p><strong>Dibuat:</strong> {{ $sambutan->created_at }}</p>
                    <p><strong>Diupdate:</strong> {{ $sambutan->updated_at }}</p>
                </div>
            `,
            icon: 'info',
            confirmButtonText: 'Tutup'
        });
    }

    // Fungsi untuk menampilkan gambar dalam modal
    function showImageModal(src) {
        Swal.fire({
            imageUrl: src,
            imageAlt: 'Foto Sambutan {{ $sambutan->nama }}',
            showCloseButton: true,
            showConfirmButton: false,
            width: '80%',
            padding: '0'
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Menambahkan event click untuk gambar
        const image = document.querySelector('img[alt="Foto Sambutan {{ $sambutan->nama }}"]');
        if (image) {
            image.style.cursor = 'pointer';
            image.addEventListener('click', function() {
                showImageModal(this.src);
            });
        }

        // Style untuk konten area
        const contentArea = document.querySelector('.content-area');
        if (contentArea) {
            contentArea.style.lineHeight = '1.6';
            contentArea.style.fontSize = '14px';
        }
    });
</script>

<style>
    .card {
        border: 1px solid #dee2e6;
    }

    .card-header {
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .table tbody tr {
        border-bottom: 1px solid #f8f9fa;
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    .content-area img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 10px 0;
    }

    .content-area p {
        margin-bottom: 1rem;
    }

    .content-area ul, .content-area ol {
        padding-left: 2rem;
        margin-bottom: 1rem;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }
</style>
@endsection
