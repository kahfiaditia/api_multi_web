@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tambah {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">Tambah {{ $submenu }}</li>
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
                        <h5 class="card-title mb-4 text-primary"><i class="fas fa-plus-circle"></i> Form Tambah Sosial Media</h5>

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

                        <form action="{{ route('sosial_web.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Nama Media -->
                                <div class="col-md-6">
                                    <label for="nama_media" class="form-label">Nama Media <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_media" id="nama_media"
                                           class="form-control" placeholder="Contoh: Facebook, Instagram"
                                           value="{{ old('nama_media') }}" required>
                                </div>

                                <!-- Link -->
                                <div class="col-md-6">
                                    <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
                                    <input type="url" name="link" id="link"
                                           class="form-control" placeholder="https://facebook.com/yourpage"
                                           value="{{ old('link') }}" required>
                                </div>

                                <!-- Keterangan -->
                                <div class="col-md-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan"
                                              class="form-control" rows="3"
                                              placeholder="Tuliskan keterangan singkat">{{ old('keterangan') }}</textarea>
                                </div>

                                <!-- Logo -->
                                <div class="col-md-6">
                                    <label for="path_logo" class="form-label">Logo Media</label>
                                    <input type="file" name="path_logo" id="path_logo"
                                           class="form-control" accept=".jpg,.jpeg,.png">
                                    <small class="text-muted">Format: jpg, jpeg, png | Max 2MB</small>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status1" id="status1" class="form-select">
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Non Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('sosial_web.index') }}" class="btn btn-light">
                                    <i class="fas fa-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
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
