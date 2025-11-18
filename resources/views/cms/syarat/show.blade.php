@extends('upcube.central')
@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Detail {{ $submenu }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                            <li class="breadcrumb-item active">Detail {{ $submenu }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title mb-0">Detail Syarat</h4>
                            <a href="{{ route('syarat_web.index') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th width="20%">Nama Syarat</th>
                                        <td>{{ $syarat->nama_syarat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $syarat->deskripsi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Detail Syarat</th>
                                        <td>{!! $syarat->syarat !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span class="badge {{ $syarat->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($syarat->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Gambar</th>
                                        <td>
                                            @if($syarat->path_gambar)
                                                <img src="{{ asset($syarat->path_gambar) }}" alt="Gambar Syarat" class="img-thumbnail" width="150">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat Oleh</th>
                                        <td>{{ $syarat->dibuat_oleh }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Dibuat</th>
                                        <td>{{ $syarat->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diubah</th>
                                        <td>{{ $syarat->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('syarat_web.edit', Crypt::encryptString($syarat->id)) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
