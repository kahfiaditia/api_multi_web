<div class="menu-content h-100" data-simplebar>
    <ul class="metismenu left-sidenav-menu">
        <li class="menu-label mt-0">Sistem Perpustakaan</li>
        
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
                <li class="nav-item"><a class="nav-link" href="{{ route('peminjaman.index') }}"><i class="ti-control-record"></i>Peminjaman</a></li>
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
        <li class="menu-label my-2">Sistem Desa</li>
        <li>
            <a href="javascript: void(0);"><i data-feather="file" class="align-self-center menu-icon"></i><span>Manajemen Web</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profil_desa.index') }}"><i class="ti-control-record"></i>Profil Desa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('desa_blog.index') }}"><i class="ti-control-record"></i>Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('desa_perangkat.index') }}"><i class="ti-control-record"></i>Perangkat Desa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('desa_sambutan.index') }}"><i class="ti-control-record"></i>Sambutan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('desa_visi.index') }}"><i class="ti-control-record"></i>Visi dan Misi</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">
                    <i class="ti-control-record"></i>Sosial Media</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">
                    <i class="ti-control-record"></i>Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="ti-control-record"></i>Kegiatan</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"><i data-feather="file" class="align-self-center menu-icon"></i><span>Data Masyarakat</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>RT</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>RW</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Data Pekerjaan</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Agama</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('invoice') }}"><i class="ti-control-record"></i>Kartu Keluarga</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('data_invoice.index') }}"><i class="ti-control-record"></i>KTP</a></li>
            </ul>
        </li>
       
    </ul>
</div>