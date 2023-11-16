@extends('layouts.main')

@include('layouts.subcategory-header')

@section('hero')
    @include('layouts.carousel-category', [
        'title' => 'Foto Produk',
        'description' => 'Buat produk Anda terlihat lebih menarik dengan jasa foto produk kami',
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

                <div class="row justify-content-center" style="row-gap: 2rem">
                    @foreach ($category->plans as $plan)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="width: auto !important">
                            <div class="box {{ $loop->last ? 'featured' : '' }} d-flex flex-column justify-content-between"
                                data-aos="zoom-in">
                                <div>
                                    <h3>{{ $plan->title }}</h3>
                                    <h4><sup>Rp</sup>{{ number_format($plan->price, 0, ',', '.') }}<span></span></h4>
                                    <ul>
                                        @foreach ($plan->features as $feature)
                                            <li>{{ $feature->text }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="btn-wrap">
                                    <a href="{{ route('user.photography.form.index', ['category' => 'Produk', 'plan' => $plan->title]) }}"
                                        class="btn-buy {{ auth()->guest() ||auth()->user()->hasRole('client')? null: 'disable-btn' }}">Buy
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
