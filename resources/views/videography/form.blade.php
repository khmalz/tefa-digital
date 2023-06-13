<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .logo h1 {
            font-size: 28px;
            margin: 10px;
            padding: 10px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: 1px;
            color: #fff;
            text-decoration: none;
            justify-content: center;
        }
        .btn-form {
            --bs-btn-padding: .100rem;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: #ef6603;
            --bs-btn-border-color: #ef6603;
            --bs-btn-hover-color: #ef6603;
            --bs-btn-hover-border-color: #ef6603;
            --bs-btn-focus-shadow-rgb: #ef6603;
            --bs-btn-active-color: var(--bs-btn-hover-color);
        }

        .bg-form {
            width: 100vw !important;
            height: 100vh;
        }

        .img-form {
            width: 100% !important;
            filter: brightness(20%) saturate(0);
            height: 100%
        }

        .card-one {
            width: 736px;
            height: 500px;
            background: #ef6603;
            justify-content: center;
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, 'sans-serif';
            color: white;
        }

        .card-two {     
            height: 320px;
            background: white;
            justify-content: center;
            border-radius: 5% 5% 0px 0px
        }
    </style>
</head>

<body class="position-relative" style="max-height: 100vh !important; height: 100% !important">
    <nav class="w-100 position-absolute top-0" style="z-index: 111">
        <div class="d-flex align-items-center justify-content-center" style="background-color: rgba(42, 44, 57, 0.9)">
            <div class="logo">
                <h1>Tefa Digital</h1>
            </div>
        </div>
    </nav>

    <div class="bg-form">
        <img class="img-form" src="{{ asset('assets/img/background/front.jpg')}}" alt="">
    </div>

    <div class="d-flex justify-content-center position-absolute top-50 start-50 translate-middle container">
        <div class="section-wrapper w-100">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 col-12">
                    <div class="card-one position-relative overflow-hidden" style="border-radius: 10px">
                            <h2 class="text-center p-2">Form Pemesanan Videografi</h2>
                        <div class="card-two position-absolute h-100 w-100" >
                            <div class="justify-content-center text-center" style="background-color: transparent;">
                                <div class="card-body justify-content-center p-5">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Nama</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Nomor telepon</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="">
                                        <label for="floatingInput">Deskripsi</label>
                                    </div>
                                    <div class="mb-1">
                                        <button type="button" class="btn btn-form rounded-5">Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
