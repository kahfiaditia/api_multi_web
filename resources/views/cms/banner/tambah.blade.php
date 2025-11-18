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
                            <h5 class="card-title mb-4 text-primary"><i class="fas fa-plus-circle"></i> Form Tambah Banner</h5>

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

                            <form action="{{ route('banner_web.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <!-- Judul Banner -->

                                    <div class="col-md-3">
                                        <label for="nama_web" class="form-label">Pilih Website <span class="text-danger">*</span></label>
                                        <select name="nama_web" id="nama_web" class="form-control" required>
                                            <option value="">Pilih</option>
                                            @foreach ($website as $data )
                                                <option value="{{ $data->id }}" data-subweb="{{ $data->sub_web }}">{{ $data->nama_web }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="sub_web" class="form-label">Sub Domain <span class="text-danger">*</span></label>
                                        <input type="text" name="sub_web" id="sub_web" class="form-control"
                                            placeholder="Masukkan Sub Domain" readonly>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="judul_banner" class="form-label">Judul Banner <span class="text-danger">*</span></label>
                                        <input type="text" name="judul_banner" id="judul_banner" class="form-control"
                                            placeholder="Masukkan judul banner" required>
                                    </div>

                                    <!-- Gambar -->
                                    <div class="col-md-3">
                                        <label for="gambar" class="form-label">Upload Gambar <span class="text-danger">*</span></label>
                                        <input type="file" name="gambar" id="gambar" class="form-control"
                                            accept=".jpg,.jpeg,.png" required>
                                    </div>

                                    <!-- Link -->
                                    <div class="col-md-12">
                                        <label for="link" class="form-label">Link Banner</label>
                                        <input type="url" name="link" id="link" class="form-control"
                                            placeholder="Contoh: https://www.website.com">
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="col-md-12">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                            placeholder="Tuliskan keterangan singkat untuk banner"></textarea>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select name="status1" id="status1" class="form-select" required>
                                            <option value="">Pilih Status</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Nonaktif">Nonaktif</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('banner_web.index') }}" class="btn btn-light">
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
    <script>
            document.getElementById('nama_web').addEventListener('change', function() {
                    let selected = this.options[this.selectedIndex];
                    let subWeb = selected.getAttribute('data-subweb');

                    document.getElementById('sub_web').value = subWeb ?? '';
            });
    </script>
@endsection
