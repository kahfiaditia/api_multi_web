@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">{{ $submenu }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">{{ $list }}</h4>
                    <a href="{{ route('sambutan_web.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>

                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Area</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cms_sambutans as $sambutan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sambutan->nama }}</td>
                            <td>{{ $sambutan->area }}</td>
                            <td>
                                @if($sambutan->path_sambutan && file_exists(public_path($sambutan->path_sambutan)))
                                    <img src="{{ asset($sambutan->path_sambutan) }}" alt="Foto" width="100">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>
                                @if($sambutan->status1)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('sambutan_web.show', Crypt::encryptString($sambutan->id)) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('sambutan_web.edit', Crypt::encryptString($sambutan->id)) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('sambutan_web.destroy', Crypt::encryptString($sambutan->id)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data sambutan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
