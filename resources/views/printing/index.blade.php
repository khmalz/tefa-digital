@extends('layouts.main')

@include('layouts.subcategory-header')

@section('hero')
    @include('layouts.carousel-category', [
        'title' => '3D Printing',
        'description' => 'Jadikan ide Anda bentuk nyata dengan 3D printing yang mengagumkan',
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
                    <h2>Jasa 3D Printing</h2>
                    <p>Mengapa menggunakan jasa Kami?</p>
                </div>

                <div class="row content justify-content-between" data-aos="fade-up">
                    <div class="col-lg-6">
                        <ul class="mt-5">
                            <li><i class="ri-check-double-line"></i> Jadikan Bisnis Lebih Progresif</li>
                            <li><i class="ri-check-double-line"></i> Kemajuan Dalam Pengembangan Produk</li>
                            <li><i class="ri-check-double-line"></i> Mendorong Kreativitas dan Keunggulan Kompetitif</li>
                            <li><i class="ri-check-double-line"></i> Detail dan Presisi dalam Objek 3D</li>
                        </ul>
                        <p class="mt-5">
                            Hubungi Kami sekarang!
                        </p>
                    </div>
                    <div class="col-lg-6 pt-lg-0 image-about pt-4">
                        <img src="{{ Vite::asset('resources/assets/img/category/about-printing.jpg') }}" alt=""
                            class="img-pricing">
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
                        <div class="spacer-cool col-lg-4 col-md-12 col-sm-12">
                            <div class="card-pricing rounded-3 p-4" data-aos="zoom-in-left" data-aos-delay="100">
                                <div class="m-3">
                                    <h5 class="my-3">
                                        Konsultasikan pada Kami!
                                    </h5>
                                    <hr class="my-4">
                                </div>
                                <span>
                                    Jadikan design inovatif anda menjadi prototipe nyata dengan jasa 3D design kami!
                                </span>
                                <p class="my-4">
                                    Segera hubungi kami untuk penawaran khusus dan konsultasikan kebutuhan serta keinginan
                                    Anda. Jangan lewatkan kesempatan ini agar dunia terkesan dengan inovasi produk hebat
                                    Anda.
                                </p>
                                <div class="mb-2">
                                    <a href="{{ route('user.printing.form.index') }}"
                                        class="btn btn-lg btn-general rounded-5 {{ auth()->guest() ||auth()->user()->hasRole('client')? null: 'disable-btn' }}">
                                        Konsultasikan sekarang</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="pl-lg-6">
                                <div class="row" style="row-gap: 1rem !important;">
                                    <div class="col-md-6">
                                        <div class="card-desc rounded-3 p-2" data-aos="zoom-in-left" data-aos-delay="100">
                                            <div class="m-3">
                                                <h5>Pengembangan Cepat</h5>
                                                <hr class="my-3">
                                                <p>Anda dapat dengan cepat mewujudkan ide-ide kreatif dalam bentuk prototipe
                                                    fisik yang dapat langsung dipegang dan dievaluasi.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-desc rounded-3 p-2" data-aos="zoom-in-left" data-aos-delay="100">
                                            <div class="m-3">
                                                <h5>Konsultasi Gratis</h5>
                                                <hr class="my-3">
                                                <p>Konsultasi gratis membantu menentukan desain yang sesuai dengan kebutuhan
                                                    dengan hasil terbaik.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-desc rounded-3 p-2" data-aos="zoom-in-left" data-aos-delay="100">
                                            <div class="m-3">
                                                <h5>Efisiensi Biaya</h5>
                                                <hr class="my-3">
                                                <p>Kami dapat mencetak prototipe dalam waktu singkat tanpa perlu biaya
                                                    besar.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-desc rounded-3 p-2" data-aos="zoom-in-left" data-aos-delay="100">
                                            <div class="m-3">
                                                <h5>Kustomisasi Fleksibel</h5>
                                                <hr class="my-3">
                                                <p>Kami memungkinkan Anda untuk menyesuaikan kebutuhan anda yang inovatif
                                                    dijadikan prototipe.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Pricing Section -->
    </main>
@endsection
