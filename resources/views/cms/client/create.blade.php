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
                                <i class="fas fa-plus-circle"></i> Form Tambah Client
                            </h5>

                            <form action="{{ route('client_web.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <!-- Nama Client -->
                                    <div class="col-md-6">
                                        <label for="client_name" class="form-label">
                                            Nama Client <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="client_name" id="client_name" class="form-control"
                                            placeholder="Masukkan nama client" required>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select name="status1" id="status1" class="form-select" required>
                                            <option value="aktif">Aktif</option>
                                            <option value="nonaktif">Nonaktif</option>
                                        </select>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control"
                                                  placeholder="Masukkan deskripsi client"></textarea>
                                    </div>

                                    <!-- Upload Gambar -->
                                    <div class="col-md-6">
                                        <label for="path_gambar" class="form-label">Upload Gambar</label>
                                        <input type="file" name="path_gambar" id="path_gambar" class="form-control"
                                               accept=".jpg,.jpeg,.png" required>
                                        <small class="text-muted">Format: jpg, jpeg, png | Max 2MB</small>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('client_web.index') }}" class="btn btn-light">
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
@endsection
