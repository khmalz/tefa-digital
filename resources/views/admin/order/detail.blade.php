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
                            @if ($order->description)
                                <div class="row border-top px-2">
                                    <div class="col-md-6 mt-3">
                                        <h6>Description</h6>
                                        <p class="w-100">{{ $order->description }}</p>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <a href="https://wa.me/{{ $order->number_customer }}" target="_blank"
                                            class="btn btn-success btn-sm d-inline-flex align-items-center gap-1 text-white"
                                            style="background-color: #25D366">
                                            <svg role="img" width="17" height="17" fill="#fff"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <title>WhatsApp</title>
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                            </svg>
                                            Chat via WhatsApp
                                        </a>
                                    </div>
                                </div>
                            @endif
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
