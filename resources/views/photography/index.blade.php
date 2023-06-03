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
                    <h2 class="animate__animated animate__fadeInDown">Photography</span></h2>
                    <p class="animate__animated fanimate__adeInUp">Abadikan momen berharga dengan keindahan yang abadi.</p>
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
                    <h2>Photography</h2>
                    <p>Seberapa penting photography?</p>
                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6">
                        <p style="margin-bottom: 40px">
                            Photography merupakan salah satu layanan yang kami sediakan untuk membantu menemukan fotografer
                            yang cocok untuk menghasilkan gambar-gambar sesuai dengan kebutuhan Anda.
                        <ul>
                            <li><i class="ri-check-double-line"></i> Meningkatkan citra dan profesionalisme</li>
                            <li><i class="ri-check-double-line"></i> Memperkuat branding</li>
                            <li><i class="ri-check-double-line"></i> Dokumentasi yang lengkap</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-lg-0 pt-4">
                        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                            alt="" style="width: 75%;">
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
                    <p>Photography</p>
                    <span> Kami menyediakan layanan jasa fotografi yang dapat anda pilih untuk berbagai macam acara dan
                        event, seperti:</span>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="zoom-in-left">
                            <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                            <h4 class="title"><a href="">Jasa Foto Produk</a></h4>
                            <p class="description">Buat produk Anda terlihat lebih menarik dengan jasa foto produk kami.
                                Dapatkan foto produk yang memukau dengan penawaran terbaik dari kami sekarang juga!
                            </p>
                            <button type="button" class="btn btn-color" style="color: #f06404">
                                <a href="">Selengkapnya</a>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
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
                    </div>
                </div>

            </div>
        </section>
        <!-- End Services Section -->
    </main>
@endsection
