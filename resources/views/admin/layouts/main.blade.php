<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="Tefa Digital - Dashboard to manage service orders" />
    <meta name="keyword" content="Tefa Digital, Service, Design, Printing, Videoghraphy, Fotoghraphy" />
    <title>Dashboard | {{ config('app.name') }}</title>
    <meta name="theme-color" content="#ffffff" />
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/simplebar/css/simplebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendors/simplebar.css') }}" />
    <!-- Datatables style -->
    <link
        href="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.9.0/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css"
        rel="stylesheet" />
    <!-- Main styles for this application-->
    <link href="{{ asset('assets/admin/css/style.min.css') }}" rel="stylesheet" />
    <style>
        .navstabs {
            color: #3c4b64ac !important;
            border-radius: 0 !important;
        }

        .navstabs.active {
            background-color: transparent !important;
            border: none !important;
            border-bottom: 2.5px solid #3c4b64 !important;
            padding-bottom: 0.5rem !important;
            color: #3c4b64 !important;
            font-weight: 600 !important;
        }
    </style>
    @stack('styles')
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/admin/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>

    <!-- Datatables and necessary plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.9.0/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js">
    </script>
    @stack('scripts')
</body>

</html>
