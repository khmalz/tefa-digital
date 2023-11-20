@extends('layouts.main')

@include('layouts.category-header')

@section('hero')
    @include('layouts.carousel-category', [
        'title' => 'Photography',
        'description' => 'Abadikan momen berharga dengan keindahan yang abadi',
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
                    <h2>Photography</h2>
                    <p>Seberapa penting photography?</p>
                </div>

                <div class="row content justify-content-between" data-aos="fade-up">
                    <div class="col-lg-6">
                        <p style="margin-bottom: 40px;text-align: justify">
                            Photography merupakan salah satu layanan yang kami sediakan untuk membantu menemukan fotografer
                            yang cocok untuk menghasilkan gambar-gambar sesuai dengan kebutuhan Anda.
                        <ul>
                            <li><i class="ri-check-double-line"></i> Meningkatkan citra dan profesionalisme</li>
                            <li><i class="ri-check-double-line"></i> Memperkuat branding</li>
                            <li><i class="ri-check-double-line"></i> Dokumentasi yang lengkap</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-lg-0 image-about pt-4">
                        <img src="{{ Vite::asset('resources/assets/img/category/about-photography.jpg') }}" alt=""
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
                    <p>Photography</p>
                    <span> Kami menyediakan layanan jasa fotografi yang dapat anda pilih untuk berbagai macam acara dan
                        event, seperti:</span>
                </div>

                <div class="row justify-content-center">
                    @forelse ($categories as $category)
                        <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                            <div class="icon-box rounded-3 d-flex flex-column justify-content-between gap-3 text-center"
                                data-aos="zoom-in-left" data-aos-delay="100">
                                <div>
                                    @if ($category->image === 'placeholder.jpg')
                                        <img src="{{ Vite::asset('resources/assets/img/category/placeholder.jpg') }}"
                                            class="card-image card-img-top rounded-2 mb-2 p-2" alt="haha">
                                    @else
                                        <img src="{{ asset('assets/img/' . $category->image) }}"
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
