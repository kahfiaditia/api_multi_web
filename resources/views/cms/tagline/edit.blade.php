@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><i class="fas fa-edit text-primary"></i> Edit {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('tagline_web.index') }}">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">Edit {{ $submenu }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-primary"><i class="fas fa-pen"></i> Form Edit Tagline</h5>

                         <!-- Tampilkan Error Validasi -->
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <h6 class="alert-heading mb-3">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            Terdapat kesalahan dalam pengisian form:
                                        </h6>
                                        <ul class="mb-0 ps-3">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            <!-- Tampilkan Error Validasi -->


                        <form action="{{ route('tagline_web.update', Crypt::encryptString($tagline->id)) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Judul -->
                                <div class="col-md-6">
                                    <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" id="judul" class="form-control"
                                           value="{{ old('judul', $tagline->judul) }}" maxlength="25" required>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-6">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                           value="{{ old('deskripsi', $tagline->deskripsi) }}" maxlength="50">
                                </div>

                                <!-- Isi -->
                                <div class="col-12">
                                    <label for="isi" class="form-label">Isi</label>
                                    <textarea name="isi" id="isi" class="form-control" rows="4"
                                              placeholder="Tuliskan isi tagline">{{ old('isi', $tagline->isi) }}</textarea>
                                </div>

                                <!-- Icon -->
                                <div class="col-md-6">
                                    <label for="icon" class="form-label">Icon</label>
                                    <input type="text" name="icon" id="icon" class="form-control"
                                           value="{{ old('icon', $tagline->icon) }}" maxlength="20"
                                           placeholder="Masukkan class icon (opsional)">
                                    <small class="text-muted">Contoh: fas fa-star</small>
                                </div>

                                <!-- Upload Gambar -->
                                <div class="col-md-6">
                                    <label for="path_gambar" class="form-label">Upload Gambar</label>
                                    <input type="file" name="path_gambar" id="path_gambar" class="form-control"
                                           accept=".jpg,.jpeg,.png">
                                    @if($tagline->path_gambar && file_exists(public_path($tagline->path_gambar)))
                                        <small class="text-muted d-block mt-1">Gambar saat ini:</small>
                                        <img src="{{ asset($tagline->path_gambar) }}" alt="tagline"
                                             class="img-thumbnail mt-1 shadow-sm" width="150">
                                    @else
                                        <small class="text-muted">Belum ada gambar</small>
                                    @endif
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status1" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status1" id="status1" class="form-select" required>
                                        <option value="Aktif" {{ $tagline->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Nonaktif" {{ $tagline->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('tagline_web.index') }}" class="btn btn-light">
                                    <i class="fas fa-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
