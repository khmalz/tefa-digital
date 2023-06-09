<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tefa Digital</title>
    <meta name="description"
        content="Tefa Digital is a service ordering website that provides printing, design, photography, and videography services in SMKN 46 Jakarta. We offer high-quality services for teachers and students of SMKN 46 Jakarta.">
    <meta name="keywords"
        content="Tefa Digital, printing, design, photography, videography, SMKN 46 Jakarta, services, high-quality, teachers, students">

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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        .pad-x-500 {}
    </style>
    @stack('styles')
</head>

<body>
    @yield('header')

    @yield('hero')

    @yield('main')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>Tefa Digital</h3>
            <p>Mendukung kreatifitas siswa berjiwa wirausaha.</p>
            <div class="social-links">
                <a target="_blank" href="{{ url('https://www.instagram.com/smknegeri46jakarta') }}" class="instagram"><i
                        class="bx bxl-instagram"></i></a>
                <a target="_blank"
                    href="{{ url('https://smksedkijakarta.wordpress.com/kota/jakarta-timur/smk-negeri-46') }}"
                    class="wordpress"><i class="bx bxl-wordpress"></i></a>
                <a target="_blank" href="{{ url('https://smkn46jaktim.sch.id') }}" class="website"><i
                        class="bx bx-globe"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>SMK Negeri 46</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
