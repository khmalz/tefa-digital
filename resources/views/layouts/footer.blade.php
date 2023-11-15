    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row" style="row-gap: 15px">
                <div class="col-md-4">
                    <h3>Tefa Digital</h3>

                    <span><q>Mendukung kreatifitas siswa berjiwa wirausaha.</q></span>
                    <div class="mt-3">
                        <div class="social-links d-flex flex-column" style="row-gap: 5px">
                            <a target="_blank" class="d-flex align-items-center gap-1"
                                href="{{ url('https://www.instagram.com/smknegeri46jakarta') }}">
                                <div class="instagram icon">
                                    <i class="bx bxl-instagram"></i>
                                </div>
                                <span class="text-white">Instagram</span>
                            </a>
                            <a target="_blank" class="d-flex align-items-center gap-1"
                                href="{{ url('https://smkn46jaktim.sch.id') }}">
                                <div class="icon website">
                                    <i class="bx bx-globe"></i>
                                </div>
                                <span class="text-white">Website</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 class="position-relative fs-3 p-0" style="margin: 0 0 20px 0;">Categories</h4>

                    <div class="footer-links d-flex flex-column w-full gap-3">
                        <div>
                            <a href="{{ route('user.design.index') }}">Design</a>
                        </div>
                        <div>
                            <a href="{{ route('user.photography.index') }}">Photography</a>
                        </div>
                        <div>
                            <a href="{{ route('user.videography.index') }}">Videography</a>
                        </div>
                        <div>
                            <a href="{{ route('user.printing.index') }}">Printing</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 class="position-relative fs-3 p-0" style="margin: 0 0 20px 0;">Sub-Categories</h4>
                    <div class="footer-links">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <span>Design</span>
                                <hr style="width: 30%">
                                <div class="d-flex flex-column">
                                    <a href="{{ route('user.design.design-3d') }}">3D</a>
                                    <a href="{{ route('user.design.design-logo') }}">Logo</a>
                                    <a href="{{ route('user.design.design-promosi') }}">Promotion</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <span>Photography</span>
                                <hr style="width: 30%">
                                <div class="d-flex flex-column">
                                    <a href="{{ route('user.photography.foto-acara') }}">Event</a>
                                    <a href="{{ route('user.photography.foto-pernikahan') }}">Wedding</a>
                                    <a href="{{ route('user.photography.foto-produk') }}">Product</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <span>Videography</span>
                                <hr style="width: 30%">
                                <div class="d-flex flex-column">
                                    <a href="{{ route('user.videography.vid-dokumentasi') }}">Documentation</a>
                                    <a href="{{ route('user.videography.vid-syuting') }}">Shooting</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <span>Printing</span>
                                <hr style="width: 30%">
                                <a href="{{ route('user.printing.index') }}">3D</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="copyright">
                    &copy;Copyright <strong><span>SMK Negeri 46</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->
