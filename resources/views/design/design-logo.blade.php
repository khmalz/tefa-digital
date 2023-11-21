@extends('layouts.main')

@include('layouts.subcategory-header')

@section('hero')
    @include('layouts.carousel-category', [
        'title' => 'Design Logo',
        'description' =>
            'Logo adalah jantung merek Anda, wujud visual yang mewakili identitas dan nilai-nilai bisnis Anda',
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
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="width: auto !important">
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
                                    <a href="{{ route('user.design.form.index', ['category' => 'Logo', 'plan' => $plan->title]) }}"
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
