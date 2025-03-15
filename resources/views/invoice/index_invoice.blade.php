<!-- Page-Title -->
@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Data Invoice</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoice</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoice</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!--end col-->
                <div class="col-auto align-self-center">
                    <a href="{{ route('buat_invoice') }}" class="btn btn-sm btn-outline-primary">
                        <i data-feather="file-plus" class="align-self-center icon-xs"></i>
                        <span class="" id="Select_date">Tambah Data</span> 
                    </a>
                </div><!--end col-->  
            </div><!--end row-->                                                              
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Pengirim</th>
                                <th>Nama Penerima</th>
                                <th>Nomor Invoice</th>
                               
                                <th>Action</th>
                            </tr> 
                    </thead>
                    <tbody>
                       {{-- {{ dd($data_penerima)}} --}}
                        @foreach ($data_invoice as $item)
                            <tr>
                                <td>
                                    
                                    {{ $item->created_at}}
                                        
                                </td>
                                <td>{{ $item->pengirim->nama_pengirim ?? 'Tidak Ada Pengirim' }}

                                </td>
                                <td>{{ $item->penerima->nama_penerima }}</td>
                                <td>{{ $item->nomor_invoice }}</td>
                                <td>
                                    <form class="delete-form"
                                    action="{{ route('data_user.destroy', Crypt::encryptString($item->id)) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex gap-3">

                                        <a href="{{ route('data_user.edit', Crypt::encryptString($item->id)) }}" class="mr-2"><i class="las la-pen text-info font-18"></i>
                                        </a>
                                        <a href="{{ route('invoice.lihat', Crypt::encryptString($item->id)) }}" class="mr-2"><i class="las la-eye text-primary font-18"></i>
                                        </a>
                                        <a href class="text-danger delete_confirm"><i
                                                class="las la-trash-alt text-danger font-18"></i>
                                        </a>

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