@extends('welcome')
@section('isicontent')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">{{ $submenu }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ $menu }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $submenu }}</a></li>
                        <li class="breadcrumb-item active">{{ $level }}</li>
                    </ol>
                </div>
                <div class="col-auto align-self-center">
                    <a href="{{ route('desa_blog.index') }}" class="btn btn-sm btn-outline-primary">
                        <i data-feather="chevrons-left" class="align-self-center icon-xs"></i>
                    </a>
                </div>
            </div>                                                             
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Input Blog</h4>
                <p class="text-muted mb-0">Silakan isi data blog di bawah ini.</p>
            </div>
            <div class="card-body">
                <form id="formUpload" enctype="multipart/form-data">
                    
                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <label>Judul Kegiatan <code>*</code></label>
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Blog" required>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Kategori <code>*</code></label>
                            <input type="text" name="kategori" id="kategori" value="Kegiatan" class="form-control" placeholder="Masukkan Judul Blog" disabled>
                        </div>

                        <div class="col-md-12 mt-3">                                                  
                           
                                <textarea id="elm1" name="area"></textarea>
                           
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Upload Gambar </label>
                            <input type="file" name="gambar1" id="gambar1" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Upload Gambar (optional)</label>
                            <input type="file" name="gambar2" id="gambar2" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Upload Gambar (optional)</label>
                            <input type="file" name="gambar3" id="gambar3" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Status <code>*</code></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="draft">Draft</option>
                                <option value="publish">Publish</option>
                            </select>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        <div class="mx-2"></div>
                        <button type="button" class="btn btn-primary btn-sm" id="simpanBlog">Simpan</button>
                    </div>
                </form>
                <div id="preview"></div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan script jika menggunakan TinyMCE untuk textarea konten -->
<script src="{{ asset('../plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('assets/pages/jquery.form-upload.init.js') }}"></script>  --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: '#elm1',
            height: 300,
        });
    });

    $('#simpanBlog').click(function () {
            let formData = new FormData();

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('judul', $('#judul').val());
            formData.append('kategori', $('#kategori').val());
            formData.append('status', $('#status').val());
            formData.append('area', tinymce.get("elm1").getContent());

            // Cek dan tambahkan file jika ada
            if ($('#gambar1')[0].files[0]) {
                formData.append('gambar1', $('#gambar1')[0].files[0]);
            }
            if ($('#gambar2')[0].files[0]) {
                formData.append('gambar2', $('#gambar2')[0].files[0]);
            }
            if ($('#gambar3')[0].files[0]) {
                formData.append('gambar3', $('#gambar3')[0].files[0]);
            }

            $.ajax({
                type: "POST",
                url: "{{ route('desa_blog.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: (response) => {
                    
                    if (response.code === 200) {
                        Swal.fire(
                            'Success',
                            'Blog berhasil disimpan!',
                            'success'
                        ).then(() => {
                            var APP_URL = {!! json_encode(url('/')) !!};
                            window.location = APP_URL + '/desa_kegiatan';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.message || 'Terjadi kesalahan saat menyimpan data',
                        });
                    }
                },
                error: (err) => {
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan',
                        text: 'Silakan coba lagi atau hubungi administrator.',
                        confirmButtonColor: '#d33'
                    });
                }
            });
    });



</script>



@endsection
