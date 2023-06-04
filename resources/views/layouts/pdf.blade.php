<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet" />
    <style>
        td {
            font-family: "Roboto Condensed", sans-serif;
            font-weight: 100;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .rc {
            font-family: "Roboto Condensed", sans-serif;
        }

        .rc-bold {
            font-family: "Roboto Condensed", sans-serif;
            font-weight: 700;
        }

        .text-center {
            text-align: center !important;
        }

        .text-justify {
            text-align: justify;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .contained {
            width: 100%;
            margin: auto;
        }

        .contained-text {
            width: 30%;
            margin: auto;
        }

        .top-text {
            vertical-align: top;
        }

        .table-moment {
            width: 100%;
            margin: auto;
            page-break-inside: avoid;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mt-2 {
            margin-top: 0.5rem !important;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>
