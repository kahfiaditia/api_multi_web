<!-- Page-Title -->
@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">{{ $submenu }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $menu }}</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
                <div class="col-auto align-self-center">
                    <a href="{{ route('peminjaman.create') }}" class="btn btn-sm btn-outline-primary">
                        <i data-feather="file-plus" class="align-self-center icon-xs"></i>
                        <span class="" id="Select_date">Tambah Data</span> 
                    </a>
                </div> 
            </div>                                                            
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Nama Peminjam</th>
                                <th>Jumlah Buku</th>
                                <th>Denda</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr> 
                    </thead>
                    <tbody>
                        @foreach ($penyimpanan as $item)
                            <tr>
                                <td>
                                    {{ $item->kode_pinjam }}
                                </td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->id_siswa }}</td>
                                <td>{{ $item->denda }}</td>
                                <td>
                                    {{ $item->jumlah_buku}}
                                </td>
                                <td>
                                    {{ $item->status}}
                                </td>
                                <td>
                                    <form class="delete-form"
                                    action="{{ route('penyimpanan.destroy', Crypt::encryptString($item->id)) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex gap-3">

                                        <a href="{{ route('penyimpanan.edit', Crypt::encryptString($item->id)) }}" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                                        <a href class="text-danger delete_confirm"><i
                                                class="las la-trash-alt text-danger font-18"></i></a>

                                    </div>
                                </form>                                                  
                                   
                                    
                                </td>
                            </tr>
                        
                        @endforeach
                   
                    </tbody>
                </table>        
            </div>
        </div>
    </div>
</div>
@endsection