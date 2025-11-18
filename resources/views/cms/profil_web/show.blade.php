@extends('upcube.central')
@section('datacontent')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Detail {{ $submenu }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profil_web.index') }}">{{ $submenu }}</a></li>
                                <li class="breadcrumb-item active">Detail Data</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-light py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 text-primary">
                                    <i class="fas fa-eye me-2"></i>Detail Profil Perusahaan
                                </h5>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('profil_web.index') }}" class="btn btn-light btn-sm">
                                        <i class="fas fa-arrow-left me-1"></i> Kembali
                                    </a>
                                    <a href="{{ route('profil_web.edit', $profil->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Informasi Perusahaan -->
                                <div class="col-12 mb-4">
                                    <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                                        <i class="fas fa-building me-2"></i>Informasi Perusahaan
                                    </h6>

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold text-muted">Nama Perusahaan</label>
                                            <div class="p-3 bg-light rounded border">
                                                <strong class="text-dark">{{ $profil->nama_pt ?? '-' }}</strong>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold text-muted">Domain</label>
                                            <div class="p-3 bg-light rounded border">
                                                @if($profil->nama_web)
                                                    <a href="https://{{ $profil->nama_web }}" target="_blank" class="text-decoration-none">
                                                        <strong class="text-primary">{{ $profil->nama_web }}</strong>
                                                        <i class="fas fa-external-link-alt ms-1 small"></i>
                                                    </a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold text-muted">Sub Domain</label>
                                            <div class="p-3 bg-light rounded border">
                                                @if($profil->sub_web)
                                                    <a href="https://{{ $profil->sub_web }}" target="_blank" class="text-decoration-none">
                                                        <strong class="text-primary">{{ $profil->sub_web }}</strong>
                                                        <i class="fas fa-external-link-alt ms-1 small"></i>
                                                    </a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Logo Perusahaan -->
                                <div class="col-12 mb-4">
                                    <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                                        <i class="fas fa-image me-2"></i>Logo Perusahaan
                                    </h6>

                                    <div class="row">
                                        <div class="col-md-6">
                                            @if($profil->path_logo)
                                                <div class="text-center">
                                                    <label class="form-label fw-semibold text-muted d-block">Logo Saat Ini</label>
                                                    <div class="border rounded p-4 d-inline-block bg-white">
                                                        <img src="{{ asset($profil->path_logo) }}"
                                                             alt="Logo {{ $profil->nama_pt }}"
                                                             class="img-fluid"
                                                             style="max-height: 150px; max-width: 200px;">
                                                    </div>
                                                    <div class="mt-2">
                                                        <small class="text-muted">Format: {{ pathinfo($profil->path_logo, PATHINFO_EXTENSION) }}</small>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <div class="border rounded p-5 bg-light">
                                                        <i class="fas fa-image fa-3x text-muted mb-3"></i>
                                                        <p class="text-muted mb-0">Tidak ada logo</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Status</label>
                                            <div class="p-3 rounded border">
                                                <span class="badge bg-{{ $profil->status == 'aktif' ? 'success' : 'danger' }} fs-6">
                                                    {{ $profil->status == 'aktif' ? 'AKTIF' : 'NON AKTIF' }}
                                                </span>
                                            </div>

                                            <label class="form-label fw-semibold text-muted mt-3">Tanggal Dibuat</label>
                                            <div class="p-3 bg-light rounded border">
                                                <strong class="text-dark">
                                                    {{ $profil->created_at ? $profil->created_at->format('d F Y H:i') : '-' }}
                                                </strong>
                                            </div>

                                            <label class="form-label fw-semibold text-muted mt-3">Terakhir Diupdate</label>
                                            <div class="p-3 bg-light rounded border">
                                                <strong class="text-dark">
                                                    {{ $profil->updated_at ? $profil->updated_at->format('d F Y H:i') : '-' }}
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Alamat Perusahaan -->
                                <div class="col-12 mb-4">
                                    <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                                        <i class="fas fa-map-marker-alt me-2"></i>Alamat Perusahaan
                                    </h6>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Alamat Lengkap</label>
                                            <div class="p-3 bg-light rounded border min-h-100">
                                                @if($profil->alamat_lengkap)
                                                    <p class="mb-0 text-dark">{{ nl2br(e($profil->alamat_lengkap)) }}</p>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Alamat Cabang</label>
                                            <div class="p-3 bg-light rounded border min-h-100">
                                                @if($profil->alamat_cabang)
                                                    <p class="mb-0 text-dark">{{ nl2br(e($profil->alamat_cabang)) }}</p>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Alamat Workshop</label>
                                            <div class="p-3 bg-light rounded border min-h-100">
                                                @if($profil->alamat_workshop)
                                                    <p class="mb-0 text-dark">{{ nl2br(e($profil->alamat_workshop)) }}</p>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Alamat Lainnya</label>
                                            <div class="p-3 bg-light rounded border min-h-100">
                                                @if($profil->alamat_lain)
                                                    <p class="mb-0 text-dark">{{ nl2br(e($profil->alamat_lain)) }}</p>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kontak & Informasi -->
                                <div class="col-12 mb-4">
                                    <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                                        <i class="fas fa-phone-alt me-2"></i>Kontak & Informasi
                                    </h6>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Telepon</label>
                                            <div class="p-3 bg-light rounded border">
                                                @if($profil->telepon_1)
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-phone text-muted me-2"></i>
                                                        <strong class="text-dark">{{ $profil->telepon_1 }}</strong>
                                                        <a href="tel:{{ $profil->telepon_1 }}" class="btn btn-sm btn-outline-primary ms-2">
                                                            <i class="fas fa-phone"></i>
                                                        </a>
                                                    </div>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Nomor HP/WhatsApp</label>
                                            <div class="p-3 bg-light rounded border">
                                                @if($profil->telepon_2)
                                                    <div class="d-flex align-items-center">
                                                        <i class="fab fa-whatsapp text-success me-2"></i>
                                                        <strong class="text-dark">{{ $profil->telepon_2 }}</strong>
                                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->telepon_2) }}"
                                                           target="_blank"
                                                           class="btn btn-sm btn-outline-success ms-2">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </div>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Email Utama</label>
                                            <div class="p-3 bg-light rounded border">
                                                @if($profil->email_1)
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-envelope text-muted me-2"></i>
                                                        <strong class="text-dark">{{ $profil->email_1 }}</strong>
                                                        <a href="mailto:{{ $profil->email_1 }}" class="btn btn-sm btn-outline-primary ms-2">
                                                            <i class="fas fa-envelope"></i>
                                                        </a>
                                                    </div>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold text-muted">Email Cadangan</label>
                                            <div class="p-3 bg-light rounded border">
                                                @if($profil->email_2)
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-envelope text-muted me-2"></i>
                                                        <strong class="text-dark">{{ $profil->email_2 }}</strong>
                                                        <a href="mailto:{{ $profil->email_2 }}" class="btn btn-sm btn-outline-primary ms-2">
                                                            <i class="fas fa-envelope"></i>
                                                        </a>
                                                    </div>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-semibold text-muted">Deskripsi Perusahaan</label>
                                            <div class="p-3 bg-light rounded border">
                                                @if($profil->deskripsi)
                                                    <p class="mb-0 text-dark">{{ nl2br(e($profil->deskripsi)) }}</p>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end gap-2 border-top pt-4">
                                        <a href="{{ route('profil_web.index') }}" class="btn btn-light px-4">
                                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                                        </a>
                                        <a href="{{ route('profil_web.edit', $profil->id) }}" class="btn btn-primary px-4">
                                            <i class="fas fa-edit me-2"></i> Edit Data
                                        </a>
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

@push('styles')
    <style>
        .min-h-100 {
            min-height: 100px;
        }
        .badge {
            font-size: 0.85em;
        }
    </style>
@endpush
