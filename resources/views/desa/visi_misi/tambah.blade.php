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
                            <label>Upload Gambar Visi </label>
                            <input type="file" name="gambar_visi" id="gambar_visi" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Upload Gambar Misi </label>
                            <input type="file" name="gambar_misi" id="gambar_misi" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                      
                        <div class="col-md-3 mt-3">
                            <label>Keterangan </label>
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


                        <div class="col-md-12 mt-5">                                                  
                            <label>Visi </label>
                            <textarea id="visi_editor" name="visi"></textarea>
                           
                        </div>

                        <div class="col-md-12 mt-3">                                                  
                            <label>Misi </label>
                            <textarea id="misi_editor" name="misi" placeholder="Masukkan Misi"></textarea>
                       
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
{{-- <script src="{{ asset('assets/pages/jquery.form-upload.init.js') }}"></script>  --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: '#visi_editor, #misi_editor',
            height: 300,
        });
    });

    $('#simpanVisi').click(function () {
            let formData = new FormData();

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('keterangan', $('#keterangan').val());
            formData.append('status1', $('#status1').val());
            formData.append('visi', tinymce.get("visi_editor").getContent());
            formData.append('misi', tinymce.get("misi_editor").getContent());

            // Cek dan tambahkan file jika ada
            if ($('#gambar_visi')[0].files[0]) {
                formData.append('gambar_visi', $('#gambar_visi')[0].files[0]);
            }

            if ($('#gambar_misi')[0].files[0]) {
                formData.append('gambar_misi', $('#gambar_misi')[0].files[0]);
            }
          
            $.ajax({
                type: "POST",
                url: "{{ route('desa_visi.store') }}",
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
                            window.location = APP_URL + '/desa_visi';
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
