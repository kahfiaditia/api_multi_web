 <footer class="dark-footer">
            <div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-3">
    <div class="footer-widget">
        <img src="{{ asset('assets/img/logo-light.svg') }}" class="img-footer" alt="" />
        <div class="footer-add">
            <address class="mb-4 lh-base">
                {{ optional($profil)->alamat_lengkap ?? 'Alamat belum tersedia' }}
            </address>

            <div class="d-flex align-items-center call-now gap-2 mb-3">
                <div class="square--30 circle bg-light-main text-main">
                    <i class="bi bi-telephone"></i>
                </div>
                <div class="fs-6 fw-semibold">
                    {{ optional($profil)->telepon_1 ?? 'Belum ada nomor telepon' }}
                </div>
            </div>

            <div class="d-flex align-items-center call-now gap-2">
                <div class="square--30 circle bg-light-main text-main">
                    <i class="bi bi-envelope"></i>
                </div>
                <div class="fs-6 fw-semibold">
                    {{ optional($profil)->email_1 ?? 'Belum ada email' }}
                </div>
            </div>
        </div>
    </div>
</div>


                        <div class="col-lg-2 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">Layanan</h4>
                                <ul class="footer-menu">
                                    <li><a href="{{ route('produk') }}">Corporate Legal Advice</a></li>
                                    <li><a href="{{ route('litigasi') }}">Litigation</a></li>
                                    <li><a href="{{ route('contract') }}">Contract and Preparation</a></li>
                                    <li><a href="{{ route('legal') }}">Legal Audit</a></li>
                                    <li><a href="{{ route('opinion') }}">Legal Opinion</a></li>
                                    <li><a href="{{ route('protection') }}">Legal Protection</a></li>
                                    <li><a href="{{ route('probono') }}">Probono (Legal Aid)</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">Bantuan</h4>
                                <ul class="footer-menu">
                                    <li><a href="{{ route('kontak') }}">Konsultasi Gratis</a></li>
                                    <li><a href="#">Live Chat</a></li>
                                    <li><a href="#">Privasi</a></li>
                                    <li><a href="#">Syarat & Ketentuan</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12">
                            <div class="footer-widget">
                                <h4 class="widget-title">Jam Operasional</h4>
                                <div class="opening-hours">
                                    <p>Senin - Jumat: 08:00 - 17:00</p>
                                    <p>Sabtu: 09:00 - 15:00</p>
                                    <p>Minggu: Tutup</p>
                                </div>
                                <div class="social-links mt-3">
                                    <a href="#" class="btn btn-sm btn-outline-light me-2"><i
                                            class="bi bi-facebook"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-light me-2"><i
                                            class="bi bi-twitter"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-light me-2"><i
                                            class="bi bi-linkedin"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-light"><i
                                            class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center g-3">

                        <div class="col-lg-6 col-md-6">
                            <p class="mb-0">© 2020-2025 Firma Hukum. Hak Cipta Dilindungi.</p>
                        </div>

                        <div class="col-lg-6 col-md-6 text-md-end">
                            <ul class="footer-bottom-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </footer>