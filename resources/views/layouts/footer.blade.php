    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row" style="row-gap: 15px">
                <div class="col-md-4">
                    <h3>Tefa Digital</h3>

                    <span><i>Mendukung kreatifitas siswa berjiwa wirausaha.</i></span>
                    <div class="mt-3">
                        <div class="social-links d-flex flex-column" style="row-gap: 5px">
                            <div class="d-flex align-items-center">
                                <a target="_blank" href="{{ url('https://www.instagram.com/smknegeri46jakarta') }}"
                                    class="instagram mt-1">
                                    <i class="bx bxl-instagram"></i>
                                </a>
                                <span>Instagram</span><br>
                            </div>
                            <div class="d-flex align-items-center">
                                <a target="_blank"
                                    href="{{ url('https://smksedkijakarta.wordpress.com/kota/jakarta-timur/smk-negeri-46') }}"
                                    class="wordpress mt-1">
                                    <i class="bx bxl-wordpress"></i>
                                </a>
                                <span>Wordpress</span><br>
                            </div>
                            <div class="d-flex align-items-center">
                                <a target="_blank" href="{{ url('https://smkn46jaktim.sch.id') }}" class=website mt-1">
                                    <i class="bx bx-globe"></i>
                                </a>
                                <span>Website</span>
                            </div>
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
                                <span>Design</span><br>
                                <hr style="width: 25%">
                                <a href="{{ route('user.design.design-3d') }}">3D</a><br>
                                <a href="{{ route('user.design.design-logo') }}">Logo</a><br>
                                <a href="{{ route('user.design.design-promosi') }}">Promotion</a>
                            </div>
                            <div class="col-md-6 mb-4">
                                <span>Photography</span><br>
                                <hr style="width: 25%">
                                <a href="{{ route('user.photography.foto-acara') }}">Event</a><br>
                                <a href="{{ route('user.photography.foto-pernikahan') }}">Wedding</a><br>
                                <a href="{{ route('user.photography.foto-produk') }}">Product</a>
                            </div>
                            <div class="col-md-6 mb-4">
                                <span>Videography</span><br>
                                <hr style="width: 25%">
                                <a href="{{ route('user.videography.vid-dokumentasi') }}">Documentation</a><br>
                                <a href="{{ route('user.videography.vid-syuting') }}">Shooting</a><br>
                            </div>
                            <div class="col-md-6 mb-4">
                                <span>Printing</span><br>
                                <hr style="width: 25%">
                                <a href="{{ route('user.printing.index') }}">3D</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="copyright">
                    &copy; Copyright <strong><span>SMK Negeri 46</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->