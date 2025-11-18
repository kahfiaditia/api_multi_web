@extends('upcube.central')
@section('datacontent')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start Page Title -->
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
            <!-- End Page Title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-light py-3">
                            <h5 class="card-title mb-0 text-primary">
                                <i class="fas fa-plus-circle me-2"></i>Form Tambah Profil Perusahaan
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profil_web.store') }}" method="POST" enctype="multipart/form-data" id="form-profil">
                                @csrf
                                
                                <div class="row g-3">
                                    <!-- Informasi Perusahaan -->
                                    <div class="col-12">
                                        <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                                            <i class="fas fa-building me-2"></i>Informasi Perusahaan
                                        </h6>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nama_pt" class="form-label fw-semibold">
                                            Nama Perusahaan <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nama_pt" id="nama_pt" class="form-control" 
                                               placeholder="Masukkan nama perusahaan" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nama_web" class="form-label fw-semibold">Domain</label>
                                        <div class="input-group">
                                            <span class="input-group-text">https://</span>
                                            <input type="text" name="nama_web" id="nama_web" class="form-control" 
                                                   placeholder="perusahaan.com">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="sub_web" class="form-label fw-semibold">Sub Domain</label>
                                        <div class="input-group">
                                            <span class="input-group-text">https://</span>
                                            <input type="text" name="sub_web" id="sub_web" class="form-control" 
                                                   placeholder="subdomain.perusahaan.com">
                                        </div>
                                    </div>

                                    <!-- Alamat Perusahaan -->
                                    <div class="col-12 mt-4">
                                        <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                                            <i class="fas fa-map-marker-alt me-2"></i>Alamat Perusahaan
                                        </h6>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="alamat_lengkap" class="form-label fw-semibold">Alamat Lengkap</label>
                                        <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control" rows="3"
                                                  placeholder="Masukkan alamat lengkap perusahaan"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="alamat_cabang" class="form-label fw-semibold">Alamat Cabang</label>
                                        <textarea name="alamat_cabang" id="alamat_cabang" class="form-control" rows="3"
                                                  placeholder="Masukkan alamat cabang perusahaan (opsional)"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="alamat_workshop" class="form-label fw-semibold">Alamat Workshop</label>
                                        <textarea name="alamat_workshop" id="alamat_workshop" class="form-control" rows="3"
                                                  placeholder="Masukkan alamat workshop perusahaan (opsional)"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="alamat_lain" class="form-label fw-semibold">Alamat Lainnya</label>
                                        <textarea name="alamat_lain" id="alamat_lain" class="form-control" rows="3"
                                                  placeholder="Masukkan alamat lainnya (opsional)"></textarea>
                                    </div>

                                    <!-- Kontak & Informasi -->
                                    <div class="col-12 mt-4">
                                        <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                                            <i class="fas fa-phone-alt me-2"></i>Kontak & Informasi
                                        </h6>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="telepon_1" class="form-label fw-semibold">Telepon</label>
                                        <input type="text" name="telepon_1" id="telepon_1" class="form-control" 
                                               placeholder="Contoh: (021) 1234567">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="telepon_2" class="form-label fw-semibold">Nomor HP/WhatsApp</label>
                                        <input type="text" name="telepon_2" id="telepon_2" class="form-control" 
                                               placeholder="Contoh: 0812-3456-7890">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email_1" class="form-label fw-semibold">Email Utama</label>
                                        <input type="email" name="email_1" id="email_1" class="form-control" 
                                               placeholder="email@utama.com">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email_2" class="form-label fw-semibold">Email Cadangan</label>
                                        <input type="email" name="email_2" id="email_2" class="form-control" 
                                               placeholder="email@cadangan.com">
                                    </div>

                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi Perusahaan</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"
                                                  placeholder="Tuliskan deskripsi singkat tentang perusahaan"></textarea>
                                    </div>

                                    <!-- Pengaturan -->
                                    <div class="col-12 mt-4">
                                        <h6 class="text-uppercase text-muted mb-3 border-bottom pb-2">
                                            <i class="fas fa-cogs me-2"></i>Pengaturan
                                        </h6>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status1" class="form-label fw-semibold">Status</label>
                                        <select name="status1" id="status1" class="form-select">
                                            <option value="aktif">Aktif</option>
                                            <option value="nonaktif">Non Aktif</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="gambar" class="form-label fw-semibold">Logo Perusahaan</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control" 
                                               accept=".jpg,.jpeg,.png,.gif">
                                        <div class="form-text">Format: JPG, PNG, GIF (Maks. 2MB)</div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end gap-2 border-top pt-4">
                                            <a href="{{ route('profil_web.index') }}" class="btn btn-light px-4">
                                                <i class="fas fa-arrow-left me-2"></i> Kembali
                                            </a>
                                            <button type="reset" class="btn btn-outline-secondary px-4">
                                                <i class="fas fa-redo me-2"></i> Reset
                                            </button>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fas fa-save me-2"></i> Simpan Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection