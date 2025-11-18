@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><i class="fas fa-balance-scale text-primary"></i> Detail {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('produk_legal.index') }}">{{ $menu }}</a></li>
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
                        <span><i class="fas fa-info-circle me-2"></i> Informasi Produk Legal</span>
                        <span class="badge bg-light text-dark">
                            {{ $produk_legal->status_produk ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>

                    <div class="card-body p-4">
                        <div class="row">
                            <!-- Gambar Produk -->
                            <div class="col-md-4 text-center border-end">
                                @if($produk_legal->path_gambar)
                                    <img src="{{ asset($produk_legal->path_gambar) }}" alt="Gambar Produk"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" alt="No Image"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @endif
                                <h5 class="fw-bold text-primary mt-2">{{ $produk_legal->judul_bagian }}</h5>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-sort-numeric-up"></i> Urutan: {{ $produk_legal->urutan }}
                                </p>
                            </div>

                            <!-- Detail Informasi -->
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fas fa-align-left text-primary me-2"></i>
                                        <strong>Deskripsi:</strong><br>
                                        {!! nl2br(e($produk_legal->deskripsi)) !!}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-sticky-note text-primary me-2"></i>
                                        <strong>Keterangan:</strong><br>
                                        {!! nl2br(e($produk_legal->keterangan)) !!}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Poin-poin -->
                        <div class="mt-4">
                            <h5 class="text-primary fw-bold mb-3"><i class="fas fa-list-ul me-2"></i> Poin-Poin Produk</h5>

                            <div class="card mb-3 border">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="{{ $produk_legal->icon1 ?? 'fas fa-check-circle' }} text-primary me-2"></i>{{ $produk_legal->judul_poin1 }}</h6>
                                    <p class="mb-0">{!! nl2br(e($produk_legal->deskripsi_poin1)) !!}</p>
                                </div>
                            </div>

                            <div class="card mb-3 border">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="{{ $produk_legal->icon2 ?? 'fas fa-check-circle' }} text-primary me-2"></i>{{ $produk_legal->judul_poin2 }}</h6>
                                    <p class="mb-0">{!! nl2br(e($produk_legal->deskripsi_poin2)) !!}</p>
                                </div>
                            </div>

                            <div class="card mb-3 border">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="{{ $produk_legal->icon3 ?? 'fas fa-check-circle' }} text-primary me-2"></i>{{ $produk_legal->judul_poin3 }}</h6>
                                    <p class="mb-0">{!! nl2br(e($produk_legal->deskripsi_poin3)) !!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi tambahan -->
                        <div class="mt-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="fas fa-calendar-plus text-primary me-2"></i>
                                    <strong>Dibuat:</strong> {{ $produk_legal->created_at->format('d M Y H:i') }}
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-calendar-check text-primary me-2"></i>
                                    <strong>Diupdate:</strong> {{ $produk_legal->updated_at->format('d M Y H:i') }}
                                </li>
                            </ul>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4 text-end">
                            <a href="{{ route('produk_legal.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('produk_legal.edit', Crypt::encryptString($produk_legal->id)) }}" class="btn btn-warning">
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
