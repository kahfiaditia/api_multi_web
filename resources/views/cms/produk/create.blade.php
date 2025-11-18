@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <h4 class="mb-3">Tambah Produk</h4>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <form action="{{ route('produk_web.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_web" class="form-label">Nama Website</label>
                        <select name="nama_web" id="nama_web" class="form-control" required>
                            <option value="">-- Pilih Website --</option>
                            @foreach ($website as $data)
                                <option value="{{ $data->id }}" {{ old('nama_web') == $data->id ? 'selected' : '' }}>
                                    {{ $data->nama_web }} - {{ $data->sub_web }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_web')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk"
                               class="form-control @error('nama_produk') is-invalid @enderror"
                               value="{{ old('nama_produk') }}" required maxlength="100">
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi"
                               class="form-control @error('deskripsi') is-invalid @enderror"
                               value="{{ old('deskripsi') }}" required maxlength="250">
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="harga_normal" class="form-label">Harga Normal</label>
                            <input type="number" name="harga_normal" id="harga_normal"
                                   class="form-control @error('harga_normal') is-invalid @enderror"
                                   value="{{ old('harga_normal') }}" required step="0.01">
                            @error('harga_normal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga_diskon" class="form-label">Harga Diskon</label>
                            <input type="number" name="harga_diskon" id="harga_diskon"
                                   class="form-control @error('harga_diskon') is-invalid @enderror"
                                   value="{{ old('harga_diskon') }}" step="0.01">
                            @error('harga_diskon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="elm1" rows="3"
                                  class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="path_gambar" class="form-label">Gambar Produk</label>
                        <input type="file" name="path_gambar" id="path_gambar"
                               class="form-control @error('path_gambar') is-invalid @enderror"
                               accept="image/*">
                        @error('path_gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: jpg, jpeg, png. Maksimal 2MB</small>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status1" id="status1"
                                class="form-select @error('status') is-invalid @enderror" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('produk_web.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<script>
        tinymce.init({
            selector: '#elm1',
            height: 400,
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | help'
        });
</script>
@endsection
