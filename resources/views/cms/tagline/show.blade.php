@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><i class="fas fa-info-circle text-primary"></i> Detail {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('tagline_web.index') }}">{{ $menu }}</a></li>
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
                        <span><i class="fas fa-info-circle me-2"></i> Informasi Tagline</span>
                        <span class="badge bg-light text-dark">
                            {{ $tagline->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            <!-- Gambar Tagline -->
                            <div class="col-md-4 text-center border-end">
                                @if($tagline->path_gambar && file_exists(public_path($tagline->path_gambar)))
                                    <img src="{{ asset($tagline->path_gambar) }}" alt="Tagline"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" alt="No Image"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @endif
                                <h5 class="fw-bold text-primary">{{ $tagline->judul }}</h5>
                                @if($tagline->icon)
                                    <p><i class="{{ $tagline->icon }} fa-2x text-secondary"></i></p>
                                @endif
                            </div>

                            <!-- Detail Informasi -->
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fas fa-align-left text-primary me-2"></i>
                                        <strong>Deskripsi:</strong> <br>
                                        {!! nl2br(e($tagline->deskripsi ?? 'Tidak ada deskripsi')) !!}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-file-alt text-primary me-2"></i>
                                        <strong>Isi:</strong> <br> {!! $tagline->isi ?? '<span class="text-muted">Tidak ada isi</span>' !!}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-plus text-primary me-2"></i>
                                        <strong>Dibuat:</strong> {{ $tagline->created_at->format('d M Y H:i') }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-check text-primary me-2"></i>
                                        <strong>Diupdate:</strong> {{ $tagline->updated_at->format('d M Y H:i') }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4 text-end">
                            <a href="{{ route('tagline_web.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('tagline_web.edit', Crypt::encryptString($tagline->id)) }}" class="btn btn-warning">
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
