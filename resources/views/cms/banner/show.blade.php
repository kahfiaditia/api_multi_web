@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><i class="fas fa-image text-primary"></i> Detail {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('banner_web.index') }}">{{ $menu }}</a></li>
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
                        <span><i class="fas fa-info-circle me-2"></i> Informasi Banner</span>
                        <span class="badge bg-light text-dark">
                            {{ $banner->status == 1 ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            <!-- Gambar Banner -->
                            <div class="col-md-4 text-center border-end">
                                @if($banner->path_gambar && file_exists(public_path($banner->path_gambar)))
                                    <img src="{{ asset($banner->path_gambar) }}" alt="Banner"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" alt="No Image"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @endif
                                <h5 class="fw-bold text-primary">{{ $banner->judul_banner }}</h5>
                            </div>

                            <!-- Detail Informasi -->
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fas fa-link text-primary me-2"></i>
                                        <strong>Link:</strong>
                                        @if($banner->link)
                                            <a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a>
                                        @else
                                            <span class="text-muted">Tidak ada link</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-align-left text-primary me-2"></i>
                                        <strong>Keterangan:</strong> <br> {!! nl2br(e($banner->keterangan ?? 'Tidak ada keterangan')) !!}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-plus text-primary me-2"></i>
                                        <strong>Dibuat:</strong> {{ $banner->created_at->format('d M Y H:i') }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-check text-primary me-2"></i>
                                        <strong>Diupdate:</strong> {{ $banner->updated_at->format('d M Y H:i') }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4 text-end">
                            <a href="{{ route('banner_web.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('banner_web.edit', Crypt::encryptString($banner->id)) }}" class="btn btn-warning">
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
