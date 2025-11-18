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
                            <h5 class="card-title mb-4 text-primary">
                                <i class="fas fa-plus-circle"></i> Form Tambah Promo
                            </h5>

                            <form action="{{ route('promo_web.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">

                                    <!-- Nama Promo -->
                                    <div class="col-md-6">
                                        <label for="nama_promo" class="form-label">Nama Promo <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_promo" id="nama_promo"
                                            class="form-control @error('nama_promo') is-invalid @enderror"
                                            placeholder="Masukkan nama promo" value="{{ old('nama_promo') }}" required>
                                        @error('nama_promo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Order -->
                                    <div class="col-md-3">
                                        <label for="order" class="form-label">Order <span class="text-danger">*</span></label>
                                        <input type="text" name="order" id="order"
                                            class="form-control @error('order') is-invalid @enderror"
                                            placeholder="001" value="{{ old('order') }}" maxlength="3" required>
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-3">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select name="status1" id="status1" class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="">-- Pilih Status --</option>
                                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Upload Gambar -->
                                    <div class="col-md-6">
                                        <label for="path_gambar" class="form-label">Gambar <span class="text-danger">*</span></label>
                                        <input type="file" name="path_gambar" id="path_gambar"
                                            class="form-control @error('path_gambar') is-invalid @enderror"
                                            accept=".jpg,.jpeg,.png" required>
                                        <small class="text-muted">Format: jpg, jpeg, png</small>
                                        @error('path_gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Icon -->
                                    <div class="col-md-6">
                                        <label for="icon" class="form-label">Icon</label>
                                        <textarea name="icon" id="icon" rows="2"
                                            class="form-control @error('icon') is-invalid @enderror"
                                            placeholder="Masukkan kode/icon promo">{{ old('icon') }}</textarea>
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Link -->
                                    <div class="col-md-6">
                                        <label for="link" class="form-label">Link</label>
                                        <input type="text" name="link" id="link"
                                            class="form-control @error('link') is-invalid @enderror"
                                            placeholder="Masukkan link promo" value="{{ old('link') }}">
                                        @error('link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea id="elm1" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('promo_web.index') }}" class="btn btn-light">
                                        <i class="fas fa-arrow-left"></i> Batal
                                    </a>
                                    <button type="submit" class="btn btn-success">
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

    <!-- TinyMCE -->
    <script>
        tinymce.init({
            selector: '#elm1',
            height: 300,
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | help'
        });
    </script>
@endsection
