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
                <form action="{{ route('profil_desa.update', Crypt::encryptString($desa->id)) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Kode Pos <code>*</code></label>
                                    <input type="number" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode POS" class="form-control"  value="{{ old('kode_pos', $desa->kode_pos) }}" maxlength="5" />
                                </div>
            
                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Nama Desa <code>*</code></label>
                                    <input type="text" id="nama_desa" name="nama_desa" class="form-control" placeholder="Masukkan Nama Desa" maxlength="60" value="{{ old('nama_desa', $desa->nama_desa) }}" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Provinsi <code>*</code></label>
                                    <input type="text" id="provinsi" name="provinsi" class="form-control" placeholder="Masukkan Provinsi" maxlength="60" value="{{ old('provinsi', $desa->provinsi) }}" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Kabupaten <code>*</code></label>
                                    <input type="text" id="kabupaten" name="kabupaten" class="form-control" placeholder="Masukkan Kabupaten" maxlength="60" value="{{ old('kabupaten', $desa->kabupaten) }}" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Kecamatan <code>*</code></label>
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" maxlength="60" value="{{ old('kecamatan', $desa->kecamatan) }}" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Jumlah RT <code>*</code></label>
                                    <input type="number" id="jumlah_rt" name="jumlah_rt" class="form-control" placeholder="Masukkan Jumlah RT" maxlength="60" value="{{ old('jumlah_rt', $desa->jumlah_rt) }}" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Jumlah RW <code>*</code></label>
                                    <input type="number" id="jumlah_rw" name="jumlah_rw" class="form-control" placeholder="Masukkan Jumlah RW" value="{{ old('jumlah_rw', $desa->jumlah_rw) }}" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Telepon 1 <code>*</code></label>
                                    <input type="number" id="telepon" name="telepon" class="form-control" placeholder="Masukkan Telepon" value="{{ old('telepon', $desa->telepon) }}" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Email <code>*</code></label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Telepon" value="{{ old('email', $desa->email) }}" required />
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label class="mb-2">Deskripsi <code>*</code></label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" rows="2" required>{{ old('deskripsi', $desa->deskripsi) }}</textarea>
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
        $('#btnCancel').on('click', function(e) {
            e.preventDefault();
            window.location.href = "/profil_desa";
        });
    </script>
@endsection