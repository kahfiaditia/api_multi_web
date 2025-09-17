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
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">{{ $list }}</h4>
                                <!-- Tombol Tambah -->
                                <a href="{{ route('profil_web.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>

                            <p class="card-title-desc">
                                Halaman ini menampilkan data profil perusahaan/website, termasuk informasi
                                nama perusahaan, alamat, kontak, serta detail lainnya.
                                Anda dapat menambah, melihat, mengubah, atau menghapus data profil di sini.
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <th>Nama Web</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Nomor HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($cms_profils)
                                        <tr>
                                            <td>{{ $cms_profils->nama_pt }}</td>
                                            <td>{{ $cms_profils->nama_web }}</td>
                                            <td>{{ $cms_profils->alamat_lengkap }}</td>
                                            <td>{{ $cms_profils->email_1 }}</td>
                                            <td>{{ $cms_profils->telepon_1 }}</td>
                                            <td>{{ $cms_profils->telepon_2 }}</td>
                                            <td>
                                                <form class="delete-form d-inline"
                                                    action="{{ route('profil_web.destroy', Crypt::encryptString($cms_profils->id)) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="d-flex gap-2">
                                                        <!-- View -->
                                                        <a href="{{ route('profil_web.show', Crypt::encryptString($cms_profils->id)) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>

                                                        <!-- Edit -->
                                                        <a href="{{ route('profil_web.edit', Crypt::encryptString($cms_profils->id)) }}"
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
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">
                                                <i class="fas fa-info-circle"></i> Data profil belum tersedia.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
