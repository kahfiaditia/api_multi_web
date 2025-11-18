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
                                <a href="{{ route('client_web.create') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>

                            <p class="text-muted mb-4">
                                Halaman ini menampilkan data client yang bekerja sama dengan perusahaan/website. 
                                Anda dapat menambah, melihat, mengubah, atau menghapus data client di sini.
                            </p>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Client</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th style="width: 12%">Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($cms_client as $client)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $client->client_name }}</td>
                                                <td>{{ $client->deskripsi ?? '-' }}</td>
                                                <td>
                                                    <span class="badge {{ $client->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($client->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($client->path_gambar)
                                                        <img src="{{ asset($client->path_gambar) }}" 
                                                             alt="gambar-client" class="img-thumbnail" width="80">
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form class="delete-form d-inline"
                                                        action="{{ route('client_web.destroy', Crypt::encryptString($client->id)) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="btn-group" role="group">
                                                            <!-- View -->
                                                            <a href="{{ route('client_web.show', Crypt::encryptString($client->id)) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                            <!-- Edit -->
                                                            <a href="{{ route('client_web.edit', Crypt::encryptString($client->id)) }}"
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
                                                    <i class="fas fa-info-circle"></i> Data client belum tersedia.
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
