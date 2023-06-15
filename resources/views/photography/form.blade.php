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
    </style>
</head>

<body style="background-color: #e7f3f7">
    <header class="w-100">
        <div class="d-flex align-items-center justify-content-center" style="background-color: rgba(42, 44, 57, 0.9)">
            <div class="logo">
                <h1>Tefa Digital</h1>
            </div>
        </div>
    </header>

    <div class="d-flex justify-content-center position-absolute top-50 start-50 translate-middle container">
        <div class="section-wrapper w-100">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="card justify-content-center mb-3 text-center" style="background-color: #e46409;">
                        <div class="card-body">
                            <div class="mb-4">
                                <h2 class="card-title" style="color: white">Form Pemesanan Fotografi</h2>
                            </div>
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
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="">
                                <label for="floatingInput">Deskripsi</label>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-dark">Pesan</button>
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
