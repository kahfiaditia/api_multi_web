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
                    <div class="card shadow-sm rounded-3">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">{{ $list }}</h4>
                                <!-- Tombol Tambah -->
                                <a href="{{ route('faq_web.create') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>

                            <p class="text-muted mb-4">
                                Halaman ini menampilkan data FAQ (Frequently Asked Questions).
                                Anda dapat menambah, melihat, mengubah, atau menghapus data FAQ di sini.
                            </p>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Website</th>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($cms_faq as $faq)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $faq->website->nama_web }}</td>
                                                <td>{{ $faq->pertanyaan }}</td>
                                                <td>{!! Str::limit(strip_tags($faq->jawaban), 80, '...') !!}</td>
                                                <td>{{ $faq->keterangan ?? '-' }}</td>
                                                <td>
                                                    <span class="badge {{ $faq->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($faq->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <form class="delete-form d-inline"
                                                        action="{{ route('faq_web.destroy', Crypt::encryptString($faq->id)) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="btn-group" role="group">
                                                            <!-- View -->
                                                            <a href="{{ route('faq_web.show', Crypt::encryptString($faq->id)) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                            <!-- Edit -->
                                                            <a href="{{ route('faq_web.edit', Crypt::encryptString($faq->id)) }}"
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
                                                    <i class="fas fa-info-circle"></i> Data FAQ belum tersedia.
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
