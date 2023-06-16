@extends('layouts.main')

@include('layouts.subcategory-header')

@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel carousel-fade" data-bs-ride="carousel">
            <img src="https://images.unsplash.com/photo-1603380353725-f8a4d39cc41e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                alt="" style="width:100vw; filter: brightness(55%)">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Jasa Design Promosi</span></h2>
                    <p class="animate__animated fanimate__adeInUp">Taklukkan pasar yang kompetitif dengan promosi digital.
                    </p>
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
                    <h2>Jasa Design Promosi</h2>
                    <p>Mengapa menggunakan jasa Kami?</p>
                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6">
                        <p style="margin-bottom: 20px;text-align: justify">
                            Dalam era online ini, digital marketing adalah kunci sukses bisnis Anda. Jangkau pelanggan
                            potensial di seluruh dunia, bangun kehadiran digital yang kuat, dan optimalkan konversi
                            penjualan.
                        </p>
                        <p style="margin-bottom: 20px;text-align: justify">
                            Tingkatkan kehadiran online bisnis Anda dan capai kesuksesan dengan jasa pembuatan promosi
                            digital kami! Dengan design unik dan bahasa menarik Kami mampu membantu meningkatkan pemasaran
                            bisnis Anda.
                        </p>
                        <p>
                            Hubungi Kami sekarang!
                        </p>
                    </div>
                    <div class="col-lg-6 pt-lg-0 image-about pt-4">
                        <img src="https://source.unsplash.com/random/900×700/?digital-marketing" alt=""
                            style="width: 100%;">
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container">
                <div class="section-title" data-aos="zoom-out">
                    <h2>Ragam harga</h2>
                    <p>Penawaran Harga Jasa</p>
                </div>

                <div class="container px-3 text-center">
                    <div class="row gx-5">
                        @foreach ($category->plans as $plan)
                            <div class="col-4">
                                <div class="card-pricing rounded-3 p-4" data-aos="zoom-in-left" data-aos-delay="100">
                                    <span class="text-dark">
                                        <p class="ms-3 mt-3 text-start">Mulai dari</p>
                                        <span class="display-5">Rp</span>
                                        <span class="display-4 price">{{ number_format($plan->price, 0, ',', '.') }}</span>
                                    </span>
                                    <hr class="my-4">
                                    <div class="mb-5">
                                        <p>
                                            Gratis konsultasi terkait design bersama tim kami agar dapat memberikan design
                                            terbaik berdasarkan kebutuhan Anda.
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <a href="" class="btn btn-lg btn-general rounded-5"> Konsultasikan
                                            sekarang</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="pl-lg-6">
                                    <div class="row" style="row-gap: 1rem !important;">
                                        @foreach ($plan->features as $feature)
                                            <div class="col-sm-6">
                                                <div class="card-desc rounded-3 p-2" data-aos="zoom-in-left"
                                                    data-aos-delay="100">
                                                    <div class="m-3">
                                                        <h5>{{ $feature->text }}</h5>
                                                        <hr class="my-3">
                                                        <p>{{ $feature->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Pricing Section -->
    </main>
@endsection
