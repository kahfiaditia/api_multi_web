@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><i class="fas fa-user-tie text-primary"></i> Detail {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('team_web.index') }}">{{ $menu }}</a></li>
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
                        <span><i class="fas fa-id-card me-2"></i> Informasi Team</span>
                        <span class="badge {{ $team->status == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $team->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            <!-- Foto Team -->
                            <div class="col-md-4 text-center border-end">
                                @if($team->path_foto && file_exists(public_path($team->path_foto)))
                                    <img src="{{ asset($team->path_foto) }}" alt="Foto Team"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" alt="No Image"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @endif

                                <h5 class="fw-bold text-primary">{{ $team->nama_lengkap }}</h5>
                                <p class="text-muted">{{ $team->jabatan ?? '-' }}</p>
                            </div>

                            <!-- Detail Informasi -->
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fas fa-id-badge text-primary me-2"></i>
                                        <strong>NIP:</strong> {{ $team->nip ?? '-' }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-envelope text-primary me-2"></i>
                                        <strong>Email:</strong> {{ $team->email ?? '-' }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-phone text-primary me-2"></i>
                                        <strong>Telepon:</strong> {{ $team->telepon ?? '-' }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-sticky-note text-primary me-2"></i>
                                        <strong>Keterangan:</strong> {{ $team->keterangan ?? '-' }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <strong>Area:</strong>
                                        <div class="mt-1">{!! $team->area ?? '-' !!}</div>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-plus text-primary me-2"></i>
                                        <strong>Dibuat:</strong> {{ $team->created_at->format('d M Y H:i') }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-check text-primary me-2"></i>
                                        <strong>Diupdate:</strong> {{ $team->updated_at->format('d M Y H:i') }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4 text-end">
                            <a href="{{ route('team_web.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('team_web.edit', Crypt::encryptString($team->id)) }}" class="btn btn-warning">
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
