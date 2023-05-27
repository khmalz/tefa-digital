@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: 100vh">
        <div class="row">
            <div class="col-6">
                <div class="card-mantap">
                    <div class="darken"><span class="centering"><a href="{{ route('design.categories-edit') }}"
                                class="text-decoration-none edit-text">EDIT</a></span>
                    </div>
                    <img class="category-img" src="" alt="ac">
                    <div class="category-text-container">
                        <h3 class="text-center">Logo</h3>
                        <span class="word-break category-text text-center">Buat merek Anda terlihat profesional dan
                            menonjol
                            dengan jasa
                            desain logo kami. Tim ahli kami akan menciptakan logo yang sesuai dengan keinginan Anda.
                            Kami
                            menawarkan revisi logo dan format file logo yang sesuai dengan kebutuhan Anda. Dapatkan logo
                            merek yang kuat dengan penawaran terbaik dari kami. Hubungi kami sekarang!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
