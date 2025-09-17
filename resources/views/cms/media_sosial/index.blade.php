@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">{{ $submenu }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">{{ $list }}</h4>
                    <a href="{{ route('sosial_web.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>

                <table id="datatable-buttons" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Media</th>
                            <th>Link</th>
                            <th>Keterangan</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cms_sosial as $item)
                            <tr>
                                <td>{{ $item->nama_media }}</td>
                                <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    @if ($item->path_logo)
                                        <img src="{{ asset($item->path_logo) }}" alt="Logo" width="40">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $item->status == '1' ? 'success' : 'secondary' }}">
                                        {{ $item->status == '1' ? 'Aktif' : 'Non Aktif' }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('sosial_web.destroy', Crypt::encryptString($item->id)) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a href="{{ route('sosial_web.show', Crypt::encryptString($item->id)) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('sosial_web.edit', Crypt::encryptString($item->id)) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger delete_confirm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fas fa-info-circle"></i> Belum ada data sosial media.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
