@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <h4 class="mb-3">Edit Corporate Legal Advice</h4>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <form action="{{ route('produk_legal.update', $produk_legal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul Bagian --}}
                    <div class="mb-3">
                        <label for="judul_bagian" class="form-label">Judul Bagian</label>
                        <input type="text" name="judul_bagian" id="judul_bagian"
                            class="form-control @error('judul_bagian') is-invalid @enderror"
                            value="{{ old('judul_bagian', $produk_legal->judul_bagian) }}" maxlength="150" required>
                        @error('judul_bagian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Umum</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $produk_legal->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Keterangan --}}
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan Tambahan (opsional)</label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $produk_legal->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ================= POINS ================= --}}
                    <hr>
                    @for ($i = 1; $i <= 3; $i++)
                        <h5 class="mb-3">Poin {{ $i }}</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="judul_poin{{ $i }}" class="form-label">Judul Poin {{ $i }}</label>
                                <input type="text" name="judul_poin{{ $i }}" id="judul_poin{{ $i }}"
                                    class="form-control"
                                    value="{{ old('judul_poin'.$i, $produk_legal->{'judul_poin'.$i}) }}" maxlength="150">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="icon{{ $i }}" class="form-label">Icon {{ $i }} (opsional)</label>
                                <input type="text" name="icon{{ $i }}" id="icon{{ $i }}"
                                    class="form-control"
                                    value="{{ old('icon'.$i, $produk_legal->{'icon'.$i}) }}" maxlength="100">
                                <small class="text-muted">Contoh: "shield", "law", "gavel"</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_poin{{ $i }}" class="form-label">Deskripsi Poin {{ $i }}</label>
                            <textarea name="deskripsi_poin{{ $i }}" id="deskripsi_poin{{ $i }}" rows="2"
                                class="form-control">{{ old('deskripsi_poin'.$i, $produk_legal->{'deskripsi_poin'.$i}) }}</textarea>
                        </div>
                        <hr>
                    @endfor

                    {{-- ====================================== --}}
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="urutan" class="form-label">Urutan</label>
                            <input type="number" name="urutan" id="urutan"
                                class="form-control"
                                value="{{ old('urutan', $produk_legal->urutan) }}" min="0">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="status_produk" class="form-label">Status</label>
                            <select name="status_produk" id="status_produk"
                                class="form-select" required>
                                <option value="Aktif" {{ old('status_produk', $produk_legal->status_produk) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Nonaktif" {{ old('status_produk', $produk_legal->status_produk) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="path_gambar" class="form-label">Gambar</label>
                            <input type="file" name="path_gambar" id="path_gambar"
                                class="form-control" accept=".jpg,.jpeg,.png">
                            @if($produk_legal->path_gambar)
                                <div class="mt-2">
                                    <img src="{{ asset($produk_legal->path_gambar) }}" alt="Gambar Lama" class="img-thumbnail" width="150">
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('produk_legal.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Perbarui</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- TinyMCE --}}
<script>
    tinymce.init({
        selector: '#elm1',
        height: 300,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code',
        toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
                 'alignleft aligncenter alignright alignjustify | ' +
                 'bullist numlist outdent indent | removeformat | help'
    });
</script>
@endsection
