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
                            <h5 class="card-title mb-4 text-warning"><i class="fas fa-edit"></i> Form Edit Sambutan</h5>

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


                            <form action="{{ route('sambutan_web.update', Crypt::encryptString($sambutan->id)) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">
                                    <!-- Nama -->
                                    <div class="col-md-6">
                                        <label for="nama" class="form-label">Nama Lengkap <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ old('nama', $sambutan->nama) }}" placeholder="Masukkan nama lengkap"
                                            required>
                                    </div>

                                    <!-- Area -->
                                    <div class="col-md-12">
                                        <label for="area" class="form-label">Area</label>
                                        <textarea name="area" id="area" class="form-control" rows="3"
                                            placeholder="Tuliskan area sambutan">{{ old('area', $sambutan->area) }}</textarea>
                                    </div>

                                    <!-- Foto -->
                                    <div class="col-md-6">
                                        <label for="path_sambutan" class="form-label">Foto Sambutan</label>
                                        <input type="file" name="path_sambutan" id="path_sambutan" class="form-control"
                                            accept=".jpg,.jpeg,.png">
                                        @if ($sambutan->path_sambutan)
                                            <div class="mt-2">
                                                <img src="{{ asset('assets/images/sambutan/' . $sambutan->path_sambutan) }}"
                                                    alt="Foto Sambutan" class="img-thumbnail" style="max-height: 120px;">
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label for="status1" class="form-label">Status</label>
                                        <select name="status1" id="status1" class="form-select" required>
                                            <option value="1" {{ $sambutan->status1 == 1 ? 'selected' : '' }}>Aktif</option>
                                            <option value="0" {{ $sambutan->status1 == 0 ? 'selected' : '' }}>Non Aktif</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('sambutan_web.index') }}" class="btn btn-light">
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
