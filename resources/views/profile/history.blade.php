@extends('layouts.main')

@push('styles')
    <style>
        #notif .box {
            padding-top: 8px;
            padding-left: 8px;
            padding-right: 16px;
            position: relative;
            overflow: hidden;
            border-radius: 0 10px 10px 0;
            background-color: #ffffff;
            width: 100%;
            height: 65px;
        }

        #notif .notif-box {
            width: 100%;
            height: 65px;
            background-color: #fffff;
            box-shadow: 0 10px 55px 0 rgba(52, 62, 90, 0.12);
            transition: all 0.4s ease-in-out;
        }

        #notif .notif-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 2px 35px 0 rgba(68, 88, 144, 0.2);
        }
    </style>
@endpush

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
                    <h2>History</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>History</li>
                    </ol>
                </div>
            </div>
        </section>
        <section id="notif" class="services">
            <div class="container">
                <div class="justify-content-center d-flex flex-column gap-3">
                    <div class="row">
                        <div class="notif-box d-flex px-0" data-aos="zoom-in-left" data-aos-delay="100">
                            <div class="status-box d-flex justify-content-center align-items-center bg-info">
                                <span class="big-icon"><i class="bx bx-timer" style="color: white"></i></span>
                            </div>
                            <div class="box">
                                <div class="">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-10">
                                                <h6>{{ auth()->user()->name }}, Your order is in progress!</h6>
                                                <span>11:50:52 | November 16 2023</span>
                                            </div>
                                            <div class="col-2 d-flex flex-column justify-content-center align-items-end">
                                                <a href="">Mark as read</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="notif-box d-flex px-0" data-aos="zoom-in-left" data-aos-delay="100">
                            <div class="status-box d-flex justify-content-center align-items-center bg-warning">
                                <span class="big-icon"><i class="bx bx-timer bx-flip-horizontal"
                                        style="color: white"></i></span>
                            </div>
                            <div class="box ">
                                <div class="d-flex">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-10">
                                                <h6>{{ auth()->user()->name }}, Your order is pending!</h6>
                                                <span>11:50:52 | November 16 2023</span>
                                            </div>
                                            <div class="col-2 d-flex flex-column justify-content-center align-items-end">
                                                <a href="">Mark as read</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="notif-box d-flex px-0" data-aos="zoom-in-left" data-aos-delay="100">
                            <div class="status-box d-flex justify-content-center align-items-center bg-success">
                                <span class="big-icon"><i class="bx bx-check" style="color: white"></i></span>
                            </div>
                            <div class="box ">
                                <div class="d-flex">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-10">
                                                <h6>{{ auth()->user()->name }}, Your order is done!</h6>
                                                <span>11:50:52 | November 16 2023</span>
                                            </div>
                                            <div class="col-2 d-flex flex-column justify-content-center align-items-end">
                                                <a href="">Mark as read</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
