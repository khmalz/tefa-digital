@extends('dashboard.layouts.main')

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
                                    @php
                                        $orderableType = strtolower(class_basename($order->orderable_type));
                                    @endphp
                                    <h4 class="text-capitalize">{{ $orderableType }}</h4>
                                    @if ($orderableType !== 'printing')
                                        <h6>{{ $order->orderable->category->title }}</h6>
                                    @endif
                                    <small>
                                        <p class="text-secondary">#{{ $order->ulid }}</p>
                                    </small>
                                </div>
                                <div>
                                    <a class="btn btn-info text-light" target="_blank"
                                        href='{{ route("print-pdf.$orderableType", $order->ulid) }}'>Export to PDF</a>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-md-6 order-md-1 order-2">
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Name</h6>
                                        <p>{{ $order->name_customer }}</p>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Number</h6>
                                        <p>{{ $order->number_customer }}</p>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Email</h6>
                                        <p>{{ $order->email_customer }}</p>
                                    </div>
                                    @if ($orderableType == 'design')
                                        @if ($order->orderable->slogan)
                                            <div class="row row-cols-1 row-cols-sm-2">
                                                <h6>Slogan</h6>
                                                <p>{{ $order->orderable->slogan }}</p>
                                            </div>
                                        @endif
                                        <div class="row row-cols-1 row-cols-sm-2">
                                            <h6>Color</h6>
                                            <p>{{ $order->orderable->color }}</p>
                                        </div>
                                    @endif
                                    @if ($order->description)
                                        <div class="row row-cols-1 row-cols-sm-2">
                                            <h6>Description</h6>
                                            <p class="w-100">{{ $order->description }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mt-md-0 order-md-2 order-1 mt-2">
                                    @if ($orderableType !== 'printing')
                                        <div class="row row-cols-1 row-cols-sm-2">
                                            <h6>Plan</h6>
                                            <p>{{ $order->orderable->plan->title }}</p>
                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-2">
                                            <h6>Price</h6>
                                            <p>{{ number_format($order->orderable->price, 0, ',', '.') }}</p>
                                        </div>
                                    @endif
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <h6>Status</h6>
                                        <p>{{ ucfirst($order->status) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!empty($order->orderable->images) && count($order->orderable->images) > 0)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Image</h4>
                                <div class="row" style="row-gap: 10px">
                                    @foreach ($order->orderable->images as $image)
                                        <div class="col-md-6 col-lg-4">
                                            <div style="width: 100%; height: 250px;">
                                                <img src="{{ $image->path === 'placeholder.jpg' ? "https://source.unsplash.com/random/900×700/?design&$loop->iteration" : \Illuminate\Support\Facades\Storage::url($image->image) }}"
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
