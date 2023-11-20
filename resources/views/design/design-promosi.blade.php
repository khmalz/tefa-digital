@extends('layouts.main')

@include('layouts.subcategory-header')

@section('hero')
    @include('layouts.carousel-category', [
        'title' => 'Design Promosi',
        'description' => 'Taklukkan pasar yang kompetitif dengan promosi digital',
        'buttonUrl' => '#pricing',
        'buttonText' => 'Order',
    ])
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
