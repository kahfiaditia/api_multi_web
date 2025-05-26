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
                    <a href="{{ route('desa_banner.index') }}" class="btn btn-sm btn-outline-primary">
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
                <h4 class="card-title">Form Edit {{ $submenu }}</h4>
                <p class="text-muted mb-0">Silakan isi data {{ $submenu }} di bawah ini.</p>
            </div>
            <div class="card-body">
                <form id="formUpload" enctype="multipart/form-data">
                    
                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <label>Judul Banner <code>*</code></label>
                            <input type="text" name="judul_banner" id="judul_banner" value="{{ old('judul_banner', $banner->judul_banner) }}" class="form-control" placeholder="Masukkan judul_banner" required>
                            <input type="hidden" name="id_banner" id="id_banner" value="{{ $banner->id }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Link </label>
                            <input type="text" name="link" id="link" class="form-control" value="{{ old('link', $banner->link) }}" placeholder="Masukkan Link Media" required>
                        </div>

                      
                        <div class="col-md-6 mt-3">
                            <label>Upload Gambar <code>*</code></label>
                            <input type="file" name="gambar_banner" id="gambar_banner" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        
                        <div class="col-md-6 mt-3">
                            <label>Keterangan <code>*</code></label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
                        </div>  

                        <div class="col-md-3 mt-3">
                            <label>status <code>*</code></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>  
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        <div class="mx-2"></div>
                        <button type="button" class="btn btn-primary btn-sm" id="simpanMedia">Simpan</button>
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
    // document.addEventListener("DOMContentLoaded", function () {
    //     // Inisialisasi TinyMCE jika diperlukan
    //     tinymce.init({
    //         selector: '#elm1',
    //         height: 300,
    //     });
    // });

    $('#simpanMedia').click(function () {
        let formData = new FormData();

        const id = $('#id_banner').val(); // ambil ID dari hidden input

        formData.append('_token', '{{ csrf_token() }}');
        formData.append('_method', 'PUT'); // karena update
        formData.append('judul_banner', $('#judul_banner').val());
        formData.append('link', $('#link').val());
        formData.append('keterangan', $('#keterangan').val());
        formData.append('status', $('#status').val());

        // Tambahkan file jika dipilih
        if ($('#gambar_banner')[0].files.length > 0) {
            formData.append('gambar_banner', $('#gambar_banner')[0].files[0]);
        }

        $.ajax({
            type: "POST",
            url: "/desa_banner/" + id,
            data: formData,
            processData: false,
            contentType: false,
            success: (response) => {
                if (response.code === 200) {
                    Swal.fire(
                        'Sukses',
                        'Data berhasil diperbarui!',
                        'success'
                    ).then(() => {
                        window.location.href = "{{ url('/desa_banner') }}";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message || 'Terjadi kesalahan saat memperbarui data.',
                    });
                }
            },
            error: (err) => {
                console.error(err);
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
