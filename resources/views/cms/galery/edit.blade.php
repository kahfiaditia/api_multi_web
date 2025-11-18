@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <h4 class="mb-3">Edit Galeri</h4>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <form action="{{ route('galery_web.update', Crypt::encryptString($galery->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="judul_galery" class="form-label">Judul Galeri</label>
                        <input type="text" name="judul_galery" id="judul_galery"
                            class="form-control @error('judul_galery') is-invalid @enderror"
                            value="{{ old('judul_galery', $galery->judul_galery) }}" required>
                        @error('judul_galery')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Keterangan --}}
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="form-control @error('keterangan') is-invalid @enderror"
                            required>{{ old('keterangan', $galery->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Foto --}}
                    <div class="row">
                        @for ($i = 1; $i <= 6; $i++)
                            @php
                                $field = 'path_foto_' . $i;
                            @endphp
                            <div class="col-md-4 mb-3">
                                <label for="{{ $field }}" class="form-label">Foto {{ $i }}</label>
                                @if ($galery->$field)
                                    <div class="mb-2">
                                        <img src="{{ asset($galery->$field) }}" alt="Foto {{ $i }}" class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file" name="{{ $field }}" id="{{ $field }}"
                                    class="form-control @error($field) is-invalid @enderror" accept="image/*">
                                @error($field)
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
                            <option value="1" {{ old('status', $galery->status) == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('status', $galery->status) == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('galery_web.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
