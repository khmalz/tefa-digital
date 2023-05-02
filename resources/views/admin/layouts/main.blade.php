<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template" />
    <meta name="author" content="Łukasz Holeczek" />
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard" />
    <title>CoreUI Free Bootstrap Admin Template</title>
    <meta name="theme-color" content="#ffffff" />
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/simplebar/css/simplebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendors/simplebar.css') }}" />
    <!-- Main styles for this application-->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet" />
</head>

<body>
    @include('admin.layouts.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('admin.layouts.header')

        @yield('content')

        @include('admin.layouts.footer')
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('assets/admin/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('assets/admin/vendors/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
</body>

</html>
