@extends('admin.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <h3>Order Details</h3>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Design</h4>
                                    <h6>{{ $design->order }}</h6>
                                    <small>
                                        <p class="text-secondary">#ID {{ $design->ulid }}</p>
                                    </small>
                                </div>
                                <div>
                                    <a class="btn btn-info text-light" target="_blank"
                                        href="{{ url("admin/export-to-pdf/design/$design->ulid") }}">Export to PDF</a>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-md-6 order-md-1 order-2">
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Name</h6>
                                        <p>{{ $design->name_customer }}</p>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Number</h6>
                                        <p>{{ $design->number_customer }}</p>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Email</h6>
                                        <p>{{ $design->email_customer }}</p>
                                    </div>
                                    @if ($design->slogan)
                                        <div class="row row-cols-1 row-cols-sm-2">
                                            <h6>Slogan</h6>
                                            <p>{{ $design->slogan }}</p>
                                        </div>
                                    @endif
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Color</h6>
                                        <p>{{ $design->color }}</p>
                                    </div>
                                    @if ($design->description)
                                        <div class="row row-cols-1 row-cols-sm-2">
                                            <h6>Description</h6>
                                            <p class="w-100">{{ $design->description }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mt-md-0 order-md-2 order-1 mt-2">
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Plan</h6>
                                        <p>{{ $design->plan->title }}</p>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Price</h6>
                                        <p>{{ number_format($design->price, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Status</h6>
                                        <p>{{ ucfirst($design->status) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($design->images) > 0)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Image</h4>
                                <div class="row" style="row-gap: 10px">
                                    @foreach ($design->images as $image)
                                        <div class="col-md-6 col-lg-4">
                                            <div style="width: 100%; height: 250px;">
                                                <img src="{{ $image->image === 'placeholder.jpg' ? "https://source.unsplash.com/random/900×700/?design&$loop->iteration" : \Illuminate\Support\Facades\Storage::url($image->image) }}"
                                                    class="img-fluid img-thumbnail w-100 h-100 border border-2"
                                                    style="object-fit:  cover" alt="...">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
