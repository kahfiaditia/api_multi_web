@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Form Advanced</h4>
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
                    <a href="#" class="btn btn-sm btn-outline-primary">
                        <i data-feather="download" class="align-self-center icon-xs"></i>
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
                <h4 class="card-title">Isi Data Penerima</h4>
                <p class="text-muted mb-0">Ini Harus Disisi oleh Nama Pengirim.</p>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form >
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label class="mb-2">Pilih Pengirim <code>Wajib</code></label>
                                    <select class="form-control" id="pilih_pengirim" name="pilih_pengirim" required>
                                        <option value="">-- Pilih --</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Data wajib diisi.
                                    </div>
                                    {!! $errors->first('pilih_pengirim', '<div class="invalid-validasi">:message</div>') !!}
                                </div>
                    
                                <div class="col-lg-3">
                                    <label class="mb-2">Kode Pengirim</label>
                                    <input type="text" maxlength="40" name="kode_pengirim" class="form-control" id="kode_pengirim" autocomplete="off" readonly/>
                                </div>
                    
                                <div class="col-lg-3">
                                    <label class="mb-2">Nama Perusahaan</label>
                                    <input type="text" maxlength="40" name="nama_perusahaan" class="form-control" id="nama_perusahaan" autocomplete="off" readonly/>
                                </div>
                    
                                <div class="col-lg-3">
                                    <label class="mb-2">Telepon Pengirim</label>
                                    <input type="text" maxlength="40" name="pengirim_telepon" class="form-control" id="pengirim_telepon" autocomplete="off" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Nama Penerima</label>
                                    <input type="text" maxlength="40" name="nama_penerima" id="nama_penerima" class="form-control"  autocomplete="off" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Divisi</label>
                                    <input type="text" maxlength="40" name="divisi_penerima" class="form-control" id="divisi_penerima" autocomplete="off" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Jabatan</label>
                                    <input type="text" maxlength="40" name="jabatan_penerima" id="jabatan_penerima" class="form-control" id="jabatan" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Telepon <code>Wajib</code></label>
                                    <input type="number" class="form-control" maxlength="18" name="telepon_penerima" id="telepon_penerima" required/>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label class="mb-2">Email</label>
                                    <input type="email" maxlength="35" name="email_penerima" class="form-control" id="email_penerima" />
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label class="mb-2">Alamat</label>
                                    <textarea id="alamat_penerima" name="alamat_penerima" class="form-control" maxlength="225" rows="3" placeholder="Isi alamat maksimal 225 karakter."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        
                        <div class="d-flex justify-content-end mt-3">

                           
                            <button type="reset" class="btn btn-secondary btn-sm" id="btnCancel">Kembali</button>
                            <div class="mx-2"></div> <button type="button" id="simpan_penerima" class="btn btn-primary btn-sm">Simpan Penerima</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

   //pilihan Pilih Pengirim
   $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: '{{ route('penerima.get_penerima') }}',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: response => {
                // console.log(response);

                $.each(response.data, function(i, item) {
                    $('#pilih_pengirim').append(
                        `<option value="${item.id}"
                            data-nama="${item.nama_pengirim}"
                            data-kode="${item.kode_pengirim}"
                            data-perusahaan="${item.nama_perusahaan}"
                            data-email="${item.email}"
                            data-telepon="${item.telepon}">
                            ${item.nama_pengirim}
                        </option>`
                    );
                });

                // Tangani perubahan select #kodepengirim
                $('#pilih_pengirim').change(function() {
                    var kode_pengirim = $('option:selected', this).data('kode');
                    $('#kode_pengirim').val(kode_pengirim);
                });

                // Tangani perubahan select #pengirim
                $('#pilih_pengirim').change(function() {
                    var pengirim_telepon = $('option:selected', this).data('telepon');
                    $('#pengirim_telepon').val(pengirim_telepon);
                });

                // Tangani perubahan select #erusahaan pengirim
                $('#pilih_pengirim').change(function() {
                    var nama_perusahaan = $('option:selected', this).data('perusahaan');
                    $('#nama_perusahaan').val(nama_perusahaan);
                });
            },
            error: (err) => {
                console.error("Terjadi kesalahan:", err);
            },
        });

        //form penerima

        $("#simpan_penerima").click(function() {
            let errors = [];

            // Mengambil nilai dari setiap input field
            let pilih_pengirim = $("#pilih_pengirim").val();
            let kode_pengirim = $("#kode_pengirim").val();
            let nama_perusahaan = $("#nama_perusahaan").val();
            let pengirim_telepon = $("#pengirim_telepon").val();
            let nama_penerima = $("#nama_penerima").val();
            let divisi_penerima = $("#divisi_penerima").val();
            let jabatan_penerima = $("#jabatan_penerima").val();
            let telepon_penerima = $("#telepon_penerima").val();
            let email_penerima = $("#email_penerima").val();
            let alamat_penerima = $("#alamat_penerima").val();

            // Validasi apakah ada field yang kosong
            if (!pilih_pengirim) errors.push("Pilih Pengirim");
            if (!kode_pengirim) errors.push("Kode Pengirim");
            if (!nama_perusahaan) errors.push("Nama Perusahaan");
            if (!pengirim_telepon) errors.push("Telepon Pengirim");
            if (!nama_penerima) errors.push("Nama Penerima");
            if (!divisi_penerima) errors.push("Divisi Penerima");
            if (!jabatan_penerima) errors.push("Jabatan Penerima");
            if (!telepon_penerima) errors.push("Telepon Penerima");
            if (!email_penerima) errors.push("Email Penerima");
            if (!alamat_penerima) errors.push("Alamat Penerima");

            // Jika ada error, tampilkan SweetAlert
            if (errors.length > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Form Tidak Lengkap!',
                    html: `<b>Mohon isi field berikut:</b><br>${errors.join('<br>')}`,
                    confirmButtonColor: '#d33'
                });
                return;
            }

            // Membuat objek dataform untuk dikirim via AJAX
            let dataform = {
                pilih_pengirim: pilih_pengirim,
                kode_pengirim: kode_pengirim,
                nama_perusahaan: nama_perusahaan,
                pengirim_telepon: pengirim_telepon,
                nama_penerima: nama_penerima,
                divisi_penerima: divisi_penerima,
                jabatan_penerima: jabatan_penerima,
                telepon_penerima: telepon_penerima,
                email_penerima: email_penerima,
                alamat_penerima: alamat_penerima
            };

            // Mengirim data via AJAX
            $.ajax({
                type: "POST",
                url: "{{ route('data_penerima.simpan') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'dataform': dataform
                },
                success: (response) => {
                    console.log(response);
                    if (response.code === 200) {
                        Swal.fire(
                            'Success',
                            'Data Penerima Berhasil di masukan',
                            'success'
                        ).then(() => {
                            var APP_URL = {!! json_encode(url('/')) !!}
                            window.location = APP_URL + '/data_penerima';
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