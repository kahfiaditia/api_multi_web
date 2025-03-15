@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Buat Invoice</h4>
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
                <h4 class="card-title">Buat Invoice</h4>
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
                                <div class="col-lg-3">
                                    <label class="mb-2">Pilih Penerima <code>Wajib</code></label>
                                    <select class="form-control" id="pilih_penerima" name="pilih_penerima" required>
                                        <option value="">-- Pilih --</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Data wajib diisi.
                                    </div>
                                    {!! $errors->first('pilih_penerima', '<div class="invalid-validasi">:message</div>') !!}
                                </div>
                    
                                <div class="col-lg-3">
                                    <label class="mb-2">Divisi</label>
                                    <input type="text" maxlength="40" name="divisi_penerima" class="form-control" id="divisi_penerima" autocomplete="off" readonly/>
                                </div>
                    
                                <div class="col-lg-3">
                                    <label class="mb-2">Jabatan</label>
                                    <input type="text" maxlength="40" name="jabatan_penerima" class="form-control" id="jabatan_penerima" autocomplete="off" readonly/>
                                </div>
                    
                                <div class="col-lg-3">
                                    <label class="mb-2">Telepon Penerima</label>
                                    <input type="text" maxlength="40" name="telepon_penerima" class="form-control" id="telepon_penerima" autocomplete="off" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- //data invoice --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-2 mt-3">
                                    <label class="mb-2">Tanggal</label>
                                    <input type="date" name="tanggal_invoice" id="tanggal_invoice" class="form-control"  />
                                </div>

                               

                                <div class="col-lg-2 mt-3">
                                    <label class="mb-2">Status Invoice</label>
                                   <select name="status_lunas" id="status_lunas" class="form-control" required> 
                                       <option value=""> -- Pilih -- </option>
                                       <option value="1"> Lunas </option>
                                       <option value="2"> Belum Lunas </option>
                                    </select>
                                </div>

                                <div class="col-lg-2 mt-3">
                                    <label class="mb-2">Bank</code></label>
                                    <input type="text" class="form-control" maxlength="30" name="bank" id="bank" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Atas Nama</code></label>
                                    <input type="text" class="form-control" maxlength="40" name="atas_nama" id="atas_nama" />
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Rekening</code></label>
                                    <input type="number" class="form-control" maxlength="20" name="nomor_rekening" id="nomor_rekening" />
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- //deskripsi --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mt-3">
                                    <label class="mb-2">Deskripsi</label>
                                    <input type="text" class="form-control" maxlength="30" name="deskripsi" id="deskripsi" required oninput="this.value = this.value.toUpperCase();" />
                                </div>
                    
                                <div class="col-lg-2 mt-3">
                                    <label class="mb-2">Harga</label>
                                    <input type="text" class="form-control" maxlength="30" name="harga" id="harga" required oninput="formatAngka(this)"/>
                                </div>
                    
                                <div class="col-lg-2 mt-3">
                                    <label class="mb-2">Kuantiti</label>
                                    <input type="number" class="form-control" maxlength="30" name="kuantiti" id="kuantiti" required />
                                </div>
                    
                                <div class="col-lg-2 mt-3">
                                    <label class="mb-2">Sub Total</label>
                                    <input type="text" class="form-control" name="subtotal" id="subtotal" readonly />
                                </div>
                    
                                <div class="col-lg-3 mt-3 d-flex align-items-end">
                                    <button type="button" id="inideskripsi" class="btn btn-primary btn-sm">Tambah Deskripsi</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" id="inideskripsi">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Kuantiti</th>
                                            <th>Sub Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <!-- Tambahkan data lainnya di sini -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    

                    <div class="d-flex justify-content-end mt-3">
                        
                        <div class="d-flex justify-content-end mt-3">

                           
                            <button type="reset" class="btn btn-secondary btn-sm" id="btnCancel">Kembali</button>
                            <div class="mx-2"></div> <button type="button" id="simpan_invoice" class="btn btn-primary btn-sm">Simpan</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
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

        //pilih penerima
        $.ajax({
            type: "POST",
            url: '{{ route('penerima.data_penerima') }}',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: response => {
                // console.log(response);

                $.each(response.data, function(i, item) {
                    $('#pilih_penerima').append(
                        `<option value="${item.id}"
                            data-nama="${item.nama_penerima}"
                            data-divisi="${item.divisi_penerima}"
                            data-jabatan="${item.jabatan_penerima}"
                            data-email="${item.email_penerima}"
                            data-telepon="${item.telepon_penerima}"
                            data-alamat="${item.alamat_penerima}">
                            ${item.nama_penerima}
                        </option>`
                    );
                });

                // Tangani perubahan select #kodepengirim
                $('#pilih_penerima').change(function() {
                    var divisi_penerima = $('option:selected', this).data('divisi');
                    $('#divisi_penerima').val(divisi_penerima);
                });

                // Tangani perubahan select #pengirim
                $('#pilih_penerima').change(function() {
                    var jabatan_penerima = $('option:selected', this).data('jabatan');
                    $('#jabatan_penerima').val(jabatan_penerima);
                });

                // Tangani perubahan select #erusahaan pengirim
                $('#pilih_penerima').change(function() {
                    var telepon_penerima = $('option:selected', this).data('telepon');
                    $('#telepon_penerima').val(telepon_penerima);
                });
            },
            error: (err) => {
                console.error("Terjadi kesalahan:", err);
            },
        });
});

//fungsi rupiah harga
function formatAngka(input) {
    let value = input.value.replace(/[^0-9]/g, ''); // Hanya ambil angka
    let formatted = new Intl.NumberFormat('id-ID').format(value); // Format angka tanpa Rp
    input.value = formatted;
}



//ini deskripsi
$(document).ready(function () {

            document.getElementById("kuantiti").addEventListener("input", function() {
            let hargaInput = document.getElementById("harga").value;
            let qty = parseInt(this.value) || 0;

            // Menghapus titik dari nilai harga sebelum dikonversi ke angka
            let harga = parseInt(hargaInput.replace(/\./g, "")) || 0;

            // Hitung subtotal
            let subtotal = harga * qty;

            // Format subtotal ke format ribuan dengan titik
            document.getElementById("subtotal").value = formatRupiah(subtotal);
            });

            // Fungsi untuk format angka ke format ribuan dengan titik
            function formatRupiah(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }


            let nomor = 1; // Nomor urut

            $("#inideskripsi").click(function () {
                let deskripsi = $("#deskripsi").val();
                let harga = $("#harga").val();
                let kuantiti = $("#kuantiti").val();
                let subtotal = $("#subtotal").val();
                
                // Buat array untuk menyimpan pesan error
                let errors = [];

                // Cek setiap input apakah kosong
                if (deskripsi === "") errors.push("Deskripsi harus diisi");
                if (harga === "") errors.push("Harga harus diisi");
                if (kuantiti === "") errors.push("Kuantiti harus diisi");

                // Jika ada error, tampilkan SweetAlert dan hentikan proses
                if (errors.length > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Form Tidak Lengkap!',
                        html: `<b>Mohon isi field berikut:</b><br>${errors.join('<br>')}`,
                        confirmButtonColor: '#d33'
                    });
                    return;
                }


                let newRow = `
                    <tr>
                        <td>${nomor}</td>
                        <td>${deskripsi}</td>
                        <td>${harga}</td>
                        <td>${kuantiti}</td>
                        <td>${subtotal}</td>
                        <td><button class="btn btn-danger btn-sm hapus">Hapus</button></td>
                    </tr>
                `;

                    $("#inideskripsi tbody").append(newRow);
                    nomor++;

                    // Kosongkan input setelah ditambahkan
                    $("#deskripsi").val("");
                    $("#harga").val("");
                    $("#kuantiti").val("");
                    $("#subtotal").val("");
                });

                // Hapus baris ketika tombol "Hapus" diklik
                $("#inideskripsi tbody").on("click", ".hapus", function () {
                    $(this).closest("tr").remove();

                    // Perbarui nomor urut
                    nomor = 1;
                    $("#inideskripsi tbody tr").each(function () {
                        $(this).find("td:first").text(nomor);
                        nomor++;
                    });
                });

                //simpan dan kirim
                $("#simpan_invoice").click(function() {
                    let errors = [];

                    // Mengambil nilai dari setiap input field
                    let pilih_pengirim = $("#pilih_pengirim").val();
                    let pilih_penerima = $("#pilih_penerima").val();
                    let tanggal_invoice = $("#tanggal_invoice").val();
                    let status_lunas = $("#status_lunas").val();
                    let bank = $("#bank").val();
                    let atas_nama = $("#atas_nama").val();
                    let nomor_rekening = $("#nomor_rekening").val();
        

                    // Validasi apakah ada field yang kosong
                    if (!pilih_pengirim) errors.push("Pilih Pengirim");
                    if (!pilih_penerima) errors.push("Pilih Penerima");
                    if (!tanggal_invoice) errors.push("Tanggal Invoice");
                    if (!status_lunas) errors.push("Status Lunas");
                
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
                    let dataTable = [];
                    let tableErrors = [];

                    $("#inideskripsi tbody tr").each(function () {
                    let deskripsi = $(this).find("td:eq(1)").text().trim();
                    let harga = $(this).find("td:eq(2)").text().trim();
                    let kuantiti = $(this).find("td:eq(3)").text().trim();
                    let subtotal = $(this).find("td:eq(4)").text().trim();

                    if (!deskripsi) tableErrors.push("Deskripsi tidak boleh kosong");
                    if (!harga) tableErrors.push("Harga tidak boleh kosong");
                    if (!kuantiti) tableErrors.push("Kuantiti tidak boleh kosong");

                    dataTable.push({ deskripsi, harga, kuantiti, subtotal });
                    });

                // Jika ada error dalam form atau tabel, tampilkan SweetAlert
                    if (errors.length > 0 || tableErrors.length > 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Form Tidak Lengkap!',
                            html: `<b>Mohon isi field berikut:</b><br>${errors.concat(tableErrors).join('<br>')}`,
                            confirmButtonColor: '#d33'
                        });
                        return;
                    }

                    // Jika tabel kosong, beri peringatan
                    if (dataTable.length === 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tabel Kosong!',
                            text: 'Silakan tambahkan setidaknya satu item ke dalam tabel.',
                            confirmButtonColor: '#d33'
                        });
                        return;
                    }

                    let dataform = {
                        pilih_pengirim: pilih_pengirim,
                        pilih_penerima: pilih_penerima,
                        tanggal_invoice: tanggal_invoice,
                        status_lunas: status_lunas,
                        bank: bank,
                        atas_nama: atas_nama,
                        nomor_rekening: nomor_rekening,
                        items: dataTable
                    };
                    // Mengirim data via AJAX
                    $.ajax({
                        type: "POST",
                        url: "{{ route('simpan_invoice') }}",
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
                                    window.location = APP_URL + '/invoice';
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