@extends('welcome')
@section('isicontent')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Form Edit User</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dastyle</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Advanced</li>
                    </ol>
                </div>
                <div class="col-auto align-self-center">
                    <a href="{{ route('data_user.index') }}" class="btn btn-sm btn-outline-primary">
                        <i data-feather="corner-down-left" class="align-self-center icon-xs"></i>
                        <span id="Select_date">Kembali</span>
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
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">{{ $edit }}</h4>
                        <p class="text-muted mb-0">Basic example to create project form styles.</p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form>
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <input type="file" id="input-file-now-custom-1" class="dropify mt-2" data-default-file="{{ asset('assets/user_foto/'.$data_user->image) }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control mb-3" id="nama" name="nama" value="{{ $data_user->nama }}" placeholder="Enter Name">

                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $data_user->username }}" placeholder="Enter Username" maxlength="39" oninput="this.value = this.value.replace(/\s/g, '')">
                            </div>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="pro-start-date">Created Date</label>
                                        <input type="text" class="form-control" id="pro-start-date" name="start_date" value="{{ $data_user->created_at }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pro-rate">Telepon</label>
                                        <input type="text" class="form-control" id="pro-rate" name="rate" placeholder="Enter rate" value="{{ $data_user->telepon }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pro-price-type">Email</label>
                                        <input type="text" class="form-control" id="pro-rate" name="rate" placeholder="Enter rate" value="{{ $data_user->email }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="pro-required">Roles</label>
                                        <select class="form-control" id="pro-required" name="required">
                                            <option value="Administrator" {{ $data_user->roles == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                            <option value="Admin" {{ $data_user->roles == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pro-priority">Status</label>
                                        <select class="form-control" id="pro-priority" name="priority">
                                            <option value="">-- Select --</option>
                                            <option value="0" {{ $data_user->status == '0' ? 'selected' : '' }}>Aktif</option>
                                            <option value="1" {{ $data_user->status == '1' ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                            <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                        </div>

                        <div class="col-md-4 text-center">
                            <div class="form-group mb-3">
                                <img src="{{ asset('storage/' . $data_user->qr_code_path) }}" alt="QR Code" style="max-width: 500px;">
                                <p>Nama: {{ $data_user->nama }}</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('.dropify').dropify();

    $('.dropify-wrapper').css({
        'width': '264px',
        'height': '191px'
    });

    $('.dropify-preview').css({
        'width': '100%',
        'height': '100%'
    });

    $('.dropify-render img').css({
        'width': '100%',
        'height': '100%',
        'object-fit': 'cover'
    });
});
</script>
@endsection