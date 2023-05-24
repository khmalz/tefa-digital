@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: auto">
        <div class="row mb-5">
            <div class="row">
                <div class="header-cat d-flex">
                    <hr class="left-line">
                    <h4>Logo</h4>
                    <hr class="right-line">
                </div>
            </div>
            <div class="row mt-3" style="padding-left: 30px;position: relative">


                <div class="col-3">
                    <div class="plan-card position-relative overflow-hidden">
                        <div class="darken"><a href="{{ route('design.plans-edit') }}"
                                class="centering text-decoration-none edit-text">Edit</a>
                        </div>
                        <div class="plan-card-content p-3">
                            <div class="">
                                <h5 class="plan-card-title">Ekonomis</h5>
                                <h4 class="">Rp. 200.000</h4>
                            </div>
                            <hr>
                            <div class="plan-card-feature mt-4">
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-3">
                    <div class="plan-card position-relative overflow-hidden">
                        <div class="darken"><a href="{{ route('design.plans-edit') }}"
                                class="centering text-decoration-none edit-text">Edit</a>
                        </div>
                        <div class="plan-card-content p-3">
                            <div class="">
                                <h5 class="plan-card-title">Ekonomis</h5>
                                <h4 class="">Rp. 200.000</h4>
                            </div>
                            <hr>
                            <div class="plan-card-feature mt-4">
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                                <h6>alternatif design</h6>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-3 position-relative">
                    <a href="{{ route('design.plans-create') }}" class="centering big-plus text-decoration-none">+</a>
                </div>


            </div>
        </div>
    </div>
@endsection
