@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">Edit {{ $submenu }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-warning"><i class="fas fa-edit"></i> Form Edit Client</h5>

                        <!-- Tampilkan Error Validasi -->
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <h6 class="alert-heading mb-3">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            Terdapat kesalahan dalam pengisian form:
                                        </h6>
                                        <ul class="mb-0 ps-3">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                        <!-- Tampilkan Error Validasi -->

                        <form action="{{ route('client_web.update', Crypt::encryptString($client->id)) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Nama Client -->
                                <div class="col-md-6">
                                    <label for="client_name" class="form-label">Nama Client <span class="text-danger">*</span></label>
                                    <input type="text" name="client_name" id="client_name"
                                           class="form-control @error('client_name') is-invalid @enderror"
                                           value="{{ old('client_name', $client->client_name) }}" required>
                                    @error('client_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-md-6">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" name="deskripsi" id="deskripsi"
                                           class="form-control @error('deskripsi') is-invalid @enderror"
                                           value="{{ old('deskripsi', $client->deskripsi) }}">
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status1" id="status1"
                                            class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="aktif" {{ old('status', $client->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="nonaktif" {{ old('status', $client->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Upload Gambar -->
                                <div class="col-md-6">
                                    <label for="path_gambar" class="form-label">Gambar</label>
                                    <input type="file" name="path_gambar" id="path_gambar"
                                           class="form-control @error('path_gambar') is-invalid @enderror"
                                           accept=".jpg,.jpeg,.png">
                                    @error('path_gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if ($client->path_gambar)
                                        <div class="mt-2">
                                            <img src="{{ asset($client->path_gambar) }}" alt="Gambar Client" class="img-thumbnail" width="120">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('client_web.index') }}" class="btn btn-light">
                                    <i class="fas fa-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
