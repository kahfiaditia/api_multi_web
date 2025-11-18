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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">{{ $list }}</h4>
                                <!-- Tombol Tambah -->
                                <a href="{{ route('visi_misi_web.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>

                            <p class="card-title-desc">
                                Halaman ini menampilkan data visi & misi website.
                                Anda dapat menambah, melihat detail, mengubah, atau menghapus data di sini.
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Web</th>
                                        {{-- <th>Keterangan</th> --}}
                                        <th>Visi</th>
                                        <th>Misi</th>
                                        {{-- <th>Gambar Visi</th>
                                        <th>Gambar Misi</th> --}}
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($cms_visi_misi as $key => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->website->nama_web }}</td>
                                            {{-- <td>{{ Str::limit($item->keterangan, 50) }}</td> --}}
                                            <td>{{ Str::limit($item->visi, 50) }}</td>
                                            <td>{{ Str::limit($item->misi, 50) }}</td>
                                            {{-- <td>
                                                @if ($item->path_gambar_visi)
                                                    <img src="{{ asset($item->path_gambar_visi) }}" alt="Gambar Visi"
                                                        class="img-thumbnail" width="70">
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->path_gambar_misi)
                                                    <img src="{{ asset($item->path_gambar_misi) }}" alt="Gambar Misi"
                                                        class="img-thumbnail" width="70">
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td> --}}
                                            <td>
                                                @if ($item->status1 == 1)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-secondary">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form class="delete-form d-inline"
                                                    action="{{ route('visi_misi_web.destroy', Crypt::encryptString($item->id)) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="d-flex gap-2">
                                                        <!-- View -->
                                                        <a href="{{ route('visi_misi_web.show', Crypt::encryptString($item->id)) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>

                                                        <!-- Edit -->
                                                        <a href="{{ route('visi_misi_web.edit', Crypt::encryptString($item->id)) }}"
                                                            class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>

                                                        <!-- Delete -->
                                                        <button type="button" class="btn btn-sm btn-danger delete_confirm">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">
                                                <i class="fas fa-info-circle"></i> Data visi & misi belum tersedia.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
