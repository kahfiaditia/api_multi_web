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
                                <i class="fas fa-plus-circle"></i> Form Tambah {{ $submenu }}
                            </h5>

                            <form action="{{ route('sambutan_web.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <!-- Nama -->

                                    <div class="col-md-6">
                                        <label for="nama_web" class="form-label">Nama Website <span
                                                class="text-danger">*</span></label>
                                        <select name="nama_web" id="nama_web" class="form-control" required>
                                            <option value="" disabled selected>Pilih Nama Website</option>
                                            @foreach ($website as $web)
                                                <option value="{{ $web->id }}">{{ $web->nama_web }} ({{ $web->sub_web }})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="nama" class="form-label">Nama Sambutan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            placeholder="Masukkan nama sambutan" required>
                                    </div>

                                    <!-- Area -->
                                    <div class="col-md-6">
                                        <label for="area" class="form-label">Area</label>
                                        <textarea name="area" id="elm1" class="form-control" rows="3"
                                            placeholder="Tuliskan area sambutan"></textarea>
                                    </div>

                                    <!-- Foto -->
                                    <div class="col-md-6">
                                        <label for="path_sambutan" class="form-label">Foto Sambutan</label>
                                        <input type="file" name="path_sambutan" id="elm1" class="form-control"
                                            accept=".jpg,.jpeg,.png">
                                        <small class="text-muted">Format: jpg, jpeg, png | Max 2MB</small>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label for="status1" class="form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status1" id="status1" class="form-select" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Nonaktif</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('sambutan_web.index') }}" class="btn btn-light">
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
