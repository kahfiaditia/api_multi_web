@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <h4 class="mb-3">Tambah Galeri</h4>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
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

                <form action="{{ route('galery_web.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="judul_galery" class="form-label">Judul Galeri</label>
                        <input type="text" name="judul_galery" id="judul_galery"
                            class="form-control @error('judul_galery') is-invalid @enderror"
                            placeholder="Masukkan Judul Galeri" value="{{ old('judul_galery') }}" required>
                        @error('judul_galery')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Keterangan --}}
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="form-control @error('keterangan') is-invalid @enderror"
                            placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Upload Foto --}}
                    <div class="row">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="col-md-4 mb-3">
                                <label for="path_foto_{{ $i }}" class="form-label">Foto {{ $i }}</label>
                                <input type="file" name="path_foto_{{ $i }}" id="path_foto_{{ $i }}"
                                    class="form-control @error('path_foto_'.$i) is-invalid @enderror"
                                    accept="image/*">
                                @error('path_foto_'.$i)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endfor
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status1" id="status1" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('galery_web.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
