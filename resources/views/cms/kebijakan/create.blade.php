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
                                <i class="fas fa-plus-circle"></i> Form Tambah Kebijakan Web
                            </h5>
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


                            <form action="{{ route('syarat_web.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <!-- Nama Syarat -->
                                    <div class="col-md-4">
                                        <label for="nama_kebijakan" class="form-label">
                                            Nama Kebijakan <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nama_syarat" id="nama_syarat" class="form-control"
                                            placeholder="Masukkan nama syarat" maxlength="25" required>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-4">
                                        <label for="status1" class="form-label">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select name="status1" id="status1" class="form-select" required>
                                            <option value="aktif">Aktif</option>
                                            <option value="nonaktif">Nonaktif</option>
                                        </select>
                                    </div>

                                     <!-- keterangan -->
                                    <div class="col-md-4">
                                        <label for="keterangan" class="form-label">
                                            Keterangan <span class="text-danger">*</span>
                                        </label>
                                        <select name="keterangan" id="keterangan" class="form-select" required>
                                            <option value="Syarat">Syarat</option>
                                            <option value="Kebijakan">Kebijakan</option>
                                        </select>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"
                                                  placeholder="Masukkan deskripsi syarat" maxlength="150"></textarea>
                                    </div>

                                    <!-- Syarat -->
                                    <div class="col-12">
                                        <label for="syarat" class="form-label">Detail Syarat</label>
                                        <textarea id="elm1" name="syarat"></textarea>
                                    </div>

                                    <!-- Upload Gambar -->
                                    <div class="col-md-6">
                                        <label for="path_gambar" class="form-label">Upload Gambar</label>
                                        <input type="file" name="path_gambar" id="path_gambar" class="form-control"
                                               accept=".jpg,.jpeg,.png">
                                        <small class="text-muted">Format: jpg, jpeg, png | Max 2MB</small>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('syarat_web.index') }}" class="btn btn-light">
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
        tinymce.init({
            selector: '#elm1',
            height: 400,
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | help'
        });
    </script>
@endsection
