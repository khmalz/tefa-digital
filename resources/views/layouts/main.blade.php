<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ app('websiteTitle') }}</title>
    <meta name="description"
        content="{{ app('websiteTitle') }} is a service ordering website that provides printing, design, photography, and videography services in SMKN 46 Jakarta. We offer high-quality services for teachers and students of SMKN 46 Jakarta.">
    <meta name="keywords"
        content="{{ app('websiteTitle') }}, printing, design, photography, videography, SMKN 46 Jakarta, services, high-quality, teachers, students">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/toastify/toastify.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        .bottom-button {
            position: fixed;
            visibility: hidden;
            opacity: 0;
            right: 15px;
            bottom: 15px;
            z-index: 996;
            row-gap: 5px;
            transition: all 0.3s;
        }

        .bottom-button.active {
            visibility: visible;
            opacity: 1;
        }

        .whatsapp-button {
            background-color: #25d366;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.4s;
            color: #fff;
        }

        .whatsapp-button:hover {
            background-color: #128c7e;
            color: #fff;
        }

        .btn-profile {
            font-family: "Poppins", sans-serif;
            background-color: #f06404;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #fff;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-profile:hover {
            background: #fff;
            color: #f06404;
            text-decoration: none;
            border: 2px solid #ef6603;
        }

        #profile .box {
            padding: 30px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            background: #fff;
            width: 100%;
            height: 100%;
        }

        #profile .profile-box {
            box-shadow: 0 10px 55px 0 rgba(52, 62, 90, 0.12);
            transition: all 0.4s ease-in-out;
        }

        #profile .profile-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 2px 35px 0 rgba(68, 88, 144, 0.2);
        }
    </style>
    @stack('styles')
</head>

<body>
    @yield('header')

    @yield('hero')

    @yield('main')

    @include('layouts.footer')

    <div class="bottom-button d-flex flex-column">
        <a href="https://wa.me/6285936128829?text=Halo,%20saya%20tertarik%20dengan%20produk%20Anda..."
            class="back-to-top-wa whatsapp-button d-flex align-items-center justify-content-center" target="_blank">
            <i class="bi bi-whatsapp"></i>
        </a>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i>
        </a>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/toastify/toastify.js') }}"></script>

    <script>
        function showToast(message, background) {
            Toastify({
                text: message,
                duration: 1800,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background,
                },
            }).showToast();
        }
    </script>

    @stack('scripts')

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
