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
                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">{{ $list }}</h4>
                                <!-- Tombol Tambah -->
                                <a href="{{ route('tagline_web.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>

                            <p class="card-title-desc">
                                Halaman ini menampilkan data tagline website, termasuk judul, deskripsi, isi, icon, gambar
                                serta status. Anda dapat menambah, melihat detail, mengubah, atau menghapus data tagline di sini.
                            </p>

                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Isi</th>
                                        <th>Icon</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($cms_tagline as $tagline)
                                        <tr>
                                            <td>{{ $tagline->judul ?? '-' }}</td>
                                            <td>{{ $tagline->deskripsi ?? '-' }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($tagline->isi, 50) ?? '-' }}</td>
                                            <td class="text-center">
                                                @if (!empty($tagline->icon))
                                                    <i class="{{ $tagline->icon }}"></i>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($tagline->path_gambar && file_exists(public_path($tagline->path_gambar)))
                                                    <img src="{{ asset($tagline->path_gambar) }}" alt="Tagline"
                                                         class="img-thumbnail" style="max-height: 60px;">
                                                @else
                                                    <span class="text-muted">Tidak ada gambar</span>
                                                @endif
                                            </td>
                                            <td>{{ $tagline->status ?? '-' }}</td>
                                            <td>
                                                <form class="delete-form d-inline"
                                                      action="{{ route('tagline_web.destroy', Crypt::encryptString($tagline->id)) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="d-flex gap-2">
                                                        <!-- View -->
                                                        <a href="{{ route('tagline_web.show', Crypt::encryptString($tagline->id)) }}"
                                                           class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        <!-- Edit -->
                                                        <a href="{{ route('tagline_web.edit', Crypt::encryptString($tagline->id)) }}"
                                                           class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <!-- Delete -->
                                                        <button type="button"
                                                                class="btn btn-sm btn-danger delete_confirm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">
                                                <i class="fas fa-info-circle"></i> Data tagline belum tersedia.
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
