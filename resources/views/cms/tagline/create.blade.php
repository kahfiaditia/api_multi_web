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
                                <i class="fas fa-plus-circle"></i> Form Tambah Tagline
                            </h5>

                            <!-- TAMPILKAN ERROR VALIDASI -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h6 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> Terjadi Kesalahan!</h6>
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('tagline_web.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="nama_web" class="form-label">Pilih Website <span class="text-danger">*</span></label>
                                        <select name="nama_web" id="nama_web" class="form-control" required>
                                            <option value=""> -- Pilih -- </option>
                                            @foreach ($website as $data )
                                                <option value="{{ $data->id }}" {{ old('nama_web') == $data->id ? 'selected' : '' }}>
                                                    {{ $data->nama_web }} - {{ $data->sub_web }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nama_web')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Judul -->
                                    <div class="col-md-4">
                                        <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                                        <input type="text" name="judul" id="judul" class="form-control"
                                               placeholder="Masukkan judul tagline" maxlength="25"
                                               value="{{ old('judul') }}" required>
                                        @error('judul')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-md-4">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                               placeholder="Masukkan deskripsi singkat" maxlength="50"
                                               value="{{ old('deskripsi') }}">
                                        @error('deskripsi')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Isi -->
                                    <div class="col-12">
                                        <label for="isi" class="form-label">Isi</label>
                                        <textarea id="isi" name="isi" rows="4" class="form-control"
                                                  placeholder="Tuliskan isi tagline">{{ old('isi') }}</textarea>
                                        @error('isi')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Icon -->
                                    <div class="col-md-6">
                                        <label for="icon" class="form-label">Icon</label>
                                        <input type="text" name="icon" id="icon" class="form-control"
                                               placeholder="Masukkan class icon (opsional)" maxlength="20"
                                               value="{{ old('icon') }}">
                                        @error('icon')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Contoh: fas fa-star</small>
                                    </div>

                                    <!-- Upload Gambar -->
                                    <div class="col-md-6">
                                        <label for="path_gambar" class="form-label">Upload Gambar</label>
                                        <input type="file" name="path_gambar" id="path_gambar" class="form-control"
                                               accept=".jpg,.jpeg,.png">
                                        @error('path_gambar')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Format: jpg, jpeg, png (Maks: 2MB)</small>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label for="status1" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select name="status1" id="status1" class="form-select" required>
                                            <option value=""> -- Pilih --</option>
                                            <option value="Aktif" {{ old('status1') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="Nonaktif" {{ old('status1') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                        </select>
                                        @error('status1')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('tagline_web.index') }}" class="btn btn-light">
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

    <!-- Simple JavaScript untuk Debug -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Form Tagline Loaded');

            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                console.log('Form submitted!');

                // Validasi sederhana
                const namaWeb = document.getElementById('nama_web').value;
                const judul = document.getElementById('judul').value;
                const status1 = document.getElementById('status1').value;

                if (!namaWeb || !judul || !status1) {
                    e.preventDefault();
                    alert('Harap lengkapi semua field yang wajib diisi!');
                    return false;
                }

                console.log('All fields valid, submitting form...');
            });
        });
    </script>
@endsection
