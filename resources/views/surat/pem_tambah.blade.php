@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Surat Pemberitahuan</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dastyle</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Advanced</li>
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
                <h4 class="card-title">Tujuan Surat Pemberitahuan</h4>
                <p class="text-muted mb-0">Ini Harus Disisi oleh Nama Pengirim.</p>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form >
                   
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Tanggal Surat<code>*</code></label>
                                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Pilih Nomor Surat<code>*</code></label>
                                    <select id="pilih_nomor" name="pilih_nomor"  class="form-control">
                                        <option value=""> -- Pilih -- </option>
                                        <option value="1"> Otomatis </option>
                                        <option value="2"> Manual </option>
                                    </select>
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Nomor Surat</label>
                                    <input type="text" maxlength="40" id="nomor_surat" name="nomor_surat"  class="form-control" placeholder="Nomor Surat" autocomplete="off" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Lampiran<code>*</code></label>
                                    <select name="lampiran" id="lampiran" class="form-control">
                                        <option value=""> -- Pilih -- </option>
                                        <option value="1"> 1 Berkas </option>
                                        <option value="2"> 2 Berkas </option>
                                        <option value="3"> 3 Berkas </option>
                                        <option value="4"> 4 Berkas </option>
                                        <option value="5"> 5 Berkas </option>
                                        <option value="6"> 6 Berkas </option>
                                        <option value="7"> 7 Berkas </option>
                                        <option value="8"> 8 Berkas </option>
                                        <option value="9"> 9 Berkas </option>
                                        <option value="10"> 10 Berkas </option>
                                        <option value="11"> Tidak ada Berkas </option>
                                    </select>
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Nama Pengirim<code>*</code></label>
                                    <input type="text" maxlength="40" id="nama_pengirim" name="nama_pengirim"  class="form-control" placeholder="Nama Pengirim" autocomplete="off" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Jabatan Pengirim<code>*</code></label>
                                    <input type="text" maxlength="40" id="jabatan_pengirim" name="jabatan_pengirim"  class="form-control" placeholder="Jabatan Pengirim" autocomplete="off" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">NIP/NIK Pengirim<code>*</code></label>
                                    <input type="text" maxlength="40" id="nip_pengirim" name="nip_pengirim"  class="form-control" placeholder="NIP/NIK Pengirim" autocomplete="off" />
                                </div>
                                

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Perihal<code>*</code></label>
                                    <input type="text" maxlength="40" name="perihal" id="perihal" class="form-control" placeholder="Hal Surat" autocomplete="off" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Ditujukan <code>Wajib</code></label>
                                    <form method="post">
                                        <textarea id="untuk" name="untuk" class="form-control" placeholder="Untuk"></textarea>
                                    </form>   
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Tembusan</label>
                                    <form method="post">
                                        <textarea id="tembusan" name="tembusan" class="form-control" placeholder="Tembusan"></textarea>
                                    </form>   
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label class="mb-2">Isi Surat</label>
                                    <form method="post">
                                        <textarea id="elm1" name="isi_surat"></textarea>
                                    </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        
                        <div class="d-flex justify-content-end mt-3">
                            <button type="reset" class="btn btn-secondary btn-sm" id="btnCancel">Kembali</button>
                            <div class="mx-2"></div> <button type="button" id="buat_surat" class="btn btn-primary btn-sm">Buat Surat</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

</script>

@endsection