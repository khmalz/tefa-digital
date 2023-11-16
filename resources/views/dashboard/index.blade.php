@extends('dashboard.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>{{ app('websiteTitle') }} Dashboard</h4>
                            <div class="row mt-3">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card bg-warning mb-4 text-white">
                                        <div class="card-body d-flex align-items-center gap-3">
                                            <div>
                                                <svg class="icon icon-3xl">
                                                    <use
                                                        xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-cart') }}">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="fs-3 fw-semibold">
                                                    {{ $pending }}
                                                </div>
                                                <div>Pending</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card bg-info mb-4 text-white">
                                        <div class="card-body d-flex align-items-center gap-3">
                                            <div>
                                                <svg class="icon icon-3xl">
                                                    <use
                                                        xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-layers') }}">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="fs-3 fw-semibold">
                                                    {{ $progress }}
                                                </div>
                                                <div>On Progress</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card bg-success mb-4 text-white">
                                        <div class="card-body d-flex align-items-center gap-3">
                                            <div>
                                                <svg class="icon icon-3xl">
                                                    <use
                                                        xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-check-circle') }}">
                                                    </use>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="fs-3 fw-semibold">
                                                    {{ $completed }}
                                                </div>
                                                <div>Completed</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
