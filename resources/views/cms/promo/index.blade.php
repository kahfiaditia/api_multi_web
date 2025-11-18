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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $menu }}</a></li>
                                <li class="breadcrumb-item active">{{ $submenu }}</li>
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
                                <h4 class="card-title mb-0">{{ $list }}</h4>
                                <!-- Tombol Tambah -->
                                <a href="{{ route('promo_web.create') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Promo
                                </a>
                            </div>

                            <p class="text-muted mb-4">
                                Halaman ini menampilkan daftar promo website, termasuk informasi nama promo,
                                deskripsi, status, dan gambar. Anda dapat menambah, melihat detail, mengubah,
                                atau menghapus data promo di sini.
                            </p>

                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Promo</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Gambar</th>
                                            <th>Link</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Dibuat Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($cms_promo as $index => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_promo }}</td>
                                                <td>{{ Str::limit($item->deskripsi, 80, '...') }}</td>
                                                <td>
                                                    <span class="badge {{ $item->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($item->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($item->path_gambar)
                                                        <img src="{{ asset($item->path_gambar) }}" 
                                                            alt="promo" class="img-thumbnail" width="70">
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->link)
                                                        <a href="{{ $item->link }}" target="_blank" class="text-primary">
                                                            {{ $item->link }}
                                                        </a>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->dibuat_oleh ?? '-' }}</td>
                                                <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '-' }}</td>
                                                <td>
                                                    <form class="delete-form d-inline"
                                                        action="{{ route('promo_web.destroy', Crypt::encryptString($item->id)) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="btn-group" role="group">
                                                            <!-- View -->
                                                            <a href="{{ route('promo_web.show', Crypt::encryptString($item->id)) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                            <!-- Edit -->
                                                            <a href="{{ route('promo_web.edit', Crypt::encryptString($item->id)) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <!-- Delete -->
                                                            <button type="button" class="btn btn-sm btn-danger delete_confirm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-muted">
                                                    <i class="fas fa-info-circle"></i> Data promo belum tersedia.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
