<!-- Page-Title -->
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
                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">{{ $list }}</h4>
                                <!-- Tombol Tambah -->
                                <a href="{{ route('banner_Web.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>

                            <p class="card-title-desc">
                                Halaman ini menampilkan data banner website, termasuk judul, gambar, link, serta status.
                                Anda dapat menambah, melihat detail, mengubah, atau menghapus data banner di sini.
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Link</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($cms_banners as $banner)
                                        <tr>
                                            <td>{{ $banner->judul_banner ?? 'Tidak ada data' }}</td>
                                            <td class="text-center">
                                                @if ($banner->path_gambar && file_exists(public_path($banner->path_gambar)))
                                                    <img src="{{ asset($banner->path_gambar) }}" alt="Banner"
                                                        class="img-thumbnail" style="max-height: 60px;">
                                                @else
                                                    <span class="text-muted">Tidak ada data</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!empty($banner->link))
                                                    <a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a>
                                                @else
                                                    <span class="text-muted">Tidak ada data</span>
                                                @endif
                                            </td>
                                            <td>{{ $banner->keterangan ?? 'Tidak ada data' }}</td>
                                            <td>
                                               
                                                    <span
                                                        class="badge bg-{{ $banner->status == 1 ? 'Aktif' : 'Non Aktif' }}">
                                                        {{ ucfirst($banner->status) }}
                                                    </span>
                                                
                                            </td>
                                            <td>
                                                <form class="delete-form d-inline"
                                                    action="{{ route('banner_Web.destroy', Crypt::encryptString($banner->id)) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="d-flex gap-2">
                                                        <!-- View -->
                                                        <a href="{{ route('banner_Web.show', Crypt::encryptString($banner->id)) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        <!-- Edit -->
                                                        <a href="{{ route('banner_Web.edit', Crypt::encryptString($banner->id)) }}"
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
                                            <td colspan="6" class="text-center text-muted">
                                                <i class="fas fa-info-circle"></i> Data banner belum tersedia.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
