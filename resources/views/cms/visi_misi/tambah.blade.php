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
                        <h5 class="card-title mb-4 text-primary"><i class="fas fa-plus-circle"></i> Form Tambah Visi & Misi</h5>

                        <form action="{{ route('visi_misi_web.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Keterangan -->
                                <div class="col-md-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" rows="2"
                                              placeholder="Tuliskan keterangan singkat">{{ old('keterangan') }}</textarea>
                                </div>

                                <!-- Visi -->
                                <div class="col-md-12">
                                    <label for="visi" class="form-label">Visi <span class="text-danger">*</span></label>
                                    <textarea name="visi" id="visi" class="form-control editor" rows="4" 
                                              placeholder="Tuliskan visi organisasi" required>{{ old('visi') }}</textarea>
                                </div>

                                <!-- Gambar Visi -->
                                <div class="col-md-6">
                                    <label for="path_gambar_visi" class="form-label">Gambar Visi</label>
                                    <input type="file" name="path_gambar_visi" id="path_gambar_visi" class="form-control" 
                                           accept=".jpg,.jpeg,.png">
                                    <small class="text-muted">Format: jpg, jpeg, png | Max 2MB</small>
                                </div>

                                <!-- Misi -->
                                <div class="col-md-12">
                                    <label for="misi" class="form-label">Misi <span class="text-danger">*</span></label>
                                    <textarea name="misi" id="misi" class="form-control editor" rows="5" 
                                              placeholder="Tuliskan misi organisasi" required>{{ old('misi') }}</textarea>
                                </div>

                                <!-- Gambar Misi -->
                                <div class="col-md-6">
                                    <label for="path_gambar_misi" class="form-label">Gambar Misi</label>
                                    <input type="file" name="path_gambar_misi" id="path_gambar_misi" class="form-control" 
                                           accept=".jpg,.jpeg,.png">
                                    <small class="text-muted">Format: jpg, jpeg, png | Max 2MB</small>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status1" class="form-label">Status</label>
                                    <select name="status1" id="status1" class="form-select">
                                        <option value="1" {{ old('status1') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('status1') == '0' ? 'selected' : '' }}>Non Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('visi_misi_web.index') }}" class="btn btn-light">
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
        selector: '.editor',
        height: 400,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code',
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | removeformat | help'
    });
</script>
@endsection
