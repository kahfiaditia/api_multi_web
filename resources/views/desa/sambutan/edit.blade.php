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
                <h4 class="card-title">Form Input {{ $submenu }}</h4>
                <p class="text-muted mb-0">Silakan isi data {{ $submenu }} di bawah ini.</p>
            </div>
            <div class="card-body">
                <form id="formUpload" enctype="multipart/form-data">
                    
                    <div class="row">

                       
                        <div class="col-md-3 mt-3">
                            <label>Upload Gambar </label>
                            <input type="file" name="gambar_sambutan" id="gambar_sambutan" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                      
                        <div class="col-md-4 mt-3">
                            <label>Keterangan <code>*</code></label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea>

                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Status </label>
                            <select name="status1" id="status1" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1">Aktif</option>
                                <option value="2">Nonaktif</option>
                            </select>
                        </div>


                        <div class="col-md-12 mt-3">                                                  
                           
                                <textarea id="elm1" name="area"></textarea>
                           
                        </div>

                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        <div class="mx-2"></div>
                        <button type="button" class="btn btn-primary btn-sm" id="simpanSambutan">Simpan</button>
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

    $('#simpanSambutan').click(function () {
            let formData = new FormData();

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('keterangan', $('#keterangan').val());
            formData.append('status1', $('#status1').val());
            formData.append('area', tinymce.get("elm1").getContent());

            // Cek dan tambahkan file jika ada
            if ($('#gambar_sambutan')[0].files[0]) {
                formData.append('gambar_sambutan', $('#gambar_sambutan')[0].files[0]);
            }
          
            $.ajax({
                type: "POST",
                url: "{{ route('desa_sambutan.store') }}",
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
                            window.location = APP_URL + '/desa_sambutan';
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
