@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <h4 class="mb-3">Tambah Corporate Legal Advice</h4>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <form action="{{ route('produk_legal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul Bagian --}}
                    <div class="mb-3">
                        <label for="judul_bagian" class="form-label">Judul Bagian</label>
                        <input type="text" name="judul_bagian" id="judul_bagian"
                               class="form-control @error('judul_bagian') is-invalid @enderror"
                               value="{{ old('judul_bagian') }}" maxlength="150" required>
                        @error('judul_bagian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Umum</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                                  class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Keterangan --}}
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan Tambahan (opsional)</label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                                  class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ================= POINS ================= --}}
                    <hr>
                    <h5 class="mb-3">Poin 1</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="judul_poin1" class="form-label">Judul Poin 1</label>
                            <input type="text" name="judul_poin1" id="judul_poin1"
                                   class="form-control @error('judul_poin1') is-invalid @enderror"
                                   value="{{ old('judul_poin1') }}" maxlength="150">
                            @error('judul_poin1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="icon1" class="form-label">Icon 1 (opsional)</label>
                            <input type="text" name="icon1" id="icon1"
                                   class="form-control @error('icon1') is-invalid @enderror"
                                   value="{{ old('icon1') }}" maxlength="100">
                            @error('icon1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Contoh: "shield", "law", "gavel"</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_poin1" class="form-label">Deskripsi Poin 1</label>
                        <textarea name="deskripsi_poin1" id="deskripsi_poin1" rows="2"
                                  class="form-control @error('deskripsi_poin1') is-invalid @enderror">{{ old('deskripsi_poin1') }}</textarea>
                        @error('deskripsi_poin1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <h5 class="mb-3">Poin 2</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="judul_poin2" class="form-label">Judul Poin 2</label>
                            <input type="text" name="judul_poin2" id="judul_poin2"
                                   class="form-control @error('judul_poin2') is-invalid @enderror"
                                   value="{{ old('judul_poin2') }}" maxlength="150">
                            @error('judul_poin2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="icon2" class="form-label">Icon 2 (opsional)</label>
                            <input type="text" name="icon2" id="icon2"
                                   class="form-control @error('icon2') is-invalid @enderror"
                                   value="{{ old('icon2') }}" maxlength="100">
                            @error('icon2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Contoh: "balance-scale", "contract"</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_poin2" class="form-label">Deskripsi Poin 2</label>
                        <textarea name="deskripsi_poin2" id="deskripsi_poin2" rows="2"
                                  class="form-control @error('deskripsi_poin2') is-invalid @enderror">{{ old('deskripsi_poin2') }}</textarea>
                        @error('deskripsi_poin2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <h5 class="mb-3">Poin 3</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="judul_poin3" class="form-label">Judul Poin 3</label>
                            <input type="text" name="judul_poin3" id="judul_poin3"
                                   class="form-control @error('judul_poin3') is-invalid @enderror"
                                   value="{{ old('judul_poin3') }}" maxlength="150">
                            @error('judul_poin3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="icon3" class="form-label">Icon 3 (opsional)</label>
                            <input type="text" name="icon3" id="icon3"
                                   class="form-control @error('icon3') is-invalid @enderror"
                                   value="{{ old('icon3') }}" maxlength="100">
                            @error('icon3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Contoh: "file-text", "regulation"</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_poin3" class="form-label">Deskripsi Poin 3</label>
                        <textarea name="deskripsi_poin3" id="deskripsi_poin3" rows="2"
                                  class="form-control @error('deskripsi_poin3') is-invalid @enderror">{{ old('deskripsi_poin3') }}</textarea>
                        @error('deskripsi_poin3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ====================================== --}}
                    <hr>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="urutan" class="form-label">Urutan</label>
                            <input type="number" name="urutan" id="urutan"
                                   class="form-control @error('urutan') is-invalid @enderror"
                                   value="{{ old('urutan', 0) }}" min="0">
                            @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="status_produk" class="form-label">Status</label>
                            <select name="status_produk" id="status_produk"
                                    class="form-select @error('status_produk') is-invalid @enderror" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Aktif" {{ old('status_produk') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Nonaktif" {{ old('status_produk') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="path_gambar" class="form-label">Gambar</label>
                            <input type="file" name="path_gambar" id="path_gambar"
                                   class="form-control @error('path_gambar') is-invalid @enderror"
                                   accept=".jpg,.jpeg,.png">
                            @error('path_gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('produk_legal.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
