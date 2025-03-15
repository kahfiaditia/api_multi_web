<!-- Page-Title -->
@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Data Surat</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Surat</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pemberitahuan</a></li>
                    </ol>
                </div><!--end col-->
                <div class="col-auto align-self-center">
                    <a href="{{ route('surat_pemberitahuan.create') }}" class="btn btn-sm btn-outline-primary">
                        <i data-feather="file-plus" class="align-self-center icon-xs"></i>
                        <span class="" id="Select_date">Tambah Data</span> 
                    </a>
                </div>  
            </div>                                                            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nomor Surat</th>
                                <th>Untuk</th>
                                <th>Pengirim</th>
                                <th>Action</th>
                            </tr> 
                    </thead>
                    <tbody>
                       {{-- {{ dd($data_surat)}} --}}
                        @foreach ($data_surat as $item)
                            <tr>
                                <td>
                                    
                                    {{ $item->created_at}}
                                        
                                </td>
                                <td>{{ $item->nomor_surat }}

                                </td>
                                <td>{{ $item->untuk }}</td>
                                <td>{{ $item->nama_pengirim }}</td>
                                <td>
                                    <form class="delete-form"
                                    action="{{ route('surat_pemberitahuan.destroy', Crypt::encryptString($item->id)) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex gap-3">

                                        <a href="{{ route('surat_pemberitahuan.edit', Crypt::encryptString($item->id)) }}" class="mr-2"><i class="las la-pen text-info font-18"></i>
                                        </a>
                                        <a href="{{ route('surat.download', Crypt::encrypt($item->id)) }}" class="mr-2">
                                            <i class="las la-download text-primary font-18"></i>
                                        </a>
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
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection