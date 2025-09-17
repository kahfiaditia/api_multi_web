<div class="menu-content h-100" data-simplebar>
    <ul class="metismenu left-sidenav-menu">

        <!-- Label -->
        <li class="menu-label my-3 text-uppercase text-muted fw-bold small">
            Sistem CMS
        </li>

        <!-- Dashboard -->
        <li>
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
                <i data-feather="home" class="menu-icon me-2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Manajemen Web -->
        <li>
            <a href="javascript:void(0);" class="d-flex align-items-center justify-content-between">
                <span><i data-feather="layout" class="menu-icon me-2"></i> Manajemen Web</span>
                <i class="mdi mdi-chevron-right"></i>
            </a>
            <ul class="nav-second-level list-unstyled ps-4 mt-2">
                <li><a href="{{ route('profil_web.index') }}"><i class="ti-control-record text-primary me-2"></i>Profil Web</a></li>
                <li><a href="#"><i class="ti-control-record text-primary me-2"></i>Banner</a></li>
                <li><a href="#"><i class="ti-control-record text-primary me-2"></i>Blog</a></li>
                <li><a href="#"><i class="ti-control-record text-primary me-2"></i>Teams</a></li>
                <li><a href="#"><i class="ti-control-record text-primary me-2"></i>Sambutan</a></li>
                <li><a href="#"><i class="ti-control-record text-primary me-2"></i>Visi dan Misi</a></li>
                <li><a href="#"><i class="ti-control-record text-primary me-2"></i>Sosial Media</a></li>
                <li><a href="#"><i class="ti-control-record text-primary me-2"></i>Gallery</a></li>
                <li><a href="#"><i class="ti-control-record text-primary me-2"></i>Kegiatan</a></li>
            </ul>
        </li>

        <!-- Data Masyarakat -->
        <li>
            <a href="javascript:void(0);" class="d-flex align-items-center justify-content-between">
                <span><i data-feather="users" class="menu-icon me-2"></i> Data Masyarakat</span>
                <i class="mdi mdi-chevron-right"></i>
            </a>
            <ul class="nav-second-level list-unstyled ps-4 mt-2">
                <li><a href="#"><i class="ti-control-record text-success me-2"></i>RT</a></li>
                <li><a href="#"><i class="ti-control-record text-success me-2"></i>RW</a></li>
                <li><a href="#"><i class="ti-control-record text-success me-2"></i>Data Pekerjaan</a></li>
                <li><a href="#"><i class="ti-control-record text-success me-2"></i>Agama</a></li>
                <li><a href="#"><i class="ti-control-record text-success me-2"></i>Kartu Keluarga</a></li>
                <li><a href="#"><i class="ti-control-record text-success me-2"></i>KTP</a></li>
            </ul>
        </li>

    </ul>
</div>
