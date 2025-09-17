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
                    <a href="" class="btn btn-sm btn-outline-primary">
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
                            <label>Nama Lengkap <code>*</code></label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>NIP <code>*</code></label>
                            <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP" required>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Jabatan <code>*</code></label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan Jabatan" required>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Upload Foto </label>
                            <input type="file" name="foto_perangkat" id="foto_perangkat" class="form-control" accept=".jpg,.jpeg,.png">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Telepon <code>*</code></label>
                            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan Nomor Telepon" required>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Email <code>*</code></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Keterangan <code>*</code></label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
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
            formData.append('nama_lengkap', $('#nama_lengkap').val());
            formData.append('nip', $('#nip').val());
            formData.append('jabatan', $('#jabatan').val());
            formData.append('telepon', $('#telepon').val());
            formData.append('email', $('#email').val());
            formData.append('keterangan', $('#keterangan').val());
            formData.append('status1', $('#status1').val());
            formData.append('area', tinymce.get("elm1").getContent());

            // Cek dan tambahkan file jika ada
            if ($('#foto_perangkat')[0].files[0]) {
                formData.append('foto_perangkat', $('#foto_perangkat')[0].files[0]);
            }
          
            $.ajax({
                type: "POST",
                url: "{{ route('desa_perangkat.store') }}",
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
                            window.location = APP_URL + '/desa_perangkat';
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
