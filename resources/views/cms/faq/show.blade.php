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
                                <h4 class="card-title mb-0">Detail FAQ</h4>
                                <a href="{{ route('faq_web.index') }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="20%">Website</th>
                                            <td>{{ $faq->website->nama_web }}</td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Pertanyaan</th>
                                            <td>{{ $faq->pertanyaan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jawaban</th>
                                            <td>{!! $faq->jawaban !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Keterangan</th>
                                            <td>{{ $faq->keterangan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <span class="badge {{ $faq->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ ucfirst($faq->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Dibuat</th>
                                            <td>{{ $faq->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Terakhir Diubah</th>
                                            <td>{{ $faq->updated_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('faq_web.edit', Crypt::encryptString($faq->id)) }}" class="btn btn-warning">
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
