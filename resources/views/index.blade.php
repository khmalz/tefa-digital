@extends('layouts.main')

@section('header')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="d-flex align-items-center justify-content-between container">
            <div class="logo">
                <h1><a href="{{ route('home') }}">{{ $websiteTitle }}</a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#features">Services</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    @auth
                        <li class="dropdown"><a href="#"><span>Welcome, {{ auth()->user()->name }}</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">{{ auth()->user()->email }}</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                                        @csrf
                                        <a href="#"
                                            onclick="return confirm('Yakin ? ') ? this.parentElement.submit() : null">Log
                                            Out</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a class="nav-link" href="{{ route('login.index') }}">Login</a></li>
                    @endauth
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
            <div class="carousel-image-container">
                <img src="https://images.unsplash.com/photo-1603380353725-f8a4d39cc41e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    alt="">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Welcome to <span>{{ $websiteTitle }}</span></h2>
                        <p class="animate__animated fanimate__adeInUp">{{ $websiteTitle }} adalah website inovatif yang
                            berdedikasi
                            untuk meningkatkan pendidikan dan membantu siswa mencapai potensi terbaik mereka.</p>
                        <a href="#about"
                            class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
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
    <main id="main" data-mail-success="{{ session('success') }}" data-mail-failure="{{ session('failure') }}">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="section-title" data-aos="zoom-out">
                    <h2>About</h2>
                    <p>Apa itu {{ $websiteTitle }}?</p>
                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6">
                        <p style="text-align: justify">
                            {{ $websiteTitle }} adalah website inovatif yang berdedikasi untuk meningkatkan pendidikan dan
                            membantu
                            siswa mencapai potensi terbaik mereka. Kami hadir dengan visi untuk menjadi prasarana pendidikan
                            yang relevan dan mendukung kegiatan pembelajaran siswa sesuai kurikulum yang berlaku.
                        </p>
                        <p style="text-align: justify">
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
                <ul class="nav nav-tabs d-flex gap-md-4 flex-nowrap gap-1">
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="200">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                            <i class="bi bi-camera"></i>
                            <h4 class="d-none d-lg-block">Digital Design</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                            <i class="bi bi-camera-reels"></i>
                            <h4 class="d-none d-lg-block">Photography</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="100">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                            <i class="bi bi-flower1"></i>
                            <h4 class="d-none d-lg-block">Videography</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="300">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                            <i class="bi bi-printer"></i>
                            <h4 class="d-none d-lg-block">Printing</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" data-aos="fade-up">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 mt-lg-0 order-2 mt-3">
                                <h3>Mengubah Konsep - Konsep yang Telah Anda Buat Menjadi Desain
                                    yang Memikat</h3>
                                <p class="fst-italic">
                                    Dengan pemahaman mendalam tentang estetika dan keahlian teknis kami,
                                    kami menciptakan solusi desain yang unik dan menginspirasi.
                                    Dari ilustrasi yang menawan hingga desain papan iklan yang menarik,
                                    kami membantu merek Anda mengkomunikasikan pesan dengan gaya yang khas.
                                    Jadikan kami mitra kreatif Anda dalam merancang identitas visual yang tak terlupakan.
                                    Kami memiliki 3 jasa untuk menghasilkan branding yang baik untuk Anda :
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Jasa Logo Design</li>
                                    <li><i class="ri-check-double-line"></i> Jasa 3D Design</li>
                                    <li><i class="ri-check-double-line"></i> Jasa Digital Marketing</li>
                                </ul>
                                <button type="button"
                                    class="btn btn-get-started animate__animated animate__fadeInUp scrollto"
                                    style="color: #f06404">
                                    <a href="{{ route('user.design.index') }}">Selengkapnya</a>
                                </button>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center">
                                <img src="{{ asset('assets/img/design.jpg') }}" alt="Design" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 mt-lg-0 order-2 mt-3">
                                <h3>Memburu Moment yang Mengabadikan Keindahan Dalam Setiap Bidikan</h3>
                                <p class="fst-italic">
                                    Dalam setiap pertemuan atau acara pasti terdapat moment - moment yang hadir tanpa di
                                    duga.
                                    Untuk mengabadikan moment - moment tersebut dalam sebuah bidikan, anda membutuhkan
                                    sebuah jasa fotografi.
                                </p>
                                <p>
                                    Sebuah jasa fotografi yang memiliki keahlian profesional dalam mengoperasikan kamera,
                                    sehingga dapat menghasilkan gambar - gambar yang indah dan memikat hati anda. Untuk itu,
                                    kami hadir dengan jasa - jasa yang kami miliki, salah satunya adalah jasa fotografi.
                                </p>
                                <p>
                                    Kami memiliki 3 jenis jasa fotografi yang mungkin anda butuhkan, diantaranya yaitu:
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Jasa Foto Produk</li>
                                    <li><i class="ri-check-double-line"></i> Jasa Foto Pernikahan</li>
                                    <li><i class="ri-check-double-line"></i> Jasa Foto Acara</li>
                                </ul>
                                <button type="button" class="btn btn-color" style="color: #f06404">
                                    <a href="{{ route('user.photography.index') }}">Selengkapnya</a>
                                </button>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center">
                                <img src="{{ asset('assets/img/photo.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 mt-lg-0 order-2 mt-3">
                                <h3>Mengubah Moment yang Hadir Menjadi Karya Seni Bergerak</h3>
                                <p>
                                    Untuk mengubah moment yang hadir menjadi sebuah karya seni bergerak,
                                    anda membutuhkan sebuah jasa videografi dan kami hadir untuk itu.
                                    Kami hadir dengan jasa videografi yang memiliki pemahaman mendalam serta keahlian
                                    profesional
                                    dalam pembuatan karya seni bergerak yang anda inginkan.
                                </p>
                                <p>
                                    Kami memiliki 2 jenis jasa videografi yang mungkin anda butuhkan, diantaranya yaitu:
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Jasa Video Syuting</li>
                                    <li><i class="ri-check-double-line"></i> Jasa Video Dokumentasi</li>
                                </ul>
                                <button type="button" class="btn btn-color" style="color: #f06404">
                                    <a href="{{ route('user.videography.index') }}">Selengkapnya</a>
                                </button>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center">
                                <img src="{{ asset('assets/img/video.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 mt-lg-0 order-2 mt-3">
                                <h3>Mengubah Gagasan Anda menjadi Karya Nyata.</h3>
                                <p>
                                    Dengan teknologi printing terkini dan berbagai opsi material,
                                    kami menciptakan cetakan yang menonjol dan berkualitas tinggi.
                                    Dari brosur yang menggugah minat hingga spanduk yang menarik perhatian,
                                    kami membantu merek Anda tampil mencolok dan menghadirkan pesan yang kuat kepada
                                    audiens.
                                    Jadikan kami mitra dalam mencetak keberhasilan Anda
                                </p>
                                <button type="button" class="btn btn-color" style="color: #f06404">
                                    <a href="{{ route('user.printing.index') }}">Selengkapnya</a>
                                </button>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 text-center">
                                <img src="{{ asset('assets/img/print.jpg') }}" alt="" class="img-fluid">
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

                <ul id="portfolio-flters" class="d-md-flex justify-content-end d-inline-block" data-aos="fade-up">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($portfolioCategories as $category)
                        <li data-filter=".filter-{{ $category }}">{{ ucfirst($category) }}</li>
                    @endforeach
                </ul>

                <div class="row portfolio-container" data-aos="fade-up" data-portfolios="{{ $portfolios }}">
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
                                <p>{{ $contact->location }}</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $contact->email }}</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>{{ $contact->phone_number }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mt-lg-0 mt-5" data-aos="fade-left">
                        <form action="{{ route('contact.send') }}" method="post" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-md-0 mt-3">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" pattern=".+@gmail\.com" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->
@endsection

@push('styles')
    <style>
        .carousel-image-container {
            position: relative;
            width: 100vw;
            overflow: hidden;
        }

        .carousel-image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(45%);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const screenWidth = window.innerWidth;
            let limit = (screenWidth >= 992) ? 14 : (screenWidth >= 576) ? 10 : 6;

            showPortfolios('.portfolio-container', 'portfolios', limit);

            const portfolioLightbox = GLightbox({
                selector: '.portfolio-lightbox'
            });
        });

        const showPortfolios = (element, dataName, limit) => {
            const portfolioContainer = document.querySelector(element);
            const portfolios = JSON.parse(portfolioContainer.dataset[dataName]);

            portfolioContainer.innerHTML = portfolios
                .slice(0, limit)
                .map((portfolio) => {
                    return `
                        <div class="col-lg-4 col-md-6 portfolio-item filter-${portfolio.category}">
                            <div class="portfolio-img">
                                <img src="{{ asset('assets/img/${portfolio.image}') }}" class="img-fluid" alt="${portfolio.title}">
                            </div>
                            <div class="portfolio-info">
                                <h4>${portfolio.title}</h4>
                                <p>${portfolio.category}</p>
                                <a href="{{ asset('assets/img/${portfolio.image}') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="${portfolio.title}">
                                    <i class="bx bx-plus"></i>
                                </a>
                            </div>
                        </div>
                    `;
                })
                .join('');
        };

        function showToast(message, background) {
            Toastify({
                text: message,
                duration: 1800,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background,
                },
            }).showToast();
        }

        let successMessage = document.querySelector('main').dataset.mailSuccess;
        let failureMessage = document.querySelector('main').dataset.mailFailure;

        if (successMessage) {
            showToast(successMessage, "#28a745");
        }

        if (failureMessage) {
            showToast(failureMessage, "#dc3545");
        }
    </script>
@endpush
