@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Daftar Layanan Legal</h4>
                    <div>
                        <a href="{{ route('layanan_legal.create') }}" class="btn btn-primary btn-sm">Tambah Baru</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- table -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Judul Bagian</th>
                            <th>Produk Legal</th>
                            <th>Keterangan</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($layanan_legal as $index => $item)
                            <tr>
                                <td>{{ $layanan_legal->firstItem() + $index }}</td>
                                <td>{{ $item->id_produk_legal }}</td>
                                <td>{{ $item->judul_bagian }}</td>
                                <td>{{ $item->produk->keterangan ?? '-' }}</td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                                <td>{{ $item->urutan }}</td>
                                <td>
                                    @if($item->status_produk == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('layanan_legal.show', Crypt::encryptString($item->id)) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('layanan_legal.edit', Crypt::encryptString($item->id)) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('layanan_legal.destroy', Crypt::encryptString($item->id)) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data layanan legal.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-end mt-3">
                    {{ $layanan_legal->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
