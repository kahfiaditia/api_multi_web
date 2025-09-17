@extends('upcube.central')
@section('datacontent')
    <div class="page-content">
        <div class="container-fluid">

            <!-- page title -->
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
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title mb-4 text-primary"><i class="fas fa-info-circle"></i> Detail Visi Misi</h5>

                            <dl class="row">
                                <dt class="col-sm-3">Keterangan</dt>
                                <dd class="col-sm-9">{{ $visimisi->keterangan ?? '-' }}</dd>

                                <dt class="col-sm-3">Visi</dt>
                                <dd class="col-sm-9">{!! nl2br(e($visimisi->visi)) !!}</dd>

                                <dt class="col-sm-3">Misi</dt>
                                <dd class="col-sm-9">{!! nl2br(e($visimisi->misi)) !!}</dd>

                                <dt class="col-sm-3">Status</dt>
                                <dd class="col-sm-9">
                                    @if($visimisi->status1)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </dd>

                                <dt class="col-sm-3">Gambar Visi</dt>
                                <dd class="col-sm-9">
                                    @if($visimisi->path_gambar_visi)
                                        <img src="{{ asset($visimisi->path_gambar_visi) }}" class="img-thumbnail" width="200">
                                    @else -
                                    @endif
                                </dd>

                                <dt class="col-sm-3">Gambar Misi</dt>
                                <dd class="col-sm-9">
                                    @if($visimisi->path_gambar_misi)
                                        <img src="{{ asset($visimisi->path_gambar_misi) }}" class="img-thumbnail" width="200">
                                    @else -
                                    @endif
                                </dd>
                            </dl>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('visi_misi_web.index') }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <a href="{{ route('visi_misi_web.edit', Crypt::encryptString($visimisi->id)) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
