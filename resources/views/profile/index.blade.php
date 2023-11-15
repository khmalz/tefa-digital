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
                        <li class="dropdown"><a href="#"><span>Welcome, {{ auth()->user()->name }}</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('user.profile.index') }}">{{ auth()->user()->email }}</a></li>
                                <li><a href="{{ route('user.order.list') }}">List Order</a></li>
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
                                <div class="profile-input">
                                    <h3>{{ auth()->user()->name }}</h3>
                                    <a>{{ auth()->user()->email }}</a>
                                </div>
                                <a href="{{ route('user.profile.update') }}" class="btn btn-color btn-profile mt-4">
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
