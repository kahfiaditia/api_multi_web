@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><i class="fas fa-building text-primary"></i> Detail {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('profil_web.index') }}">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">Detail {{ $submenu }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-info-circle me-2"></i> Informasi Profil</span>
                        <span class="badge bg-light text-dark">
                            {{ ucfirst($profil->status) }}
                        </span>
                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            <!-- Logo + Nama -->
                            <div class="col-md-4 text-center border-end">
                                @if($profil->path_logo)
                                    <img src="{{ asset($profil->path_logo) }}" alt="Logo" 
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 180px;">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" alt="No Logo" 
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 180px;">
                                @endif
                                <h5 class="fw-bold text-primary">{{ $profil->nama_pt }}</h5>
                                <p class="text-muted mb-0"><i class="fas fa-globe"></i> {{ $profil->nama_web }}</p>
                            </div>

                            <!-- Detail Informasi -->
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fas fa-map-marker-alt text-primary me-2"></i> 
                                        <strong>Alamat:</strong> {{ $profil->alamat_lengkap }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-phone text-primary me-2"></i> 
                                        <strong>Telepon:</strong> {{ $profil->telepon_1 }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-mobile-alt text-primary me-2"></i> 
                                        <strong>Nomor HP:</strong> {{ $profil->telepon_2 }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-envelope text-primary me-2"></i> 
                                        <strong>Email Utama:</strong> {{ $profil->email_1 }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-envelope-open text-primary me-2"></i> 
                                        <strong>Email Cadangan:</strong> {{ $profil->email_2 }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-align-left text-primary me-2"></i> 
                                        <strong>Deskripsi:</strong> <br> {!! nl2br(e($profil->deskripsi)) !!}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-plus text-primary me-2"></i>
                                        <strong>Dibuat:</strong> {{ $profil->created_at->format('d M Y H:i') }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-check text-primary me-2"></i>
                                        <strong>Diupdate:</strong> {{ $profil->updated_at->format('d M Y H:i') }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4 text-end">
                            <a href="{{ route('profil_web.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('profil_web.edit', Crypt::encryptString($profil->id)) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
