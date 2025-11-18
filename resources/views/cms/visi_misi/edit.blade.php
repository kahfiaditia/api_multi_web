@extends('upcube.central')
@section('datacontent')
    <div class="page-content">
        <div class="container-fluid">

            <!-- page title -->
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
                            <h5 class="card-title mb-4 text-primary"><i class="fas fa-edit"></i> Form Edit Visi Misi</h5>

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

                            <form action="{{ route('visi_misi_web.update', Crypt::encryptString($visimisi->id)) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label for="nama_web" class="form-label">Pilih Website <span
                                                class="text-danger">*</span></label>
                                        <select name="nama_web" id="nama_web" class="form-control" required>
                                            <option value="">Pilih</option>
                                            @foreach ($website as $data)
                                                <option value="{{ $data->id }}" data-subweb="{{ $data->sub_web }}"
                                                    {{ $visimisi->id_web == $data->id ? 'selected' : '' }}>
                                                    {{ $data->nama_web }} - {{ $data->sub_web }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" class="form-control"
                                            value="{{ old('keterangan', $visimisi->keterangan) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="visi" class="form-label">Visi</label>
                                        <textarea name="visi" id="visi" class="form-control" rows="4">{{ old('visi', $visimisi->visi) }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="misi" class="form-label">Misi</label>
                                        <textarea name="misi" id="misi" class="form-control" rows="4">{{ old('misi', $visimisi->misi) }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="path_gambar_visi" class="form-label">Gambar Visi</label>
                                        @if ($visimisi->path_gambar_visi)
                                            <div class="mb-2">
                                                <img src="{{ asset($visimisi->path_gambar_visi) }}" class="img-thumbnail"
                                                    width="120">
                                            </div>
                                        @endif
                                        <input type="file" name="path_gambar_visi" id="path_gambar_visi"
                                            class="form-control" accept=".jpg,.jpeg,.png">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="path_gambar_misi" class="form-label">Gambar Misi</label>
                                        @if ($visimisi->path_gambar_misi)
                                            <div class="mb-2">
                                                <img src="{{ asset($visimisi->path_gambar_misi) }}" class="img-thumbnail"
                                                    width="120">
                                            </div>
                                        @endif
                                        <input type="file" name="path_gambar_misi" id="path_gambar_misi"
                                            class="form-control" accept=".jpg,.jpeg,.png">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status1" class="form-label">Status</label>
                                        <select name="status1" id="status1" class="form-select" required>
                                             <option value="">-- Pilih Status --
                                            </option>
                                            <option value="1" {{ $visimisi->status1 == 1 ? 'selected' : '' }}>Aktif
                                            </option>
                                            <option value="0" {{ $visimisi->status1 == 0 ? 'selected' : '' }}>Nonaktif
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex justify-content-end gap-2">
                                    <a href="{{ route('visi_misi_web.index') }}" class="btn btn-light"><i
                                            class="fas fa-arrow-left"></i> Batal</a>
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i>
                                        Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
