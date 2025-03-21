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
                <form id="formRak">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 mt-3">
                                    <label class="mb-2">Rak <code>*</code></label>
                                        <select id="pilih_rak" name="pilih_rak" class="form-control" required>
                                            <option value=""> -- Pilih -- </option> 
                                        </select>
                                </div>
            
                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Buku  <code>*</code></label>
                                    <select id="pilih_buku" name="pilih_buku" class="form-control" required>
                                        <option value=""> -- Pilih -- </option> 
                                    </select>
                                </div>

                                <div class="col-md-2 mt-3">
                                    <label class="mb-2">Stok <code>*</code></label>
                                    <input type="text" id="stok" name="stok" class="form-control" placeholder="Stok Buku" autocomplete="off" readonly />
                                </div>
            
                                <div class="col-md-2 mt-3">
                                    <label class="mb-2">Jumlah <code>*</code></label>
                                    <input type="number" maxlength="2" id="jumlah" name="jumlah" class="form-control" placeholder="Masukan Jumlah" autocomplete="off" required />
                                </div>
            
                                <div class="col-md-3 mt-3 d-flex align-items-end">
                                    <button type="button" id="tambah_simpan" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-save"></i> tambah
                                    </button>
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
                               <table id="data_penyimpanan" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th hidden>id Rak</th>
                                            <th>Rak</th>
                                            <th hidden>id Buku</th>
                                            <th>Buku</th>
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
                        <button type="submit" id="kirim_penyimpanan" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
               
                
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('../plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-editor.init.js') }}"></script>
    <script>
        $(document).ready(function() {
    // Load data Rak
    $.ajax({
        type: "POST",
        url: '{{ route('pilih.rak') }}',
        data: { "_token": "{{ csrf_token() }}" },
        success: response => {
            $.each(response.data, function(i, item) {
                $('#pilih_rak').append(
                    `<option value="${item.id}" data-rak="${item.kode_rak}">
                        ${item.kode_rak}
                    </option>`
                );
            });
        },
        error: err => { console.error("Terjadi kesalahan:", err); },
    });

    // Load data Buku
    $.ajax({
        type: "POST",
        url: '{{ route('pilih.buku') }}',
        data: { "_token": "{{ csrf_token() }}" },
        success: response => {
            $.each(response.data, function(i, item) {
                $('#pilih_buku').append(
                    `<option value="${item.id}" data-total="${item.jumlah}">
                        ${item.nama_buku}
                    </option>`
                );
            });
        },
        error: err => { console.error("Terjadi kesalahan:", err); },
    });

    // Update stok saat buku dipilih
    $('#pilih_buku').change(function() {
        let stok = $('option:selected', this).data('total');
        $('#stok').val(stok);
    });

    // Validasi jumlah tidak melebihi stok
    $("#jumlah").on("input", function() {
        let jumlah = parseInt($(this).val());
        let stok = parseInt($("#stok").val());
        
        if (jumlah > stok) {
            Swal.fire({
                icon: "warning",
                title: "Stok Tidak Cukup!",
                text: "Jumlah tidak boleh melebihi stok yang tersedia!",
            });
            $(this).val(stok);
        }
    });

    // Fungsi menambahkan data ke tabel dengan validasi id_buku unik
    $("#tambah_simpan").click(function() {
        let id_rak = $("#pilih_rak").val();
        let rak = $("#pilih_rak option:selected").text().trim();
        let id_buku = $("#pilih_buku").val();
        let buku = $("#pilih_buku option:selected").text().trim();
        let jumlah = $("#jumlah").val().trim();

        if (!id_rak || !id_buku || !jumlah) {
            Swal.fire({
                icon: 'error',
                title: 'Form Tidak Lengkap!',
                text: 'Mohon isi semua field sebelum menambahkan.',
                confirmButtonColor: '#d33'
            });
            return;
        }

        // Cek apakah id_buku sudah ada di tabel
        let bukuDuplikat = false;
        $("#data_penyimpanan tbody tr").each(function() {
            let id_buku_existing = $(this).find("td:eq(2)").text().trim();
            if (id_buku_existing === id_buku) {
                bukuDuplikat = true;
                return false;
            }
        });

        if (bukuDuplikat) {
            Swal.fire({
                icon: 'error',
                title: 'Buku Sudah Ditambahkan!',
                text: 'Tidak boleh ada buku yang sama dalam satu penyimpanan.',
                confirmButtonColor: '#d33'
            });
            return;
        }

        // Tambahkan data ke tabel
        let newRow = `
            <tr>
                <td hidden>${id_rak}</td>
                <td>${rak}</td>
                <td hidden>${id_buku}</td>
                <td>${buku}</td>
                <td>${jumlah}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm delete-row">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </td>
            </tr>
        `;

        $("#data_penyimpanan tbody").append(newRow);
        $("#formRak")[0].reset();
    });

    // Hapus baris dari tabel dengan konfirmasi
    $(document).on("click", ".delete-row", function() {
        Swal.fire({
            title: "Konfirmasi Hapus",
            text: "Apakah Anda yakin ingin menghapus item ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest("tr").remove();
                Swal.fire("Dihapus!", "Data telah dihapus.", "success");
            }
        });
    });

    // Validasi sebelum menyimpan data
    $("#kirim_penyimpanan").click(function(e) {
        e.preventDefault();

        let tableData = [];
        let bukuSet = new Set();

        $("#data_penyimpanan tbody tr").each(function() {
            let id_rak = $(this).find("td:eq(0)").text().trim();
            let rak = $(this).find("td:eq(1)").text().trim();
            let id_buku = $(this).find("td:eq(2)").text().trim();
            let buku = $(this).find("td:eq(3)").text().trim();
            let jumlah = $(this).find("td:eq(4)").text().trim();

            tableData.push({
                id_rak: id_rak,
                rak: rak,
                id_buku: id_buku,
                buku: buku,
                jumlah: jumlah
            });

            if (bukuSet.has(id_buku)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Duplikasi Buku!',
                    text: 'Terdapat lebih dari satu buku yang sama. Periksa kembali sebelum menyimpan.',
                    confirmButtonColor: '#d33'
                });
                return false;
            }
            bukuSet.add(id_buku);
        });

        if (tableData.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Tabel Kosong!',
                text: 'Mohon tambahkan data sebelum menyimpan.',
                confirmButtonColor: '#d33'
            });
            return;
        }

        $.ajax({
            type: "POST",
            url: '{{ route('penyimpanan.store') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "data": tableData
            },
            success: function(response) {
                if (response && response.code === 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Sukses!",
                        text: "Data rak berhasil disimpan.",
                        confirmButtonColor: "#3085d6"
                    }).then(() => {
                        let APP_URL = @json(url('/'));
                        window.location.href = APP_URL + "/penyimpanan";
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
            error: err => {
                console.error("Terjadi kesalahan:", err);
                Swal.fire("Error!", "Gagal menyimpan data.", "error");
            },
        });
    });
});

    </script>
@endsection