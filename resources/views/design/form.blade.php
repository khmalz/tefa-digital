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

<body style="overflow-x: hidden">
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
                <form action="" method="POST">
                    @csrf
                    <div class="p-5">
                        <div class="mb-3">
                            <label class="form-label" for="nameInput">Nama</label>
                            <input type="text" class="form-control" name="name_customer" id="nameInput"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phoneInput">Nomor telepon</label>
                            <input type="text" class="form-control" name="number_customer" id="phoneInput"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="emailInput">Email</label>
                            <input type="email" class="form-control" name="email_customer" id="emailInput"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="sloganInput">Slogan</label>
                            <input type="text" class="form-control" name="slogan" id="sloganInput" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="colorInput">Color</label>
                            <div class="d-flex gap-1" id="colorInputSection">
                                <input type="text" class="form-control form-control-sm" name="color"
                                    id="colorInput" placeholder="">
                                <button type="button" onclick="changeInputType()" id="changeColorInput"
                                    class="btn btn-sm btn-general">Ubah ke Input
                                    Color?</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descriptionInput" class="form-label">Description</label>
                            <textarea class="form-control" id="descriptionInput" rows="3"></textarea>
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-sm btn-general" type="button" id="uploadImage"
                                onclick="addImage(this)" data-input-image-count="0">Want Upload
                                Image?</button>
                            <div id="container-image"></div>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="button" class="btn btn-general rounded-2">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        const changeInputType = () => {
            const colorInput = `
                <input type="color" name="color" class="form-control form-control-color" id="colorInput" value="#ef6603" title="Choose your color" />
                <button type="button" onclick="changeInputType()" id="changeColorInput" class="btn btn-sm btn-general">Ubah ke Input Teks?</button>
            `;

            const textInput = `
                <input type="text" class="form-control form-control-sm" name="color" id="colorInput" placeholder="">
                <button type="button" onclick="changeInputType()" id="changeColorInput" class="btn btn-sm btn-general">Ubah ke Input Color?</button>
            `;

            const currentInputType = $('#colorInput').prop('type');
            $('#colorInput, #changeColorInput').remove();

            $('#colorInputSection').append(currentInputType === 'text' ? colorInput : textInput);
        };

        let imageIndexReal = 0;

        const addImage = (el) => {
            const inputImageCount = $(el).data('input-image-count') + 1;
            imageIndexReal++;

            const imageSection = `
                <div id="imageSection${imageIndexReal}" class="mt-2">
                    <img class="preview-image${imageIndexReal} d-none img-fluid col-md-8 col-lg-4 mb-2 rounded" alt="preview image">
                    <div class="d-flex">
                        <div class="me-3 mb-3">
                            <input class="form-control form-control-sm" name="gambar[]" type="file" id="image${imageIndexReal}" onchange="previewImage(this, ${imageIndexReal})">
                        </div>
                        <div>
                            <button class="btn btn-sm btn-danger" type="button" onclick="deleteImage(${imageIndexReal})">Delete</button>
                        </div>
                    </div>
                </div>
            `;

            $('#container-image').append(imageSection);

            // Mengubah nilai data-input-image-count pada elemen tombol
            // Mengubah teks tombol menjadi "More"
            // Menghilangkan tombol "Want Upload Image?" setelah ada 3 input gambar
            $(el).data('input-image-count', inputImageCount)
                .attr('data-input-image-count', inputImageCount)
                .text('More')
                .toggle(inputImageCount < 3);
        }

        const deleteImage = (imageIndex) => {
            // Menghapus parent div dengan id yang sesuai
            $(`#imageSection${imageIndex}`).remove();

            // Mengurangi nilai data-input-image-count
            let uploadImage = $('#uploadImage');
            let currentCount = uploadImage.data('input-image-count');
            uploadImage.data('input-image-count', currentCount - 1)
                .attr('data-input-image-count', currentCount - 1);

            // Memeriksa jika data-input-image-count kurang dari 3, maka tampilkan tombol, dan ketika input countnya 0 berubah isi teks ke "Want Upload Image?"
            (currentCount - 1 < 3) && uploadImage.show();
            (currentCount - 1 == 0) && uploadImage.text('Want Upload Image?');
        }

        const previewImage = (input, index) => {
            const [file] = input.files;

            if (file) {
                $(`.preview-image${index}`).removeClass("d-none").attr('src', URL.createObjectURL(file));
            }
        }
    </script>
</body>

</html>
