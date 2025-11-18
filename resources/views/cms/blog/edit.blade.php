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
                        <h5 class="card-title mb-4 text-warning"><i class="fas fa-edit"></i> Form Edit Blog</h5>

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

                        <form action="{{ route('blog_web.update', Crypt::encryptString($blog->id)) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="nama_web" class="form-label">Pilih Website <span class="text-danger">*</span></label>
                                    <select name="nama_web" id="nama_web" class="form-control" required>
                                        <option value="">Pilih</option>
                                        @foreach ($website as $data)
                                            <option value="{{ $data->id }}"
                                                data-subweb="{{ $data->sub_web }}"
                                                {{ $blog->id_web == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama_web }} - {{ $data->sub_web }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Judul -->
                                <div class="col-md-6">
                                    <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                                    <input type="text" name="judul" id="judul" class="form-control"
                                        value="{{ old('judul', $blog->judul) }}" required>
                                </div>

                                <!-- Kategori -->
                                <div class="col-md-6">
                                    <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <input type="text" name="kategori" id="kategori" class="form-control"
                                        value="{{ old('kategori', $blog->kategori) }}" required>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status1" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status1" id="status1" class="form-select" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="aktif" {{ old('status1', $blog->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="nonaktif" {{ old('status1', $blog->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>

                                <!-- Isi Blog -->
                                <div class="col-12">
                                    <label for="isi" class="form-label">Isi Blog <span class="text-danger">*</span></label>
                                    <textarea id="elm1" name="isi">{{ old('isi', $blog->isi) }}</textarea>
                                </div>

                                <!-- Upload Gambar 1 -->
                                <div class="col-md-4">
                                    <label for="path_gambar1" class="form-label">Gambar 1</label>
                                    <input type="file" name="path_gambar1" id="path_gambar1" class="form-control" accept="image/*">
                                    @if($blog->path_gambar1)
                                        <div class="mt-2">
                                            <img src="{{ asset($blog->path_gambar1) }}" alt="Gambar 1" class="img-thumbnail" width="120">
                                        </div>
                                    @endif
                                </div>

                                <!-- Upload Gambar 2 -->
                                <div class="col-md-4">
                                    <label for="path_gambar2" class="form-label">Gambar 2</label>
                                    <input type="file" name="path_gambar2" id="path_gambar2" class="form-control" accept="image/*">
                                    @if($blog->path_gambar2)
                                        <div class="mt-2">
                                            <img src="{{ asset($blog->path_gambar2) }}" alt="Gambar 2" class="img-thumbnail" width="120">
                                        </div>
                                    @endif
                                </div>

                                <!-- Upload Gambar 3 -->
                                <div class="col-md-4">
                                    <label for="path_gambar3" class="form-label">Gambar 3</label>
                                    <input type="file" name="path_gambar3" id="path_gambar3" class="form-control" accept="image/*">
                                    @if($blog->path_gambar3)
                                        <div class="mt-2">
                                            <img src="{{ asset($blog->path_gambar3) }}" alt="Gambar 3" class="img-thumbnail" width="120">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('blog_web.index') }}" class="btn btn-light">
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
