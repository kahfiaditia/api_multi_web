@extends('upcube.central')

@section('datacontent')
<div class="page-content">
    <div class="container-fluid">

        <h4 class="mb-3">Detail Galeri</h4>

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                {{-- Judul --}}
                <div class="mb-3">
                    <h5 class="text-primary"><i class="fas fa-images"></i> {{ $galery->judul_galery }}</h5>
                </div>

                {{-- Keterangan --}}
                <div class="mb-3">
                    <strong>Keterangan:</strong>
                    <p class="text-muted">{{ $galery->keterangan ?? '-' }}</p>
                </div>

                {{-- Foto --}}
                <div class="row">
                    @for ($i = 1; $i <= 6; $i++)
                        @php
                            $field = 'path_foto_' . $i;
                        @endphp
                        @if ($galery->$field)
                            <div class="col-md-4 mb-3">
                                <div class="card shadow-sm border-0">
                                    <img src="{{ asset($galery->$field) }}" class="card-img-top rounded"
                                        alt="Foto {{ $i }}">
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <strong>Status:</strong>
                    @if($galery->status == '1')
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </div>

                {{-- Informasi Tambahan --}}
                <div class="mb-3">
                    <small class="text-muted">
                        Dibuat pada: {{ $galery->created_at ? $galery->created_at->format('d M Y H:i') : '-' }} <br>
                        Diperbarui pada: {{ $galery->updated_at ? $galery->updated_at->format('d M Y H:i') : '-' }}
                    </small>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('galery_web.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
