@extends('layouts.main')

@include('layouts.category-header')

@section('hero')
    @include('layouts.carousel-category', [
        'title' => 'Videography',
        'description' => 'Mengubah Momen Menjadi Karya Seni Bergerak',
        'buttonUrl' => '#about',
        'buttonText' => 'Selengkapnya',
    ])
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
                        <p style="margin-bottom: 40px;text-align: justify">
                            Videography merupakan jasa yang kami sediakan dengan menggunakan keterampilan teknis dan
                            kreatif. Kami dengan tulus berusaha menghasilkan video yang berkualitas tinggi dan menciptakan
                            karya visual yang menarik dan memukau.
                        <ul>
                            <li><i class="ri-check-double-line"></i> Menyampaikan pesan dengan menarik</li>
                            <li><i class="ri-check-double-line"></i> Merekam momen penting</li>
                            <li><i class="ri-check-double-line"></i> Mencerminkan profesionalisme</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-lg-0 image-about pt-4">
                        <img src="https://source.unsplash.com/random/900×700/?videography" alt=""
                            class="img-pricing">
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
                    @forelse ($categories as $category)
                        <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                            <div class="icon-box rounded-3 d-flex flex-column justify-content-between gap-3 text-center"
                                data-aos="zoom-in-left" data-aos-delay="100">
                                <div class="">
                                    @if ($category->image === 'placeholder.jpg')
                                        <img src="https://source.unsplash.com/random/?videography-{{ $category->title }}"
                                            class="card-image card-img-top rounded-2 mb-2 p-2" alt="haha">
                                    @else
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}"
                                            class="card-image card-img-top rounded-2 mb-2 p-2" alt="hoho">
                                    @endif
                                    <h5 class="title mt-2">{{ $category->title }}</h5>
                                    <p class="description p-2">{{ $category->body }}</p>
                                </div>
                                <div class="">
                                    <a href="{{ $routeNames[$category->title] }}" class="btn btn-outline"
                                        style="background-color: #f06404; color: white;">Pilih!</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Tidak ada kategori yang tersedia.</p>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- End Services Section -->
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
