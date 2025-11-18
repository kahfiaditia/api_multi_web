@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- Start Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $title }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">{{ $submenu }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Card Table -->
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-sm">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $list }}</h5>
                        <a href="{{ route('produk_legal.create') }}" class="btn btn-primary btn-sm">
                            <i class="bx bx-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Judul</th>
                                        <th>Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Gambar</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produk_legal as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $item->judul_bagian }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ Str::limit($item->deskripsi, 80) }}</td>
                                            <td class="text-center">
                                                @if ($item->status_produk == 'Aktif')
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-secondary">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->path_gambar)
                                                    <img src="{{ asset($item->path_gambar) }}" alt="Gambar" class="rounded" width="70">
                                                @else
                                                    <span class="text-muted">Tidak ada</span>
                                                @endif
                                            </td>

                                            <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('produk_legal.show', Crypt::encryptString($item->id)) }}" 
                                               class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('produk_legal.edit', Crypt::encryptString($item->id)) }}" 
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('produk_legal.destroy', Crypt::encryptString($item->id)) }}" 
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
                                            <td colspan="6" class="text-center text-muted">Belum ada data Corporate Legal Advice</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Table -->

    </div>
</div>
@endsection
