@extends('welcome')
@section('isicontent')
<style>

    .container {
        max-width: 400px;
        margin: auto;
    }
    .hidden {
        display: none;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        font-weight: bold;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <div class="page-title-left">
                <h4 class="mb-sm-0 font-size-18">{{ $label }}</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">{{ ucwords($menu) }}</li>
                    <li class="breadcrumb-item">{{ ucwords($submenu) }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row" onload="myLoad()" id="myLoad">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $submenu }}</h4>
                <p class="text-muted mb-0">Ini Harus Disisi.</p>
            </div>
            <!--end card-header-->
            <div class="card-body">
                 
                
                <form id="formRak">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                           {{-- barcode --}}
                           <div class="form-group">
                                <label>Pilih Metode Input:</label>
                                <select id="inputMethod" class="form-control">
                                    <option value="barcode" selected>Barcode</option>
                                    <option value="scan">Scan Kamera</option>
                                </select>
                            </div>
                
                            <div id="barcodeInput" class="form-group">
                                <label>Masukkan Barcode:</label>
                                <input type="text" id="barcode" class="form-control" placeholder="Scan atau ketik barcode" autofocus>
                            </div>
                
                            <div id="scanCamera" class="form-group hidden">
                                <label>Scan Barcode dengan Kamera:</label>
                                <div id="reader" style="width: 300px;"></div>
                            </div>
                            {{-- akhir barcode --}}


                            <div class="row">
                                <div class="col-md-2">
                                    <label class="mb-2">Pilih Peminjam <code>*</code></label>
                                        <select id="peminjam" name="peminjam" class="form-control" required>
                                            <option value=""> -- Pilih -- </option>
                                            <option value="Siswa">Siswa</option>
                                            <option value="Guru">Guru</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Data wajib diisi.
                                        </div>
                                        {!! $errors->first('peminjam', '<div class="invalid-validasi">:message</div>') !!}
                                </div>
                                <div class="col-md-4 peminjam_siswa" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Siswa <code>*</code></label>
                                        <select class="form-control select select2 classes" name="siswa" required
                                            id="siswa">
                                            <option value="">--Pilih Siswa--</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Data wajib diisi.
                                        </div>
                                        {!! $errors->first('siswa', '<div class="invalid-validasi">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-md-3 peminjam_guru" style="display: none;">
                                    <div class="mb-3">
                                        <label for="">Guru <code>*</code></label>
                                        <select class="form-control select select2 guru" name="guru"
                                            required id="guru">
                                            <option value="">--Pilih Guru--</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Data wajib diisi.
                                        </div>
                                        {!! $errors->first('guru', '<div class="invalid-validasi">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Pilih Buku <code>*</code></label>
                                        <select id="buku" name="buku" class="form-control" required>
                                            <option value=""> -- Pilih -- </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Data wajib diisi.
                                        </div>
                                        {!! $errors->first('peminjam', '<div class="invalid-validasi">:message</div>') !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori <code>*</code></label>
                                        <input type="text" class="form-control number-only" id="kategori"
                                          placeholder="Kategori" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah <code>*</code></label>
                                        <input type="text" class="form-control number-only" id="jml_buku"
                                        readonly value="1" placeholder="Jumlah Buku">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-4">
                                        <a type="submit" class="btn btn-info w-md" id="add">Tambah buku</a>
                                    </div>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </form>
            </div>
            

            <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <table id="data_peminjaman" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th hidden>ID Buku</th>
                                            <th>Barcode</th>
                                            <th>Judul</th>
                                            <th>Jumlah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                               </table>
                            </div>
                        </div>
                    </div>
                
                    <div class="d-flex justify-content-end mt-3">
                        <button type="reset" class="btn btn-secondary btn-sm" id="btnCancel">Kembali</button>
                        <div class="mx-2"></div>
                        <button type="submit" id="kirim_peminjaman" class="btn btn-primary btn-sm">Pinjam</button>
                    </div>
               
                
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="{{ asset('assets/alert.js') }}"></script> --}}
<script src="{{ asset('assets/scanner/html5-qrcode.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#peminjam").change(function () {
            let selectedValue = $(this).val();
            
            $(".peminjam_siswa, .peminjam_guru").hide(); // Sembunyikan semua dulu
            
            if (selectedValue === "Siswa") {
                $(".peminjam_siswa").fadeIn();
            } else if (selectedValue === "Guru") {
                $(".peminjam_guru").fadeIn();
            }
        });
    });

    $(document).ready(function () {
                function getSiswa(siswa) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('get.siswa') }}",
                        success: function(response) {
                            $("#siswa").empty().append(`<option value="">-- Pilih Siswa --</option>`);
                            $.each(response.data, function(i, item) {
                                let selected = (siswa == item.id) ? "selected" : "";
                                $("#siswa").append(
                                    `<option value="${item.id}" ${selected}>${item.nama} - ${item.nis}</option>`
                                );
                            });
                        },
                        error: function(err) {
                            console.log("Error: ", err);
                        },
                    });
                }

        // Panggil fungsi getSiswa saat halaman siap
        getSiswa();

        // Reset siswa jika peminjam berubah
        $("#peminjam").on("change", function () {
            let peminjamVal = $(this).val();

            if (peminjamVal === "Guru") {
                $("#siswa").val(""); // Kosongkan pilihan siswa
            }
            if (peminjamVal === "Siswa") {
                $("#guru").val(""); // Kosongkan pilihan siswa
            }
        });

          // Ambil data guru
       
    });

    $(document).ready(function () {
                function getGuru(guru) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('get.guru') }}",
                        success: function(response) {
                            $("#guru").empty().append(`<option value="">-- Pilih Guru --</option>`);
                            $.each(response.data, function(i, item) {
                                let selected = (guru == item.id) ? "selected" : "";
                                $("#guru").append(
                                    `<option value="${item.id}" ${selected}>${item.nama} - ${item.kode}</option>`
                                );
                            });
                        },
                        error: function(err) {
                            console.log("Error: ", err);
                        },
                    });
                }

        // Panggil fungsi getSiswa saat halaman siap
        getGuru();

        // Reset siswa jika peminjam berubah
        $("#peminjam").on("change", function () {
            let peminjamVal = $(this).val();

            if (peminjamVal === "Guru") {
                $("#siswa").val(""); // Kosongkan pilihan siswa
            }
            if (peminjamVal === "Siswa") {
                $("#guru").val(""); // Kosongkan pilihan siswa
            }
        });

          // Ambil data guru
       
    });

    $(document).ready(function () {
        
        function countBooks() {
            return $("#data_peminjaman tbody tr").length;
        }

        function showLimitAlert() {
            Swal.fire({
                icon: "warning",
                title: "Batas Maksimal Tercapai!",
                text: "Anda hanya bisa meminjam maksimal 3 buku.",
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: true,
            });
        }
        // Load daftar buku saat halaman dimuat
        $.ajax({
            type: "POST",
            url: "{{ route('buku.buku_ambil') }}",
            data: { _token: "{{ csrf_token() }}" },
            success: function (response) {
                $("#buku").empty().append(`<option value="">-- Pilih Buku --</option>`);
                $.each(response.data, function (i, item) {
                    $("#buku").append(
                        `<option value="${item.id}"
                            data-nama="${item.nama_buku}"
                            data-kode="${item.kode}"
                            data-kategori="${item.kategori}"
                            data-harga="${item.harga}"
                            data-pengarang="${item.pengarang}"
                            data-tahun="${item.tahun}">
                            ${item.nama_buku} - ${item.kode}
                        </option>`
                    );
                });
            },
            error: function (err) {
                console.log("Error: ", err);
            },
        });

        // Event saat buku dipilih dari dropdown
        $("#buku").change(function () {
            var selectedOption = $(this).find('option:selected');
            $("#kategori").val(selectedOption.data('kategori'));
        });

        // Fungsi untuk menambahkan buku ke tabel
        function addBookToTable(bookId, bookKode, bookName, quantity) {
            if (countBooks() >= 3) {
                showLimitAlert();
                return;
            }

            if (!bookId) {
                Swal.fire({
                    icon: "warning",
                    title: "Pilih Buku Terlebih Dahulu!",
                    text: "Silakan pilih buku sebelum menambahkannya.",
                    timer: 2000, // Waktu
                    timerProgressBar: true,
                    showConfirmButton: true,
                });
                return;
            }

            // Cek apakah buku sudah ada di tabel
            let existingRow = $("#data_peminjaman tbody tr[data-id='" + bookId + "']");
            if (existingRow.length > 0) {
                Swal.fire({
                    icon: "error",
                    title: "Buku Sudah Ditambahkan!",
                    text: "Buku ini sudah ada dalam daftar peminjaman.",
                    timer: 2000, // Waktu
                    timerProgressBar: true,
                    showConfirmButton: true,
                });
                resetForm();
                return;
            }

            // Tambahkan buku ke tabel
            let newRow = `
                <tr data-id="${bookId}">
                    <td hidden>${bookId}</td>
                    <td>${bookKode}</td>
                    <td>${bookName}</td>
                    <td>${quantity}</td>
                    <td><button type="button" class="btn btn-danger btn-sm remove">Hapus</button></td>
                </tr>
            `;
            $("#data_peminjaman tbody").append(newRow);

            // Reset form
            resetForm();
        }

        // Event klik tombol "Tambah Buku"
        $("#add").click(function (e) {
            e.preventDefault();
            var selectedOption = $("#buku option:selected");
            var bookId = selectedOption.val();
            var bookKode = selectedOption.data('kode');
            var bookName = selectedOption.data('nama');
            var quantity = $("#jml_buku").val();
            addBookToTable(bookId, bookKode, bookName, quantity);
        });

        // Event untuk menghapus baris dari tabel
        $("#data_peminjaman").on("click", ".remove", function () {
            $(this).closest("tr").remove();
        });

        // Barcode scanner
        let html5QrCode;
        $("#inputMethod").change(function () {
            if ($(this).val() === "scan") {
                $("#barcodeInput").addClass("hidden");
                $("#scanCamera").removeClass("hidden");
                startScanner();
            } else {
                $("#barcodeInput").removeClass("hidden");
                $("#scanCamera").addClass("hidden");
                stopScanner();
            }
        });

        function startScanner() {
            if (!html5QrCode) {
                html5QrCode = new Html5Qrcode("reader");
            }
            html5QrCode.start(
                { facingMode: "environment" },
                { fps: 10, qrbox: 250 },
                function (qrCodeMessage) {
                    $("#barcode").val(qrCodeMessage);
                    checkBarcode(qrCodeMessage);
                    stopScanner();
                },
                function (errorMessage) {
                    console.log(errorMessage);
                }
            ).catch(err => console.log(err));
        }

        function stopScanner() {
            if (html5QrCode) {
                html5QrCode.stop().catch(err => console.log(err));
            }
        }

        $("#barcode").change(function () {
            checkBarcode($(this).val());
        });

        function checkBarcode(barcode) {
            if (countBooks() >= 3) {
                showLimitAlert();
                return;
            }

            if (!barcode.trim()) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Barcode Kosong',
                    text: 'Harap masukkan atau scan barcode terlebih dahulu.',
                });
                return;
            }

            // AJAX untuk memeriksa barcode di server
            $.ajax({
                url: `/check-barcode/${barcode}`,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        addBookToTable(data.book.id, data.book.kode, data.book.judul, 1);
                        $("#barcode").val(""); // Reset barcode input
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tidak Ditemukan',
                            text: 'Tidak ada buku dengan barcode tersebut.',
                            timer: 2000, // Waktu
                            timerProgressBar: true,
                            showConfirmButton: true,
                            willClose: () => {
                                $("#barcode").val(""); // Reset barcode setelah alert ditutup
                            }
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat mengambil data buku.',
                    });
                }
            });
        }

        function resetForm() {
            $("#buku").val(""); 
            $("#kategori").val("");
            $("#jml_buku").val("1");
        }
    });

    //kirim ke controller
    $(document).ready(function () {
            $("#kirim_peminjaman").click(function (e) {
                e.preventDefault(); // Mencegah form submit langsung

                function countBooks() {
                            return $("#data_peminjaman tbody tr").length;
                }

                function showLimitAlert() {
                    Swal.fire({
                        icon: "warning",
                        title: "Batas Maksimal Tercapai!",
                        text: "Anda hanya bisa meminjam maksimal 3 buku.",
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: true,
                    });
                }

                let siswaId = $("#siswa").find(":selected").val();
                console.log(siswaId);
                let guruId = $("#guru").find(":selected").val();
                console.log(guruId);

                if (countBooks() > 3) {
                    Swal.fire({
                        icon: "warning",
                        title: "Terlalu Banyak Buku!",
                        text: "Kurangi jumlah buku karena maksimal hanya 3.",
                    });
                    return;
                }

                let dataPeminjaman = [];
                $("#data_peminjaman tbody tr").each(function () {
                    let bukuId = $(this).find("td:eq(0)").text();
                    let bukuKode = $(this).find("td:eq(1)").text();
                    let bukuNama = $(this).find("td:eq(2)").text();
                    let jumlah = $(this).find("td:eq(3)").text();

                    dataPeminjaman.push({
                        buku_id: bukuId,
                        buku_kode: bukuKode,
                        buku_nama: bukuNama,
                        jumlah: jumlah
                    });
                });

                // Jika tabel kosong, tampilkan SweetAlert
                if (dataPeminjaman.length === 0) {
                    Swal.fire({
                        icon: "warning",
                        title: "Pilih Buku Dulu!",
                        text: "Silakan pilih buku yang akan dipinjam sebelum menyimpan.",
                    });
                    return;
                }

                // Pastikan siswa atau guru dipilih
                if (!siswaId && !guruId) {
                    Swal.fire({
                        icon: "warning",
                        title: "Pilih Siswa atau Guru!",
                        text: "Pastikan Anda memilih siswa atau guru sebelum menyimpan.",
                    });
                    return;
                }

                // Kirim data ke Controller dengan AJAX
                $.ajax({
                    url: "{{ route('peminjaman.store') }}", // Sesuaikan dengan route Laravel
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", // Token CSRF Laravel
                        siswa: siswaId || null,
                        guru: guruId || null,
                        data_peminjaman: dataPeminjaman
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text: "Data peminjaman berhasil disimpan.",
                        }).then(() => {
                            window.location.href = "{{ route('peminjaman.index') }}"; // Redirect setelah sukses
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat menyimpan data.",
                        });
                    }
                });
            });
    });

</script>

@endsection
