@extends('layouts.main')

@section('header')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between container">
            <div class="logo">
                <h1><a href="/">Tefa Digital</a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#features">Services</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    @auth
                        <li class="dropdown"><a href="#"><span>Welcome, {{ auth()->user()->name }}</span> <i
                                    class="bi bi-chevron-down"></i></a>
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
                        <li><a href="{{ route('home')}}">Home</a></li>
                        <li>Profile</li>
                    </ol>
                </div>
            </div>
        </section>
        <section id="profile" class="services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 ">
                        <div class="div">
                            <div class="box profile-box rounded-3" data-aos="zoom-in-left" data-aos-delay="100">
                                <div class="profile-input">
                                    <h3>{{ auth()->user()->name }}</h3>
                                    <a>{{ auth()->user()->email }}</a>
                                </div>
                                <a href="{{ route('user.design.index') }}" class="btn btn-color btn-profile">
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

@push('styles')
    <style>
        .box {
            padding: 30px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            background: #fff;
            width: 100%;
            height: 100%;
        }

        .profile-box {
            box-shadow: 0 10px 55px 0 rgba(52, 62, 90, 0.12);
            transition: all 0.4s ease-in-out;
        }

        .profile-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 2px 35px 0 rgba(68, 88, 144, 0.2);
        }

        .btn-profile {
            font-family: "Raleway", sans-serif;
            background-color: #f06404;
            margin-top: 40px;
            width: 130px;
            height: 40px;
            font-size: 16px;
            padding: 5px;
            border-radius: 10px;
            color: #fff;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-profile:hover {
            background: #fff;
            color: #f06404;
            text-decoration: none;
            border: 2px solid #ef6603;
        }
    </style>
@endpush
