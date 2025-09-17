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
                            <li class="breadcrumb-item"><a href="{{ route('banner_Web.index') }}">{{ $menu }}</a></li>
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
                        <h5 class="card-title mb-4 text-primary"><i class="fas fa-pen"></i> Form Edit Banner</h5>

                        <form action="{{ route('banner_Web.update', Crypt::encryptString($banner->id)) }}" 
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Judul -->
                                <div class="col-md-6">
                                    <label for="judul_banner" class="form-label">Judul Banner <span class="text-danger">*</span></label>
                                    <input type="text" name="judul_banner" id="judul_banner" class="form-control"
                                           value="{{ old('judul_banner', $banner->judul_banner) }}" required>
                                </div>

                                <!-- Link -->
                                <div class="col-md-6">
                                    <label for="link" class="form-label">Link</label>
                                    <input type="url" name="link" id="link" class="form-control"
                                           value="{{ old('link', $banner->link) }}" placeholder="https://contoh.com">
                                </div>

                                <!-- Keterangan -->
                                <div class="col-md-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                              placeholder="Tuliskan keterangan tambahan">{{ old('keterangan', $banner->keterangan) }}</textarea>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status1" id="status1" class="form-select" required>
                                        <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>

                                <!-- Gambar -->
                                <div class="col-md-6">
                                    <label for="gambar" class="form-label">Gambar Banner</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,.jpeg,.png">
                                    @if($banner->path_gambar && file_exists(public_path($banner->path_gambar)))
                                        <small class="text-muted">Gambar saat ini:</small><br>
                                        <img src="{{ asset($banner->path_gambar) }}" alt="banner"
                                             class="img-thumbnail mt-1 shadow-sm" width="150">
                                    @else
                                        <small class="text-muted">Belum ada gambar</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('banner_Web.index') }}" class="btn btn-light">
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
