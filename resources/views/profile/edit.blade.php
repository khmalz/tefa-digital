@extends('layouts.main')

@section('header')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between container">
            <div class="logo">
                <h1><a href="{{ route('home') }}">{{ app('websiteTitle') }}</a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#profile">Profile</a></li>
                    @include('layouts.dropdown')
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
                                <h2>Edit Profile</h2>
                                <div class="card-input position-relative mb-4 overflow-hidden rounded bg-white">
                                    <form action="{{ route('user.profile.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <div class="mb-2">
                                                <label class="col-form-label-sm" for="nameInput">Nama</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                    name="name" id="nameInput" placeholder="Your Name"
                                                    value="{{ old('name', $user->name) }}" autocomplete="name">
                                                @error('name')
                                                    <div id="nameInvalid" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label class="col-form-label-sm" for="emailInput">Email</label>
                                                <input type="email"
                                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                    name="email" id="emailInput" placeholder="Your Email"
                                                    value="{{ old('email', $user->email) }}" autocomplete="email">
                                                @error('email')
                                                    <div id="emailInvalid" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-2">
                                                <label class="col-form-label-sm" for="passwordInput">Password <span
                                                        class="text-secondary">(optiona)</span></label>
                                                <input type="password"
                                                    class="form-control form-control-sm @error('password') is-invalid @enderror"
                                                    name="password" id="passwordInput" placeholder="Your Password"
                                                    value="{{ old('password') }}" autocomplete="new-password">
                                                @error('password')
                                                    <div id="passwordInvalid" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-color btn-profile rounded-2">Edit
                                                Profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
