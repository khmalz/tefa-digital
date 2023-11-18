@extends('layouts.main')

@include('layouts.subcategory-header')

@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel carousel-fade" data-bs-ride="carousel">
            <div class="carousel-image-container">
                <img src="{{ asset('assets/img/category/carousel.jpg') }}" alt="">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Jasa Design Promosi</span></h2>
                        <p class="animate__animated fanimate__adeInUp">Taklukkan pasar yang kompetitif dengan promosi
                            digital.
                        </p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Order</a>
                    </div>
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
                            <div class="spacer-cool col-lg-4 col-md-12 col-sm-12">
                                <div class="card-pricing" data-aos="zoom-in-left" data-aos-delay="100">
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
                                        <a href="{{ route('user.design.form.index', ['category' => 'Promosi Digital']) }}"
                                            class="btn btn-lg btn-general {{ auth()->guest() ||auth()->user()->hasRole('client')? null: 'disable-btn' }} rounded-5">
                                            Konsultasikan
                                            sekarang</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="pl-lg-6">
                                    <div class="row" style="row-gap: 1rem !important;">
                                        @foreach ($plan->features as $feature)
                                            <div class="col-md-6">
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
