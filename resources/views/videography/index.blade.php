@extends('layouts.main')

@include('layouts.category-header')

@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel carousel-fade" data-bs-ride="carousel">

            <img src="https://images.unsplash.com/photo-1603380353725-f8a4d39cc41e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                alt="" style="width:100vw; filter: brightness(55%)">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Videography</span></h2>
                    <p class="animate__animated fanimate__adeInUp">Mengubah Momen Menjadi Karya Seni Bergerak.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
                </div>
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
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Videography</h2>
                    <p>Seberapa penting videography?</p>
                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6">
                        <p style="margin-bottom: 40px">
                            Videography merupakan jasa yang kami sediakan dengan menggunakan keterampilan teknis dan kreatif. Kami dengan tulus berusaha menghasilkan video yang berkualitas tinggi dan menciptakan karya visual yang menarik dan memukau.
                        <ul>
                            <li><i class="ri-check-double-line"></i> Menyampaikan pesan dengan menarik</li>
                            <li><i class="ri-check-double-line"></i> Merekam momen penting</li>
                            <li><i class="ri-check-double-line"></i> Mencerminkan profesionalisme</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-lg-0 pt-4 image-about">
                        <img src="https://source.unsplash.com/random/900×700/?videography"
                            alt="" style="width: 100%;">
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Ragam layanan</h2>
                    <p>Videography</p>
                    <span> Kami menyediakan layanan jasa videografi yang dapat anda pilih untuk berbagai macam acara dan
                        event, seperti:</span>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                        <div class="icon-box text-center rounded-3" data-aos="zoom-in-left" data-aos-delay="100">
                            <img src="https://source.unsplash.com/random/?videography&1" class="card-image card-img-top p-2 rounded-2 mb-2" alt="">
                                <h5 class="title mt-2">Jasa Video Syuting</h5>
                                <p class="description p-2">Ciptakan video yang memukau dengan jasa pembuatan video syuting kami. Tim kami akan mengambil video syuting secara profesional dan menghasilkan video yang sesuai keinginan Anda. Hubungi kami sekarang untuk penawaran terbaik.</p>
                                <a href="#" class="btn btn-outline" style="color: #f06404">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                        <div class="icon-box text-center rounded-3" data-aos="zoom-in-left" data-aos-delay="100">
                            <img src="https://source.unsplash.com/random/?videography&2" class="card-image card-img-top p-2 rounded-2 mb-2" alt="">
                                <h5 class="title mt-2">Jasa Video Dokumentasi</h5>
                                <p class="description p-2">Buat momen penting dan spesial Anda terabadikan dengan jasa pembuatan video dokumentasi kami. Hubungi kami sekarang untuk mendapatkan penawaran terbaik untuk jasa pembuatan video dokumentasi kami.</p>
                                <a href="#" class="btn btn-outline" style="color: #f06404">Selengkapnya</a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
                            <h4 class="title"><a href="">Jasa Foto Pernikahan</a></h4>
                            <p class="description">Abadikan momen spesial pernikahan Anda dengan jasa foto pernikahan kami.
                                Dapatkan kenangan pernikahan yang abadi dengan penawaran terbaik dari kami. Hubungi kami
                                sekarang!
                            </p>
                            <button type="button" class="btn btn-color" style="color: #f06404">
                                <a href="">Selengkapnya</a>
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                            <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
                            <h4 class="title"><a href="">Jasa Foto Acara</a></h4>
                            <p class="description">Kami menawarkan jasa fotografi acara untuk mengabadikan momen penting
                                Anda. Dapatkan gambar acara yang berkesan dengan jasa fotografi acara kami. Hubungi kami
                                sekarang!</p>
                            <button type="button" class="btn btn-color" style="color: #f06404;">
                                <a href="">Selengkapnya</a>
                            </button>
                        </div>
                    </div> --}}
                </div>

            </div>
        </section>
        <!-- End Services Section -->
    </main>
@endsection
