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
                    <a href="{{ route('desa_galery.index') }}" class="btn btn-sm btn-outline-primary">
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

                        <div class="col-md-6 mt-3">
                            <label>Judul Galery <code>*</code></label>
                            <input type="text" name="judul_galery" id="judul_galery" class="form-control" placeholder="Masukkan Judul Galery" required>

                        </div>

                         
                        <div class="col-md-6 mt-3">
                            <label>Keterangan </label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea>

                        </div>


                        <div class="col-md-6 mt-3">
                            <label>Foto 1 </label>
                            <input type="file" name="foto_1" id="foto_1" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        

                        <div class="col-md-6 mt-3">
                            <label>Foto 2 </label>
                            <input type="file" name="foto_2" id="foto_2" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Foto 3 </label>
                            <input type="file" name="foto_3" id="foto_3" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Foto 5 </label>
                            <input type="file" name="foto_4" id="foto_4" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Foto 5 </label>
                            <input type="file" name="foto_5" id="foto_5" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>Foto 6 </label>
                            <input type="file" name="foto_6" id="foto_6" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                     
                       

                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        <div class="mx-2"></div>
                        <button type="button" class="btn btn-primary btn-sm" id="simpanVisi">Simpan</button>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: '#visi_editor, #misi_editor',
            height: 300,
        });
    });

    $('#simpanVisi').click(function () {
            let formData = new FormData();
            judul_galery

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('judul_galery', $('#judul_galery').val());
            formData.append('keterangan', $('#keterangan').val());

            // Cek dan tambahkan file jika ada
            if ($('#foto_1')[0].files[0]) {
                formData.append('foto_1', $('#foto_1')[0].files[0]);
            }

            if ($('#foto_2')[0].files[0]) {
                formData.append('foto_2', $('#foto_2')[0].files[0]);
            }

            if ($('#foto_3')[0].files[0]) {
                formData.append('foto_3', $('#foto_3')[0].files[0]);
            }

            if ($('#foto_4')[0].files[0]) {
                formData.append('foto_4', $('#foto_4')[0].files[0]);
            }

            if ($('#foto_5')[0].files[0]) {
                formData.append('foto_5', $('#foto_5')[0].files[0]);
            }

            if ($('#foto_6')[0].files[0]) {
                formData.append('foto_6', $('#foto_6')[0].files[0]);
            }

            
            $.ajax({
                type: "POST",
                url: "{{ route('desa_galery.store') }}",
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
                            window.location = APP_URL + '/desa_galery';
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
