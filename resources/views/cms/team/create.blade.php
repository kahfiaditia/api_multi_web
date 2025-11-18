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
                                <i class="fas fa-user-plus"></i> Form Tambah Team
                            </h5>

                            <form action="{{ route('team_web.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">

                                     <!-- Nama Lengkap -->
                                    <div class="col-md-4">
                                        <label for="nama_lengkap" class="form-label fw-bold">Nama Webs <span
                                                class="text-danger">*</span></label>
                                        <select name="nama_web" id="nama_web" class="form-control" required>
                                            <option value="">-- Pilih Nama Web --</option>
                                            @foreach ($website as $web)
                                                <option value="{{ $web->id }}">{{ $web->nama_web }} - {{ $web->sub_web }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Nama Lengkap -->
                                    <div class="col-md-4">
                                        <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                            value="{{ old('nama_lengkap') }}" required>
                                    </div>

                                    <!-- NIP -->
                                    <div class="col-md-4">
                                        <label for="nip" class="form-label fw-bold">NIP</label>
                                        <input type="text" name="nip" id="nip" class="form-control"
                                            value="{{ old('nip') }}">
                                    </div>

                                    <!-- Jabatan -->
                                    <div class="col-md-6">
                                        <label for="jabatan" class="form-label fw-bold">Jabatan</label>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                                            value="{{ old('jabatan') }}">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-bold">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email') }}" required>
                                    </div>

                                    <!-- Telepon -->
                                    <div class="col-md-6">
                                        <label for="telepon" class="form-label fw-bold">Telepon</label>
                                        <input type="text" name="telepon" id="telepon" class="form-control"
                                            value="{{ old('telepon') }}">
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="col-md-6">
                                        <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" class="form-control"
                                            value="{{ old('keterangan') }}">
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-12">
                                        <label for="area" class="form-label fw-bold">Deskripsi</label>
                                        <textarea name="area" id="elm1" rows="3" class="form-control">{{ old('area') }}</textarea>
                                    </div>

                                    <!-- Foto -->
                                    <div class="col-md-6">
                                        <label for="path_foto" class="form-label fw-bold">Upload Foto</label>
                                        <input type="file" name="path_foto" id="path_foto" class="form-control"
                                            accept=".jpg,.jpeg,.png">
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label for="status" class="form-label fw-bold">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status1" id="status1" class="form-select" required>
                                            <option value="">-- Pilih -- </option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Nonaktif</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('team_web.index') }}" class="btn btn-light">
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
