@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">
        <!-- Judul halaman -->
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $title ?? 'Tambah Layanan Legal' }}</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('layanan_legal.store') }}" method="POST">
                    @csrf

                    <!-- Baris 1 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan Title">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Title Deskripsi</label>
                            <textarea name="title_deskripsi" class="form-control" rows="2" placeholder="Masukkan Title Deskripsi"></textarea>
                        </div>
                    </div>

                    <!-- Baris 2 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Judul Bagian <span class="text-danger">*</span></label>
                            <input type="text" name="judul_bagian" class="form-control" required placeholder="Masukkan Judul Bagian">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Produk Legal</label>
                            <select name="id_produk_legal" class="form-control">
                                <option value="">-- Pilih Produk --</option>
                                @foreach ($produk_legal as $produk)
                                    <option value="{{ $produk->id }}">{{ $produk->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Baris 3 -->
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                    </div>

                    <!-- Baris 4 -->
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan Deskripsi"></textarea>
                    </div>

                    <!-- Baris 5 -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Poin 1</label>
                            <input type="text" name="poin1" class="form-control" placeholder="Poin pertama">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Poin 2</label>
                            <input type="text" name="poin2" class="form-control" placeholder="Poin kedua">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Poin 3</label>
                            <input type="text" name="poin3" class="form-control" placeholder="Poin ketiga">
                        </div>
                    </div>

                    <!-- Baris 6 -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Icon</label>
                            <input type="text" name="icon" class="form-control" placeholder="fa-solid fa-scale-balanced">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Urutan</label>
                            <input type="number" name="urutan" class="form-control" value="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Status Produk</label>
                            <select name="status_produk" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('layanan_legal.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
