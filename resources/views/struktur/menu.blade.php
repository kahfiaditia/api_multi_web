<div class="menu-content h-100" data-simplebar>
    <ul class="metismenu left-sidenav-menu">
        <li class="menu-label mt-0">Menu</li>
        
        <li>
            <a href="{{ route('dashboard') }}"><i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
        </li>
        <li>
            <a href="javascript: void(0);"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Data Master</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route('data_user.index') }}"><i class="ti-control-record"></i>User</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('member.index') }}"><i class="ti-control-record"></i>Member</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rak.index') }}"><i class="ti-control-record"></i>Rak</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('buku.index') }}"><i class="ti-control-record"></i>Buku</a></li>
            </ul>
        </li> 

        <li>
            <a href="javascript: void(0);"><i data-feather="lock" class="align-self-center menu-icon"></i><span>Transaksi</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route('penyimpanan.index') }}"><i class="ti-control-record"></i>Penyimpanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Peminjaman</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Pengembalian</a></li>
            </ul>
        </li> 

        <li>
            <a href="javascript: void(0);"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Laporan</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Laporan Pengembalian</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Laporan Denda</a></li>
            </ul>
        </li> 
        
       
        
        <hr class="hr-dashed hr-menu">
        <li class="menu-label my-2">Sistem Perpustakaan</li>
        {{-- <li>
            <a href="javascript: void(0);"><i data-feather="file" class="align-self-center menu-icon"></i><span>Invoice</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route('data_invoice.index') }}"><i class="ti-control-record"></i>Data Pengirim</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('data_penerima.index') }}"><i class="ti-control-record"></i>Data Penerima</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('invoice') }}"><i class="ti-control-record"></i>Data Invoice</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"><i data-feather="file" class="align-self-center menu-icon"></i><span>Surat</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route('surat_pemberitahuan.index') }}"><i class="ti-control-record"></i>Pemberitahuan</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Surat Kuasa</a></li>
            </ul>
        </li> 
        <li>
            <a href="javascript: void(0);"><i data-feather="file-plus" class="align-self-center menu-icon"></i><span>Keterangan</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Template</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Sistem Versi</a></li>
            </ul>
        </li>            --}}
    </ul>
</div>