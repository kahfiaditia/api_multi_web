@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Layanan Legal</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('layanan_legal.update', $layanan_legal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Judul Bagian <span class="text-danger">*</span></label>
                            <input type="text" name="judul_bagian" value="{{ $layanan_legal->judul_bagian }}" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Produk Legal</label>
                            <select name="id_produk_legal" class="form-control" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach ($produk_legal as $produk)
                                    <option value="{{ $produk->id }}" {{ $layanan_legal->id_produk_legal == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->keterangan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" value="{{ $layanan_legal->keterangan }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4">{{ $layanan_legal->deskripsi }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Poin 1</label>
                            <input type="text" name="poin1" value="{{ $layanan_legal->poin1 }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Poin 2</label>
                            <input type="text" name="poin2" value="{{ $layanan_legal->poin2 }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Poin 3</label>
                            <input type="text" name="poin3" value="{{ $layanan_legal->poin3 }}" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Icon</label>
                            <input type="text" name="icon" value="{{ $layanan_legal->icon }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Urutan</label>
                            <input type="number" name="urutan" value="{{ $layanan_legal->urutan }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Status Produk</label>
                            <select name="status_produk" class="form-control">
                                <option value="Aktif" {{ $layanan_legal->status_produk == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Nonaktif" {{ $layanan_legal->status_produk == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Perbarui</button>
                        <a href="{{ route('layanan_legal.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
