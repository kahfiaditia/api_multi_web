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
                            <h4 class="card-title mb-0">Detail Kebijakan</h4>
                            <a href="{{ route('kebijakan_web.index') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th width="20%">Nama Kebijakan</th>
                                        <td>{{ $kebijakan->nama_syarat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $kebijakan->deskripsi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Detail Kebijakan</th>
                                        <td>{!! $kebijakan->syarat !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span class="badge {{ $kebijakan->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($kebijakan->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Gambar</th>
                                        <td>
                                            @if($kebijakan->path_gambar)
                                                <img src="{{ asset($kebijakan->path_gambar) }}" alt="Gambar Kebijakan" class="img-thumbnail" width="150">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat Oleh</th>
                                        <td>{{ $kebijakan->dibuat_oleh }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Dibuat</th>
                                        <td>{{ $kebijakan->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diubah</th>
                                        <td>{{ $kebijakan->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('kebijakan_web.edit', Crypt::encryptString($kebijakan->id)) }}" class="btn btn-warning">
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
