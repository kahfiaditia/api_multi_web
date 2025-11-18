@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">
        <h4 class="mb-3">{{ $title }}</h4>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title">{{ $list ?? 'Daftar Produk' }}</h5>
                    <a href="{{ route('produk_web.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Harga Normal</th>
                                <th>Harga Diskon</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Dibuat Oleh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cms_produks as $produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>Rp {{ number_format($produk->harga_normal, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($produk->harga_diskon, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $produk->status == 'aktif' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($produk->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($produk->path_gambar && file_exists(public_path($produk->path_gambar)))
                                            <img src="{{ asset($produk->path_gambar) }}" 
                                                 alt="{{ $produk->nama_produk }}" 
                                                 class="img-thumbnail" width="80">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>{{ $produk->dibuat_oleh }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('produk_web.show', Crypt::encryptString($produk->id)) }}" 
                                               class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('produk_web.edit', Crypt::encryptString($produk->id)) }}" 
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('produk_web.destroy', Crypt::encryptString($produk->id)) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Belum ada produk</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
