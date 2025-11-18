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
                            <h5 class="card-title mb-4 text-primary"><i class="fas fa-plus-circle"></i> Form Tambah Blog</h5>

                            <form action="{{ route('blog_web.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">

                                     <!-- Web -->
                                    <div class="col-md-3">
                                        <label for="judul" class="form-label">Nama Website <span class="text-danger">*</span></label>
                                        <select name="nama_web" id="nama_web" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            @foreach ($website as $web)
                                                <option value="{{ $web->id }}">{{ $web->nama_web }} - {{ $web->sub_web }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Judul -->
                                    <div class="col-md-3">
                                        <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                                        <input type="text" name="judul" id="judul" class="form-control"
                                            placeholder="Masukkan judul blog" required>
                                    </div>

                                    <!-- Kategori -->
                                    <div class="col-md-3">
                                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                                        <input type="text" name="kategori" id="kategori" class="form-control"
                                            placeholder="Masukkan kategori blog" required>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-3">
                                        <label for="status1" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select name="status1" id="status1" class="form-select" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="nonaktif">Nonaktif</option>
                                        </select>
                                    </div>

                                    <!-- Isi Blog -->
                                    <div class="col-12">
                                        <label for="isi" class="form-label">Isi Blog <span class="text-danger">*</span></label>
                                        <textarea id="elm1" name="isi"></textarea>
                                    </div>

                                    <!-- Upload Gambar 1 -->
                                    <div class="col-md-4">
                                        <label for="gambar1" class="form-label">Gambar 1</label>
                                        <input type="file" name="gambar1" id="gambar1" class="form-control"
                                            accept=".jpg,.jpeg,.png" required>
                                        <small class="text-muted">Format: jpg, jpeg, png</small>
                                    </div>

                                    <!-- Upload Gambar 2 -->
                                    <div class="col-md-4">
                                        <label for="gambar2" class="form-label">Gambar 2</label>
                                        <input type="file" name="gambar2" id="gambar2" class="form-control"
                                            accept=".jpg,.jpeg,.png">
                                        <small class="text-muted">Opsional</small>
                                    </div>

                                    <!-- Upload Gambar 3 -->
                                    <div class="col-md-4">
                                        <label for="gambar3" class="form-label">Gambar 3</label>
                                        <input type="file" name="gambar3" id="gambar3" class="form-control"
                                            accept=".jpg,.jpeg,.png">
                                        <small class="text-muted">Opsional</small>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('blog_web.index') }}" class="btn btn-light">
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



    <!-- TinyMCE (contoh pakai cdn) -->


