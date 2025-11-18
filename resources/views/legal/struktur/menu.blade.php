 <div class="header header-light head-shadow">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{ route('depan') }}">
                            <img src="{{ asset('assets2/img/logo/legalitas.png') }}" class="logo"
                                alt="Logo Firma Hukum" />
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu">

                            <li class="active"><a href="{{ route('depan') }}">Beranda</a></li>
                             <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                            <li><a href="#">Layanan<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ route('produk') }}">Corporate Legal Advice</a></li>
                                    <li><a href="{{ route('litigasi') }}">Litigation</a></li>
                                    <li><a href="{{ route('contract') }}">Contract and Preparation</a></li>
                                    <li><a href="{{ route('legal') }}">Legal Audit</a></li>
                                    <li><a href="{{ route('opinion') }}">Legal Opinion</a></li>
                                    <li><a href="{{ route('protection') }}">Legal Protection</a></li>
                                    <li><a href="{{ route('probono') }}">Probono (Legal Aid)</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('kontak') }}">Kontak</a></li>

                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">
                            <li class="join-btn">
                                <a href="{{ route('kontak') }}" data-bs-toggle="modal" data-bs-target="#login"><i
                                        class="bi bi-box-arrow-in-right"></i>Konsultasi Gratis</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>