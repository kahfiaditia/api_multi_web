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
                </div><!--end col-->
                <div class="col-auto align-self-center">
                    <a href="{{ route('profil_desa.create') }}" class="btn btn-sm btn-outline-primary">
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
                                <th>Kode Pos</th>
                                <th>Nama</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Jumlah RT</th>
                                <th>Jumlah Warga</th>
                                <th>Action</th>
                            </tr> 
                    </thead>
                    <tbody>
                        {{-- {{ dd($data_desa) }} --}}
                        {{-- @foreach ($data_desa as $item) --}}
                            <tr>
                                <td>{{ $data_desa->kepala_desa }}</td>
                                <td>{{ $data_desa->kode_pos }}</td>
                                <td>{{ $data_desa->nama_desa }}</td>
                                <td>{{ $data_desa->provinsi }}</td>
                                <td>{{ $data_desa->kabupaten }}</td>
                                <td>{{ $data_desa->kecamatan }}</td>
                                <td>{{ $data_desa->jumlah_warga }}</td>
                              
                                {{-- <td>
                                        @if($item->status == 0)
                                            <span class="badge badge-soft-success"> Aktif </span>
                                        @else
                                            <span class="badge badge-soft-primary"> Tidak Aktif </span>
                                        @endif
                                </td> --}}
                                <td>
                                    <form class="delete-form"
                                    action="{{ route('profil_desa.destroy', Crypt::encryptString($data_desa->id)) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex gap-3">

                                        <a href="{{ route('profil_desa.edit', Crypt::encryptString($data_desa->id)) }}" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                                        <a href="{{ route('profil_desa.show', Crypt::encryptString($data_desa->id)) }}" class="mr-2"><i class="las la-print text-info font-18"></i></a>
                                        <a href class="text-danger delete_confirm"><i
                                                class="las la-trash-alt text-danger font-18"></i></a>

                                    </div>
                                </form>                                                  
                                   
                                    
                                </td>
                            </tr>
                        
                        {{-- @endforeach --}}
                   
                    </tbody>
                </table>        
            </div>
        </div>
    </div>
</div>
@endsection