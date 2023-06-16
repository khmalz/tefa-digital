<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pemesanan</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        .bg {
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
        }

        .bg-img {
            filter: grayscale(100%) saturate(0%);
            -webkit-filter: grayscale(100%) saturate(0%);
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            min-width: 50%;
            min-height: 50%;
        }

        .card-form {
            margin-top: 16vh !important;
            max-width: 60vw;
            background-color: #ef6603;
        }

        .card-input {
            min-width: 95%;
        }
    </style>
</head>

<body>
    <nav class="w-100 position-absolute top-0" style="z-index: 111">
        <div class="d-flex align-items-center justify-content-center" style="background-color: rgba(42, 44, 57, 0.9)">
            <div class="logo">
                <h1 class="fw-bold fs-3 p-3 text-white">Tefa Digital</h1>
            </div>
        </div>
    </nav>

    <div class="bg position-fixed">
        <img class="bg-img position-absolute m-auto" src="{{ asset('assets/img/background/front.jpg') }}"
            alt="background">
    </div>

    <div class="row">
        <div class="card-form position-relative m-auto mb-3 overflow-hidden rounded">
            <h4 class="fw-semibold my-3 text-center text-white">Form Pemesanan Design</h4>
            <div class="card-input position-relative mb-4 overflow-hidden rounded bg-white">
                <div class="p-5">
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
                    <div class="mb-4">
                        <button class="btn btn-sm btn-general">Want Upload Image?</button>
                        <button class="btn btn-sm btn-general">More</button>
                    </div>
                    <img class="preview-image d-none img-fluid col-md-8 col-lg-4 mb-2 rounded" alt="preview image">
                    <div class="d-flex">
                        <div class="me-3 mb-3">
                            <input class="form-control form-control-sm" type="file" id="image"
                                onchange="previewImage(this)">
                        </div>
                        <div>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button type="button" class="btn btn-general rounded-2">Pesan</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    function previewImage(input) {
        const [file] = input.files;

        if (file) {
            const previewImage = document.querySelector('.preview-image');
            previewImage.classList.remove("d-none");
            previewImage.src = URL.createObjectURL(file);
        }
    }
</script>

</html>
