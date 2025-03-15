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
                <h4 class="card-title">Isi Data Pengirim</h4>
                <p class="text-muted mb-0">Ini Harus Disisi oleh Nama Pengirim.</p>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form id="myForm" class="form-horizontal" action="{{ route('data_invoice.store') }}"      method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="mb-2">Nama Pengirim <code>Wajib</code></label>
                            <input type="text" class="form-control" maxlength="40" name="nama_pengirim" id="nama_pengirim" autocomplete="off" required/>
                        </div>

                        <div class="col-lg-6">
                            <label class="mb-2">Nama Perusahaan</label>
                            <input type="text" maxlength="40" name="nama_perusahaan" class="form-control" id="nama_perusahaan" autocomplete="off" />
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label class="mb-2">Logo Perusahaan</label>
                            <input type="file" name="logo_perusahaan" class="form-control" id="logo_perusahaan" />
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label class="mb-2">Jabatan</label>
                            <input type="text" maxlength="40" name="jabatan" class="form-control" id="jabatan" />
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label class="mb-2">Telepon <code>Wajib</code></label>
                            <input type="number" class="form-control" maxlength="18" name="telepon" id="telepon" required/>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label class="mb-2">Email</label>
                            <input type="email" maxlength="35" name="email" class="form-control" id="email" />
                        </div>

                        <div class="col-lg-12 mt-3">
                            <label class="mb-2">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" maxlength="225" rows="3" placeholder="Isi alamat maksimal 225 karakter."></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        
                        <div class="d-flex justify-content-end mt-3">
                            <button type="reset" class="btn btn-secondary btn-sm" id="btnCancel">Kembali</button>
                            <div class="mx-2"></div> <button type="submit" class="btn btn-primary btn-sm">Input Pengirim</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection