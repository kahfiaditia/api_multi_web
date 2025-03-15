@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Form Tambah User</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dastyle</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Advanced</li>
                    </ol>
                </div><!--end col-->
                <div class="col-auto align-self-center">
                    <a href="{{ route('data_user.index') }}" class="btn btn-sm btn-outline-primary">
                        <i data-feather="corner-down-left" class="align-self-center icon-xs"></i>
                        <span class="" id="Select_date">Kembali</span>
                    </a>
                </div>
            </div>                                                              
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Masukan Data User</h4>
                <p class="text-muted mb-0">Silahkan masukan data-data user dengan mengisi form. 
                </p>
            </div><!--end card-header-->
            <div class="card-body bootstrap-select-1">
                <form id="myForm" class="form-horizontal" action="{{ route('data_user.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <label for="file_gambar" class="mb-3">Pilih Gambar 264 X 191 :</label>
                            <input type="file" class="form-control" id="file_gambar" name="file_gambar" accept="image/png, image/jpeg" required>
                            <small class="text-muted mb-3">Hanya file PNG atau JPG yang diperbolehkan.</small>
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-4">
                            {{-- <label class="mb-3">Roles</label> --}}
                            <label for="pro-end-date mt-4">Roles</label>
                            <select class="form-control" id="roles" name="roles" required>
                                <option value="">-- Pilih --</option>
                                <option value="Administrator" >Administrator </option>
                                <option value="Admin">Admin</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih salah satu!
                            </div>
                        </div>                                   
                        <div class="col-md-4">
                            <label class="mb-3">Nama</label>
                            <input type="text" maxlength="40" name="nama" id="nama" value="{{ old('nama') }}" autocomplete="off" class="form-control" required />
                            <div class="invalid-feedback">
                                Silahkan masukkan nama!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="mb-3">Username</label>
                            <input type="text" maxlength="40" name="username" id="username" value="{{ old('username') }}" autocomplete="off" class="form-control" maxlength="39" oninput="this.value = this.value.replace(/\s/g, '')" required />
                            <div class="invalid-feedback">
                                Silahkan masukkan Username tanpa spasi!
                            </div>
                        </div>                                 
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="mb-3">Password</label>
                            <input type="password" maxlength="25" name="password" id="password" value="{{ old('password') }}" autocomplete="off" class="form-control" required />
                        </div>                                   
                        <div class="col-md-4">
                            <label class="mb-3">Email</label>
                            <input type="email" maxlength="40" name="email" id="email" value="{{ old('email') }}" autocomplete="off" class="form-control" required />
                            <div class="invalid-feedback">
                                Silahkan masukkan email example@example.com!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="mb-3">Telepon</label>
                            <input type="number" maxlength="18" name="telepon" id="telepon" value="{{ old('telepon') }}" autocomplete="off" class="form-control" required />
                            <div class="invalid-feedback">
                                Silahkan masukkan Telepon!
                            </div>
                        </div>                                 
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary btn-sm mt-5">Create User</button>
                            {{-- <button type="submit" class="btn btn-primary btn-square btn-outline-dashed waves-effect waves-light mt-5">
                                Simpan Data
                            </button> --}}
                        </div>
                    </div>
                </form>
                
            </div>
        </div>                               
    </div> 
</div>
<script>
    (function() {
        'use strict';
        let form = document.getElementById('myForm');
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault(); // Mencegah submit jika form tidak valid
                event.stopPropagation();
            }
            form.classList.add('was-validated'); // Menampilkan invalid-feedback
        }, false);
    })();
</script>
@endsection