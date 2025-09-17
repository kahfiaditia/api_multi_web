@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><i class="fas fa-blog text-primary"></i> Detail {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('blog_web.index') }}">{{ $menu }}</a></li>
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
                        <span><i class="fas fa-info-circle me-2"></i> Informasi Blog</span>
                        <span class="badge {{ $blog->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            <!-- Gambar Blog -->
                            <div class="col-md-4 text-center border-end">
                                @php
                                    $gambarUtama = $blog->path_gambar1 ?? $blog->path_gambar2 ?? $blog->path_gambar3;
                                @endphp

                                @if($gambarUtama && file_exists(public_path($gambarUtama)))
                                    <img src="{{ asset($gambarUtama) }}" alt="Gambar Blog"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" alt="No Image"
                                         class="img-fluid rounded mb-3 shadow-sm" style="max-width: 220px;">
                                @endif

                                <h5 class="fw-bold text-primary">{{ $blog->judul }}</h5>
                                <p class="text-muted">{{ $blog->kategori }}</p>
                            </div>

                            <!-- Detail Informasi -->
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fas fa-heading text-primary me-2"></i>
                                        <strong>Judul:</strong> {{ $blog->judul }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-folder-open text-primary me-2"></i>
                                        <strong>Kategori:</strong> {{ $blog->kategori }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-align-left text-primary me-2"></i>
                                        <strong>Isi Blog:</strong>
                                        <div class="mt-2">{!! $blog->isi !!}</div>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-plus text-primary me-2"></i>
                                        <strong>Dibuat:</strong> {{ $blog->created_at->format('d M Y H:i') }}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-calendar-check text-primary me-2"></i>
                                        <strong>Diupdate:</strong> {{ $blog->updated_at->format('d M Y H:i') }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Galeri Gambar -->
                        <div class="mt-4">
                            <h6><i class="fas fa-images text-primary me-2"></i> Galeri Gambar</h6>
                            <div class="d-flex flex-wrap gap-3 mt-2">
                                @foreach (['path_gambar1', 'path_gambar2', 'path_gambar3'] as $field)
                                    @if($blog->$field && file_exists(public_path($blog->$field)))
                                        <img src="{{ asset($blog->$field) }}" class="img-thumbnail shadow-sm" width="180">
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4 text-end">
                            <a href="{{ route('blog_web.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('blog_web.edit', Crypt::encryptString($blog->id)) }}" class="btn btn-warning">
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
