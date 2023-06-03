@extends('layouts.main')

@section('header')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="d-flex align-items-center justify-content-between container">
            <div class="logo">
                <h1><a href="#">Tefa Digital</a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#features">Services</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
@endsection

@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel carousel-fade" data-bs-ride="carousel">

            <img src="https://images.unsplash.com/photo-1603380353725-f8a4d39cc41e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                alt="" style="width: 100%; filter: brightness(55%)">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Tefa digital</span></h2>
                    <p class="animate__animated fanimate__adeInUp">Tefa digital adalah website inovatif yang berdedikasi
                        untuk meningkatkan pendidikan dan membantu siswa mencapai potensi terbaik mereka.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Kenali Jasa Kami</h2>
                    <p class="animate__animated animate__fadeInUp">Kami hadir menyediakan jasa yang dapat membantu
                        memperhemat waktu Anda dan memberikan pengalaman yang menarik.</p>
                    <a href="#features"
                        class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            </a>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" style="position: absolute"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" style="opacity: 25%" fill="#fff">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" style="opacity: 15%" fill="#fff">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section>
    <!-- End Hero -->
@endsection

@section('main')
    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>About</h2>
                    <p>Apa itu tefa digital?</p>
                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6">
                        <p>
                            Tefa digital adalah website inovatif yang berdedikasi untuk meningkatkan pendidikan dan membantu
                            siswa mencapai potensi terbaik mereka. Kami hadir dengan visi untuk menjadi prasarana pendidikan
                            yang relevan dan mendukung kegiatan pembelajaran siswa sesuai kurikulum yang berlaku.
                        </p>
                        <p>
                            Website ini bertujuan untuk memperjualbelikan hasil karya siswa SMK Negeri 46 Jakarta, yang
                            diharapkan mampu merepresentasikan fungsi teaching factory sebagai model pembelajaran berbasis
                            industri. Dengan layanan-layanan pada website ini juga diharapkan dapat membantu siswa dalam
                            memperoleh pengalaman kewirausahaan dengan cara yang lebih mudah dan praktis.
                        </p>
                    </div>
                    <div class="col-lg-6 pt-lg-0 pt-4">
                        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                            alt="" style="width: 75%;">
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <ul class="nav nav-tabs row d-flex">
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="200">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                            <i class="ri-sun-line"></i>
                            <h4 class="d-none d-lg-block">Digital Design</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                            <i class="ri-gps-line"></i>
                            <h4 class="d-none d-lg-block">Photography</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="100">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                            <i class="ri-body-scan-line"></i>
                            <h4 class="d-none d-lg-block">Videography</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="300">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                            <i class="ri-store-line"></i>
                            <h4 class="d-none d-lg-block">Printing</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" data-aos="fade-up">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 mt-lg-0 order-2 mt-3">
                                <h3>Wujudkan ide-ide visual Anda menjadi karya digital yang memukau.</h3>
                                <p class="fst-italic">
                                    Kami adalah jasa digital design yang berdedikasi untuk menghadirkan karya desain yang
                                    menakjubkan dan berdampak.
                                    Dalam era digital yang terus berkembang, kami memahami pentingnya tampilan yang menarik
                                    dan profesional untuk membedakan identitas bisnis Anda dari yang lain.
                                    Kami memiliki 3 jasa untuk menghasilkan branding yang baik untuk perusahaan Anda :
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Jasa Logo Design</li>
                                    <li><i class="ri-check-double-line"></i> Jasa 3D Design</li>
                                    <li><i class="ri-check-double-line"></i> Jasa Digital Marketing</li>
                                </ul>
                                <button type="button" class="btn btn-color" style="color: #f06404">
                                    <a href="">Selengkapnya</a>
                                </button>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center">
                                <img src="assets/img/features-3.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 mt-lg-0 order-2 mt-3">
                                <h3>Jadikan momen-momen berharga Anda menjadi film yang memukau.</h3>
                                <p class="fst-italic">
                                    Apakah Anda mencari jasa videografi yang dapat mengabadikan momen berharga Anda dengan
                                    keindahan dan kualitas sinematik?
                                    Kami memahami betapa pentingnya setiap momen yang ditampilkan kembali secara sempurna
                                    bagi Anda,
                                    dan itulah mengapa kami menangkap setiap detail dengan kecermatan.
                                    Dari syuting yang melelahkan hingga acara bisnis yang megah, kami berkomitmen untuk
                                    menciptakan video yang autentik
                                    dan seakan menceritakannya kembali dengan sentuhan artistik. Untuk memenuhi
                                    masing-masing kebutuhan yang berbeda pada setiap hasil video yang memukau,
                                    kami memiliki 2 jenis jasa videografi yang ditawarkan :
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Jasa Video Syuting</li>
                                    <li><i class="ri-check-double-line"></i> Jasa Video Dokumentasi</li>
                                </ul>
                                <button type="button" class="btn btn-color" style="color: #f06404">
                                    <a href="">Selengkapnya</a>
                                </button>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center">
                                <img src="assets/img/features-2.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 mt-lg-0 order-2 mt-3">
                                <h3>Abadikan momen berharga dengan keindahan yang abadi.</h3>
                                <p class="fst-italic">
                                    Apakah Anda ingin mengabadikan momen-momen berharga dalam hidup Anda dengan cara yang
                                    istimewa?
                                    Kami hadir dengan jasa fotografi yang menghadirkan keahlian profesional dan sentuhan
                                    kreatif
                                    untuk menciptakan gambar-gambar yang tak terlupakan. Kami memiliki 3 jenis jasa
                                    fotografi yang
                                    dapat membantu anda dalam menemukan style fotografi yang cocok untuk momen berharga anda
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Jasa Foto Produk</li>
                                    <li><i class="ri-check-double-line"></i> Jasa Foto Pernikahan</li>
                                    <li><i class="ri-check-double-line"></i> Jasa Foto Acara</li>
                                </ul>
                                <button type="button" class="btn btn-color" style="color: #f06404">
                                    <a href="">Selengkapnya</a>
                                </button>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center">
                                <img src="assets/img/features-1.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 mt-lg-0 order-2 mt-3">
                                <h3>Realisasikan design Anda menjadi nyata dengan 3D Printing.</h3>
                                <p class="fst-italic">
                                    Kami menyediakan jasa 3D Printing yang memungkinkan Anda menghasilkan objek fisik dengan
                                    presisi tinggi dan kebebasan kreatif yang tak terbatas.
                                    Dengan teknologi canggih dan bahan berkualitas, kami menghadirkan solusi 3D Printing
                                    yang disesuaikan dengan kebutuhan Anda.
                                </p>
                                <button type="button" class="btn btn-color" style="color: #f06404">
                                    <a href="">Selengkapnya</a>
                                </button>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center">
                                <img src="assets/img/features-4.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Features Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Portfolio</h2>
                    <p>What we've done</p>
                </div>

                <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>

                <div class="row portfolio-container" data-aos="fade-up">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Portfolio Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-lg-0 mt-5" data-aos="fade-left">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-md-0 mt-3">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main>
    <!-- End #main -->
@endsection
