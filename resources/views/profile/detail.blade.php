@extends('layouts.main')

@section('header')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between container">
            <div class="logo">
                <h1><a href="{{ route('home') }}">Tefa Digital</a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#profile">Profile</a></li>
                    @auth
                        <li class="dropdown">
                        <li><a href="{{ route('user.profile.index') }}">{{ auth()->user()->email }}</a></li>
                        <li><a href="{{ route('user.order.list') }}">List Order</a></li>
                        <ul>
                            <li><a href="#">{{ auth()->user()->email }}</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="d-inline">
                                    @csrf
                                    <a href="#"
                                        onclick="return confirm('Yakin ? ') ? this.parentElement.submit() : null">Log
                                        Out</a>
                                </form>
                            </li>
                        </ul>
                        </li>
                    @else
                        <li><a class="nav-link" href="{{ route('login.index') }}">Login</a></li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
@endsection

@section('main')
    <main>

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="align-items-center justify-content-between d-flex">
                    <h2>Profile</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Profile</li>
                    </ol>
                </div>
            </div>
        </section>
        <section id="profile" class="services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div>
                            <div class="box profile-box rounded-3" data-aos="zoom-in-left" data-aos-delay="100">
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
                                                    href='{{ route("print-pdf.$orderableType", $order->ulid) }}'>Export to
                                                    PDF</a>
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
                                                <h6 class="mt-3">Description</h6>
                                                <p class="w-100">{{ $order->description }}</p>
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
            </div>
        </section>
    </main>
@endsection
