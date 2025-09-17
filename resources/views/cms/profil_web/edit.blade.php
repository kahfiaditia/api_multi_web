@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">Edit {{ $submenu }}</li>
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
                        <h5 class="card-title mb-4 text-primary"><i class="fas fa-edit"></i> Form Edit Profil</h5>

                        <form action="{{ route('profil_web.update', Crypt::encryptString($profil->id)) }}" 
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <!-- Nama PT -->
                                <div class="col-md-6">
                                    <label for="nama_pt" class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_pt" id="nama_pt" class="form-control" 
                                           value="{{ old('nama_pt', $profil->nama_pt) }}" required>
                                </div>

                                <!-- Nama Web -->
                                <div class="col-md-6">
                                    <label for="nama_web" class="form-label">Nama Website</label>
                                    <input type="text" name="nama_web" id="nama_web" class="form-control" 
                                           value="{{ old('nama_web', $profil->nama_web) }}">
                                </div>

                                <!-- Alamat -->
                                <div class="col-md-12">
                                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control" rows="3">{{ old('alamat_lengkap', $profil->alamat_lengkap) }}</textarea>
                                </div>

                                <!-- Telepon -->
                                <div class="col-md-6">
                                    <label for="telepon_1" class="form-label">Telepon</label>
                                    <input type="text" name="telepon_1" id="telepon_1" class="form-control" 
                                           value="{{ old('telepon_1', $profil->telepon_1) }}">
                                </div>

                                <!-- HP -->
                                <div class="col-md-6">
                                    <label for="telepon_2" class="form-label">Nomor HP</label>
                                    <input type="text" name="telepon_2" id="telepon_2" class="form-control" 
                                           value="{{ old('telepon_2', $profil->telepon_2) }}">
                                </div>

                                <!-- Email utama -->
                                <div class="col-md-6">
                                    <label for="email_1" class="form-label">Email Utama</label>
                                    <input type="email" name="email_1" id="email_1" class="form-control" 
                                           value="{{ old('email_1', $profil->email_1) }}">
                                </div>

                                <!-- Email cadangan -->
                                <div class="col-md-6">
                                    <label for="email_2" class="form-label">Email Cadangan</label>
                                    <input type="email" name="email_2" id="email_2" class="form-control" 
                                           value="{{ old('email_2', $profil->email_2) }}">
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-12">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status1" class="form-label">Status</label>
                                    <select name="status1" id="status1" class="form-select">
                                        <option value="aktif" {{ $profil->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="nonaktif" {{ $profil->status == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                                    </select>
                                </div>

                                <!-- Logo -->
                                <div class="col-md-6">
                                    <label for="gambar" class="form-label">Logo / Gambar Perusahaan</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,.jpeg,.png">
                                    @if($profil->path_logo)
                                        <small class="text-muted">Gambar saat ini:</small><br>
                                        <img src="{{ asset($profil->path_logo) }}" alt="Logo" class="img-thumbnail mt-1" width="120">
                                    @endif
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('profil_web.index') }}" class="btn btn-light">
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
