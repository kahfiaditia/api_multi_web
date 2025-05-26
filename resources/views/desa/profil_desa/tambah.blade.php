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
                    <a href="{{ route('buku.index') }}" class="btn btn-sm btn-outline-primary">
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
                <form action="{{ route('profil_desa.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Kepala Desa <code>*</code></label>
                                    <input type="text" name="kepala_desa" id="kepala_desa" placeholder="Masukkan Kepala Desa" class="form-control" maxlength="35" />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Kode Pos <code>*</code></label>
                                    <input type="number" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode POS" class="form-control" maxlength="5" />
                                </div>
            
                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Nama Desa <code>*</code></label>
                                    <input type="text" id="nama_desa" name="nama_desa" class="form-control" placeholder="Masukkan Nama Desa" maxlength="60" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Provinsi <code>*</code></label>
                                    <input type="text" id="provinsi" name="provinsi" class="form-control" placeholder="Masukkan Provinsi" maxlength="60" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Kabupaten <code>*</code></label>
                                    <input type="text" id="kabupaten" name="kabupaten" class="form-control" placeholder="Masukkan Kabupaten" maxlength="60" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Kecamatan <code>*</code></label>
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" maxlength="60" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Jumlah Rumah <code>*</code></label>
                                    <input type="number" id="jumlah_rumah" name="jumlah_rumah" class="form-control" placeholder="Masukkan Jumlah Rumah" maxlength="60" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Jumlah Warga <code>*</code></label>
                                    <input type="number" id="jumlah_warga" name="jumlah_warga" class="form-control" placeholder="Masukkan Jumlah Warga" maxlength="60" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Jumlah RT <code>*</code></label>
                                    <input type="number" id="jumlah_rt" name="jumlah_rt" class="form-control" placeholder="Masukkan Jumlah RT" maxlength="60" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Jumlah RW <code>*</code></label>
                                    <input type="number" id="jumlah_rw" name="jumlah_rw" class="form-control" placeholder="Masukkan Jumlah RW" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Telepon 1 <code>*</code></label>
                                    <input type="number" id="telepon" name="telepon" class="form-control" placeholder="Masukkan Telepon" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Email <code>*</code></label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Email" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Deskripsi <code>*</code></label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" rows="2" required></textarea>
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
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('../plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-editor.init.js') }}"></script>
    <script>
        document.getElementById("tambah_rak").addEventListener("click", function () {
            // Ambil nilai dari form input
            let kodeRak = document.getElementById("kode_rak").value.trim();
            let jumlahTingkat = document.getElementById("jumlah_tingkat").value.trim();
            let keteranganRak = document.getElementById("keterangan_rak").value.trim();

            // Validasi input tidak boleh kosong
            if (kodeRak === "" || jumlahTingkat === "" || keteranganRak === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Form Tidak Lengkap!',
                    text: 'Mohon isi semua field sebelum menambahkan.',
                    confirmButtonColor: '#d33'
                });
                return; // Mencegah proses lanjut jika form kosong
            }

            // Ambil referensi ke tbody tabel
            let tableBody = document.querySelector("#data_rak tbody");

            // Buat baris baru
            let newRow = document.createElement("tr");

            // Isi dengan data input
            newRow.innerHTML = `
                <td>${kodeRak}</td>
                <td>${keteranganRak}</td>
                <td>${jumlahTingkat}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm delete-rak">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </td>
            `;

            // Tambahkan baris ke dalam tabel
            tableBody.appendChild(newRow);

            // Reset form setelah ditambahkan
            document.getElementById("formRak").reset();
        });

        // Event listener untuk tombol hapus pada tabel
        document.querySelector("#data_rak tbody").addEventListener("click", function (e) {
            if (e.target.classList.contains("delete-rak")) {
                Swal.fire({
                    title: "Konfirmasi Hapus",
                    text: "Apakah Anda yakin ingin menghapus rak ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.closest("tr").remove();
                        Swal.fire("Dihapus!", "Rak telah dihapus.", "success");
                    }
                });
            }
        });

        //kirim data
        $(document).ready(function () {
                $("#kirim_rak").click(function (e) {
                    e.preventDefault(); // Mencegah form submit default
                    
                    let tableData = [];
                    $("#data_rak tbody tr").each(function () {
                        let kodeRak = $(this).find("td:eq(0)").text().trim();
                        let keteranganRak = $(this).find("td:eq(1)").text().trim();
                        let jumlahTingkat = $(this).find("td:eq(2)").text().trim();

                        tableData.push({
                            kode_rak: kodeRak,
                            keterangan_rak: keteranganRak,
                            jumlah_tingkat: jumlahTingkat
                        });
                    });

                    // Validasi jika tabel kosong
                    if (tableData.length === 0) {
                        Swal.fire({
                            icon: "warning",
                            title: "Tabel Kosong!",
                            text: "Tambahkan minimal satu rak sebelum mengirim data.",
                            confirmButtonColor: "#d33"
                        });
                        return;
                    }

                    // Kirim data dengan AJAX
                    $.ajax({
                            url: "{{ route('rak.store') }}", // Route ke controller
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}", // Laravel CSRF token
                                rak: tableData
                            },
                            success: function (response) {
                                if (response && response.code === 200) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Sukses!",
                                        text: "Data rak berhasil disimpan.",
                                        confirmButtonColor: "#3085d6"
                                    }).then(() => {
                                        let APP_URL = @json(url('/'));
                                        window.location.href = APP_URL + "/rak";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Terdapat dua barang yang sama",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Terjadi Kesalahan!",
                                    text: "Gagal menyimpan data. Silakan coba lagi.",
                                    confirmButtonColor: "#d33"
                                });
                            }
                    });
                });
        });

    </script>
@endsection