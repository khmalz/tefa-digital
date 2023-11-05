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
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.7/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/rg-1.4.1/sb-1.6.0/sp-2.2.0/sr-1.3.0/datatables.min.css"
        rel="stylesheet">

    <!-- Main styles for this application-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet" /> --}}
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

        /* .category-text-container {
            width: 67%;
            height: 95%;
            float: right;
            padding: 15px;
            overflow: hidden;
        } */
        .category-text {
            text-align: justify !important;
            font-size: clamp(12px, 2vw, 15px);
        }

        .word-break {
            overflow-wrap: break-word;
        }

        .category-text-container {
            width: 100%;
            height: 95%;
            padding-left: 15px;
            padding-right: 15px;
            overflow: hidden;
        }

        .category-img {
            height: 50%;
            width: 100%;
            object-fit: cover;
        }

        .category-title {
            font-size: clamp(25px, 2vw, 40px);
            padding: 0
        }

        .card-mantap {
            margin-top: 20px;
            width: clamp(250px, 100%, 100%);
            height: 52vh;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 10px 10px 10px #a7a7a7;
            transition: 200ms ease;
            position: relative;
        }

        /* .category-img {
            height: 100%;
            width: 33%;
            object-fit: cover;
        }

        .card-mantap {
            margin-top: 20px;
            width: 100%;
            height: 45vh;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 10px 10px 10px #a7a7a7;
            transition: 200ms ease;
            position: relative;
        } */
        .darken {
            height: 100%;
            background-color: rgb(0, 0, 0, 0.9);
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-filter: blur(50%);
            filter: blur(50%);
            transition: 450ms ease;
            opacity: 0;
        }

        .darken:hover {
            opacity: 100;
        }

        .darken:hover .show-more-button {
            background-color: transparent;
        }

        .centering {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .edit-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 100px;
            color: white !important;
            transition: 300ms ease;
        }

        .edit-text:hover {
            text-shadow: 0px 0px 25px #fff;
        }

        .btn-submit {
            background-color: rgb(48, 60, 84);
            padding-left: 30px;
            padding-right: 30px;
            text-decoration: none;
            padding-top: 6px;
            padding-bottom: 6px;
            color: white !important;
            border-radius: 5px;
            transition: 200ms ease;
        }

        .btn-submit:hover {
            text-shadow: 0px 0px 20px #fff;
        }

        .left-line {
            border: 0.1px thin rgb(86, 86, 86);
            border-radius: 200px;
            width: 6vw;
            /* float: left; */
            margin-right: 8px;
        }

        .right-line {
            border: 0.1px thin rgb(86, 86, 86);
            border-radius: 200px;
            width: 66vw;
            /* float: left; */
            margin-left: 8px;
        }

        .header-cat {
            width: 100%;
            /* background-color: red; */
        }

        .header-cat hr,
        .header-cat h4 {
            float: left
        }

        .plan-card-title {
            text-align: center
        }

        .plan-card {
            position: relative;
            background-color: #fff;
            border-radius: 12px;
            width: clamp(200px, 100%, 100vw);
            min-height: 398px !important;
            height: auto;
            text-align: center;
            overflow: hidden;
            transition: 250ms ease;
        }

        .plan-card-invis {
            background-color: transparent;
            border-radius: 12px;
            width: clamp(150px, 100%, 100vw);
            padding-top: 200px;
            padding-bottom: 200px;
            text-align: center;
            overflow: hidden
        }

        .plan-card-feature {
            height: 74%
        }

        .plan-card-feature h6 {
            margin-top: 18px
        }

        .big-plus {
            font-size: 80px;
            font-family: 'Montserrat', sans-serif;
            border-radius: 0px 50px 0px 50px;
            padding-left: 10px;
            padding-right: 10px;
            border: 0.1px solid rgb(0, 158, 0);
            color: rgb(0, 158, 0);
            transition: 300ms ease;
        }

        .big-plus:hover {
            border-radius: 50px 0px 50px 0px;
            padding-left: 20px;
            padding-right: 20px;
            border: 0.1px solid rgb(0, 158, 0, 0.5);
            background-color: rgb(0, 158, 0, 0.5);
            color: white;
        }

        .show-more,
        .show-less {
            display: none;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            overflow: hidden
        }

        .card-container {
            padding-bottom: 50px !important;
        }

        /* @media only screen and (max-width: 1920px) {
            .category-text-container {
                width: 100%;
                height: 95%;
                padding: 15px;
                overflow: hidden;
            }

            .category-img {
                height: 50%;
                width: 100%;
                object-fit: cover;

            }

            .card-mantap {
                margin-top: 20px;
                width: 100%;
                height: 45vh;
                background-color: white;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 10px 10px 10px #a7a7a7;
                transition: 200ms ease;
                position: relative;
            }
        } */
        .delete-tombol {
            background-color: rgb(255, 0, 0, 0.5);
            padding-left: 12%;
            padding-right: 12%;
            padding-top: 20px;
            padding-bottom: 10px;
            border-radius: 15px;
            color: white;
            transition: 250ms ease;
        }

        .delete-tombol:hover {
            background-color: rgb(255, 0, 0);
            padding-left: 30%;
            padding-right: 30%;
            font-weight: bold;
            color: black;
            transition: 250ms ease;
        }

        .show-more-button {
            height: 12.5%;
            transition: 250ms ease;
            width: 100%;
            color: black;
            font-size: 15px;
            border: 0;
            border-radius: 0;
        }

        .show-more-button:hover span {
            display: none;
        }

        .show-more-button:hover::before {
            content: 'Show More';
        }

        .show-more-button:hover {
            font-weight: 900;
            font-size: 18px;
            width: 100%;
            color: black;
            border-color: transparent;
            border: 0;
            transition: 250ms ease;
            border-radius: 0;
        }

        .show-less-button {
            height: 12.5%;
            transition: 250ms ease;
            width: 100%;
            color: black;
            font-size: 15px;
            border: 0;
            border-radius: 0;
            transition: 250ms ease;
        }

        .show-less-button:hover span {
            display: none;
        }

        .show-less-button:hover::before {
            content: 'Show Less';
        }

        .show-less-button:hover {
            font-weight: 900;
            font-size: 18px;
            width: 100%;
            color: black;
            border-color: transparent;
            border: 0;
            border-radius: 0;
        }

        .blurrer {
            background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(57, 37, 37, 0) 250%);
            width: 100%;
            position: absolute;
            height: 10%;
            color: transparent;
            bottom: 0;
            left: 0;
        }

        .blurrer:hover {
            display: none;
        }

        .portfolio-img {
            width: 40% !important;
            height: 100px !important;
            object-fit: cover;
        }
    </style>
    @stack('styles')
</head>

<body>
    @include('dashboard.layouts.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('dashboard.layouts.header')

        @yield('content')

        @include('dashboard.layouts.footer')
    </div>

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('assets/admin/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/simplebar/js/simplebar.min.js') }}"></script>

    <!-- Plugins and scripts required by this view-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/admin/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>

    <!-- Datatables and necessary plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.7/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/rg-1.4.1/sb-1.6.0/sp-2.2.0/sr-1.3.0/datatables.min.js">
    </script>

    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.plan-card').each(function() {
                let planCard = $(this);
                let showMoreDiv = planCard.find('.show-more');
                let scrollOffset = planCard.offset().top + planCard.outerHeight() - $(window).height() +
                    100;

                if (planCard.height() > 400) {
                    planCard.css('height', '400px');
                    showMoreDiv.show().html(createButton('more', showMore));
                }

                function showMore(button) {
                    planCard.css('height', 'auto');
                    $(button).parent().html(createButton('less', showLess));
                    planCard.addClass('card-container');
                    scrollAnimation();
                }

                function showLess(button) {
                    planCard.css('height', '400px');
                    $(button).parent().html(createButton('more', showMore));
                    planCard.removeClass('card-container');
                    scrollAnimation();
                }

                function scrollAnimation() {
                    if (scrollOffset > $(window).scrollTop()) {
                        $("html, body").animate({
                            scrollTop: scrollOffset
                        }, 400);
                    }
                }

                function createButton(text, clickHandler) {
                    const className = (text === 'more') ? 'show-more-button' : 'show-less-button';
                    const symbol = (text === 'more') ? '&darr;' : '&uarr;';

                    return $(`<button class="btn ${className}"><span>${symbol}</span></button>`)
                        .click(function() {
                            clickHandler(this);
                        });
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
