@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- Judul -->
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

        <!-- Form -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <h5 class="card-title mb-4 text-primary">
                            <i class="fas fa-edit"></i> Form Edit Banner
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

                        <form action="{{ route('banner_web.update', Crypt::encryptString($banner->id)) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <!-- Website -->
                                <div class="col-md-3">
                                    <label for="nama_web" class="form-label">Pilih Website <span class="text-danger">*</span></label>
                                    <select name="nama_web" id="nama_web" class="form-control" required>
                                        <option value="">Pilih</option>
                                        @foreach ($website as $data)
                                            <option value="{{ $data->id }}"
                                                data-subweb="{{ $data->sub_web }}"
                                                {{ $banner->id_web == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama_web }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Sub Web -->
                                <div class="col-md-3">
                                    <label class="form-label">Sub Domain</label>
                                    <input type="text" id="sub_web" class="form-control" value="" readonly>
                                </div>

                                <!-- Judul -->
                                <div class="col-md-3">
                                    <label for="judul_banner" class="form-label">Judul Banner</label>
                                    <input type="text" name="judul_banner" id="judul_banner"
                                           class="form-control"
                                           value="{{ $banner->judul_banner }}" required>
                                </div>

                                <!-- Gambar -->
                                <div class="col-md-3">
                                    <label class="form-label">Gambar Saat Ini</label>
                                    <div>
                                        @if ($banner->path_gambar)
                                            <img src="{{ asset($banner->path_gambar) }}"
                                                 alt="Gambar Banner"
                                                 class="img-thumbnail"
                                                 style="max-height: 120px;">
                                        @else
                                            <p class="text-muted">Tidak ada gambar</p>
                                        @endif
                                    </div>

                                    <label for="gambar" class="form-label mt-2">Upload Gambar Baru</label>
                                    <input type="file" name="gambar" id="gambar"
                                           class="form-control" accept=".jpg,.jpeg,.png">
                                </div>

                                <!-- Link -->
                                <div class="col-md-12">
                                    <label for="link" class="form-label">Link Banner</label>
                                    <input type="url" name="link" id="link"
                                           class="form-control"
                                           value="{{ $banner->link }}">
                                </div>

                                <!-- Keterangan -->
                                <div class="col-md-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $banner->keterangan }}</textarea>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status1" class="form-label">Status</label>
                                    <select name="status1" id="status1" class="form-select">
                                        <option value="Aktif" {{ $banner->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Nonaktif" {{ $banner->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>

                            </div>

                            <!-- Buttons -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('banner_web.index') }}" class="btn btn-light">
                                    <i class="fas fa-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-warning">
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

<script>
    // Saat ganti website → update sub_web
    document.getElementById('nama_web').addEventListener('change', function() {
        let selected = this.options[this.selectedIndex];
        let subWeb = selected.getAttribute('data-subweb');
        document.getElementById('sub_web').value = subWeb ?? '';
    });
</script>
@endsection
