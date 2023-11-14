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
                    <h2>List Order</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>List Order</li>
                    </ol>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="justify-content-center">
                    <div class="col-lg-12">
                        <div class="box profile-box rounded-3">
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group" style="width: 80%;">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%;">
                                                Dropdown button
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-color btn-profile" style="width: 15%;">
                                            Filter
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Order ID</th>
                                            <th>Order</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>1</td>
                                            <td>Product A</td>
                                            <td>2023-11-01</td>
                                            <td>Processing</td>
                                        </tr>
                                    </tbody>
                                </table>
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
        }

        .profile-box:hover {
            box-shadow: 0 2px 35px 0 rgba(68, 88, 144, 0.2);
        }

        .btn-profile {
            font-family: "Raleway", sans-serif;
            background-color: #f06404;
            width: 100px;
            height: 40px;
            font-size: 18px;
            padding: 5px;
            border-radius: 8px;
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
