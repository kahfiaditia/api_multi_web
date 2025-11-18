@extends('upcube.central')
@section('datacontent')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Start Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit {{ $submenu }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profil_web.index') }}">{{ $submenu }}</a></li>
                                <li class="breadcrumb-item active">Edit Data</li>
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
                                <i class="fas fa-edit me-2"></i>Edit Profil Perusahaan
                            </h5>
                        </div>
                        <div class="card-body">

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

                            <form action="{{ route('profil_web.update', Crypt::encryptString($profil->id)) }}" method="POST" enctype="multipart/form-data" id="form-profil">
                                @csrf
                                @method('PUT')

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
                                               value="{{ old('nama_pt', $profil->nama_pt) }}"
                                               placeholder="Masukkan nama perusahaan" required>
                                        @error('nama_pt')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nama_web" class="form-label fw-semibold">Domain</label>
                                        <div class="input-group">
                                            <span class="input-group-text">https://</span>
                                            <input type="text" name="nama_web" id="nama_web" class="form-control"
                                                   value="{{ old('nama_web', $profil->nama_web) }}"
                                                   placeholder="perusahaan.com">
                                        </div>
                                        @error('nama_web')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="sub_web" class="form-label fw-semibold">Sub Domain</label>
                                        <div class="input-group">
                                            <span class="input-group-text">https://</span>
                                            <input type="text" name="sub_web" id="sub_web" class="form-control"
                                                   value="{{ old('sub_web', $profil->sub_web) }}"
                                                   placeholder="subdomain.perusahaan.com">
                                        </div>
                                        @error('sub_web')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
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
                                                  placeholder="Masukkan alamat lengkap perusahaan">{{ old('alamat_lengkap', $profil->alamat_lengkap) }}</textarea>
                                        @error('alamat_lengkap')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="alamat_cabang" class="form-label fw-semibold">Alamat Cabang</label>
                                        <textarea name="alamat_cabang" id="alamat_cabang" class="form-control" rows="3"
                                                  placeholder="Masukkan alamat cabang perusahaan (opsional)">{{ old('alamat_cabang', $profil->alamat_cabang) }}</textarea>
                                        @error('alamat_cabang')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="alamat_workshop" class="form-label fw-semibold">Alamat Workshop</label>
                                        <textarea name="alamat_workshop" id="alamat_workshop" class="form-control" rows="3"
                                                  placeholder="Masukkan alamat workshop perusahaan (opsional)">{{ old('alamat_workshop', $profil->alamat_workshop) }}</textarea>
                                        @error('alamat_workshop')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="alamat_lain" class="form-label fw-semibold">Alamat Lainnya</label>
                                        <textarea name="alamat_lain" id="alamat_lain" class="form-control" rows="3"
                                                  placeholder="Masukkan alamat lainnya (opsional)">{{ old('alamat_lain', $profil->alamat_lain) }}</textarea>
                                        @error('alamat_lain')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
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
                                               value="{{ old('telepon_1', $profil->telepon_1) }}"
                                               placeholder="Contoh: (021) 1234567">
                                        @error('telepon_1')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="telepon_2" class="form-label fw-semibold">Nomor HP/WhatsApp</label>
                                        <input type="text" name="telepon_2" id="telepon_2" class="form-control"
                                               value="{{ old('telepon_2', $profil->telepon_2) }}"
                                               placeholder="Contoh: 0812-3456-7890">
                                        @error('telepon_2')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email_1" class="form-label fw-semibold">Email Utama</label>
                                        <input type="email" name="email_1" id="email_1" class="form-control"
                                               value="{{ old('email_1', $profil->email_1) }}"
                                               placeholder="email@utama.com">
                                        @error('email_1')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email_2" class="form-label fw-semibold">Email Cadangan</label>
                                        <input type="email" name="email_2" id="email_2" class="form-control"
                                               value="{{ old('email_2', $profil->email_2) }}"
                                               placeholder="email@cadangan.com">
                                        @error('email_2')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi Perusahaan</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"
                                                  placeholder="Tuliskan deskripsi singkat tentang perusahaan">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
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
                                            <option value="aktif" {{ old('status1', $profil->status1) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="nonaktif" {{ old('status1', $profil->status1) == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                                        </select>
                                        @error('status1')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="gambar" class="form-label fw-semibold">Logo Perusahaan</label>
                                        <input type="file" name="gambar" id="gambar" class="form-control"
                                               accept=".jpg,.jpeg,.png,.gif">
                                        <div class="form-text">Format: JPG, PNG, GIF (Maks. 2MB)</div>

                                        <!-- Preview Logo Saat Ini -->
                                        @if($profil->gambar)
                                            <div class="mt-2">
                                                <label class="form-label fw-semibold">Logo Saat Ini:</label>
                                                <div class="d-flex align-items-center gap-3">
                                                    <img src="{{ asset('storage/' . $profil->gambar) }}"
                                                         alt="Logo Perusahaan"
                                                         class="img-thumbnail"
                                                         style="max-width: 100px; max-height: 100px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hapus_gambar" id="hapus_gambar" value="1">
                                                        <label class="form-check-label text-danger small" for="hapus_gambar">
                                                            Hapus logo saat ini
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-muted small mt-1">Tidak ada logo yang diupload</div>
                                        @endif

                                        @error('gambar')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
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
                                                <i class="fas fa-save me-2"></i> Update Data
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

@push('scripts')
    <script>
        // Preview image sebelum upload
        document.getElementById('gambar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Hapus preview sebelumnya jika ada
                    const existingPreview = document.getElementById('preview-gambar');
                    if (existingPreview) {
                        existingPreview.remove();
                    }

                    // Buat preview baru
                    const previewDiv = document.createElement('div');
                    previewDiv.id = 'preview-gambar';
                    previewDiv.className = 'mt-2';
                    previewDiv.innerHTML = `
                        <label class="form-label fw-semibold">Preview Logo Baru:</label>
                        <div>
                            <img src="${e.target.result}" alt="Preview Logo" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                        </div>
                    `;
                    document.querySelector('input[name="gambar"]').closest('.col-md-6').appendChild(previewDiv);
                }
                reader.readAsDataURL(file);
            }
        });

        // Reset preview ketika form direset
        document.querySelector('button[type="reset"]').addEventListener('click', function() {
            const preview = document.getElementById('preview-gambar');
            if (preview) {
                preview.remove();
            }
        });
    </script>
@endpush
