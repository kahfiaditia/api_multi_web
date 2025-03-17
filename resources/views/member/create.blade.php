@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">{{ $submenu }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $submenu }}</a></li>
                        <li class="breadcrumb-item active">{{ $level }}</li>
                    </ol>
                </div><!--end col-->
                <div class="col-auto align-self-center">
                    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                        <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                        <span class="" id="Select_date">Jan 11</span>
                        <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                    </a>
                    <a href="{{ route('surat_pemberitahuan.index') }}" class="btn btn-sm btn-outline-primary">
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
                <h4 class="card-title">{{ $submenu }}</h4>
                <p class="text-muted mb-0">Ini Harus Disisi.</p>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Foto</label>
                                    <input type="file" name="foto_member" id="foto_member" class="form-control" accept=".jpg, .jpeg, .png" />
                                </div>
                
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">NIS / NIK <code>*</code></label>
                                    <input type="number" maxlength="20" id="nis" name="nis" class="form-control" placeholder="Masukan NIS" autocomplete="off" required />
                                </div>
                
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Nama <code>*</code></label>
                                    <input type="text" maxlength="40" id="nama" name="nama" class="form-control" placeholder="Masukan Nama" autocomplete="off" required />
                                </div>
                
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Jenis Kelamin <code>*</code></label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value=""> -- Pilih -- </option>
                                        <option value="Laki-laki"> Laki-Laki </option>
                                        <option value="Perempuan"> Perempuan </option>
                                    </select>
                                </div>
                
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Tanggal Lahir <code>*</code></label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" autocomplete="off" required />
                                </div>
                
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Telepon <code>*</code></label>
                                    <input type="text" maxlength="15" id="telepon" name="telepon" class="form-control" placeholder="Masukan Telepon" autocomplete="off" required />
                                </div>
                
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Email <code>*</code></label>
                                    <input type="email" maxlength="40" id="email" name="email" class="form-control" placeholder="Masukan Email" autocomplete="off" required />
                                </div>
                
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Alamat <code>*</code></label>
                                    <textarea id="alamat" name="alamat" class="form-control" placeholder="Masukan Alamat" required></textarea>
                                </div>
                
                            </div>
                        </div>
                    </div>
                
                    <div class="d-flex justify-content-end mt-3">
                        <button type="reset" class="btn btn-secondary btn-sm" id="btnCancel">Kembali</button>
                        <div class="mx-2"></div>
                        <button type="submit" id="buat_surat" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('../plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-editor.init.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
            let pilihNomor = document.getElementById("pilih_nomor");
            let nomorSurat = document.getElementById("nomor_surat");

            // Nonaktifkan input nomor surat saat pertama kali dimuat
            nomorSurat.disabled = true;

            pilihNomor.addEventListener("change", function () {
                if (this.value === "2") { // Manual
                    nomorSurat.disabled = false;
                } else { // Otomatis atau tidak dipilih
                    nomorSurat.disabled = true;
                }
            });
    });

    $(document).ready(function () {
            $("#buat_surat").click(function (e) {
                e.preventDefault();

                let tanggal_surat = $("#tanggal_surat").val();
                let pilih_nomor = $("#pilih_nomor").val();
                let nomor_surat = $("#nomor_surat").val();
                let lampiran = $("#lampiran").val();
                let nama_pengirim = $("#nama_pengirim").val();
                let jabatan_pengirim = $("#jabatan_pengirim").val();
                let nip_pengirim = $("#nip_pengirim").val();
                let perihal = $("#perihal").val();
                let untuk = $("#untuk").val();
                let tembusan = $("#tembusan").val();
                let isi_surat = tinymce.get("elm1").getContent(); // Ambil isi dari TinyMCE
                let _token = "{{ csrf_token() }}"; // Laravel CSRF Token

                let errors = [];

                // Validasi form input
                if (tanggal_surat === "") errors.push("Tanggal harus diisi");
                if (lampiran === "") errors.push("Lampiran harus diisi");
                if (nama_pengirim === "") errors.push("Nama Pengirim harus diisi");
                if (jabatan_pengirim === "") errors.push("Jabatan Pengirim harus diisi");
                if (perihal === "") errors.push("Perihal harus diisi");
                if (untuk === "") errors.push("Untuk harus diisi");
                if (isi_surat === "") errors.push("Isi Surat harus diisi");

                if (errors.length > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Form Tidak Lengkap!',
                        html: `<b>Mohon isi field berikut:</b><br>${errors.join('<br>')}`,
                        confirmButtonColor: '#d33'
                    });
                    return;
                }

                // Simpan semua data ke dalam variabel `data_surat`
                let data_surat = {
                    tanggal_surat: tanggal_surat,
                    pilih_nomor: pilih_nomor,
                    nomor_surat: nomor_surat,
                    lampiran: lampiran,
                    nama_pengirim: nama_pengirim,
                    jabatan_pengirim: jabatan_pengirim,
                    nip_pengirim: nip_pengirim,
                    perihal: perihal,
                    untuk: untuk,
                    tembusan: tembusan,
                    isi_surat: isi_surat
                };

                console.log(data_surat); // Debugging: cek data di console

                // Kirim data menggunakan AJAX
                $.ajax({
                        type: "POST",
                        url: "{{ route('surat_pemberitahuan.store') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'data_kirim': data_surat
                        },
                        success: (response) => {
                            // console.log(response);
                            if (response.code === 200) {
                                Swal.fire(
                                    'Success',
                                    'Data Penerima Berhasil di masukan',
                                    'success'
                                ).then(() => {
                                    var APP_URL = {!! json_encode(url('/')) !!}
                                    window.location = APP_URL + '/surat_pemberitahuan';
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terdapat dua barang yang sama',
                                    showConfirmButton: false,
                                    timer: 1500,
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
    });

</script> --}}

@endsection