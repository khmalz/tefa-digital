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
        .bg {
            position: fixed; 
            top: -50%; 
            left: -50%; 
            width: 200%; 
            height: 200%;
        }
        .bg-img {
            filter: grayscale(100%) saturate(0%); 
            position: absolute; 
            top: 0; 
            left: 0; 
            right: 0; 
            bottom: 0; 
            margin: auto; 
            min-width: 50%;
            min-height: 50%;

        }
        .card-form {
            justify-content: center;
            margin: auto;
            margin-top: 16vh;
            max-width: 60vw;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            background: #ef6603;
        }
        .card-input {
            min-width: 95%;
            margin-bottom: 2%;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            background: #fff;
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

        .preview-container {
            background-color: #e9ecef;
            width: 15vw;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            border-radius: 4px;
        }

        .preview-container:hover {
            background-color: #dfe4dd;
        }

        .preview-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .preview-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .preview-file-name {
            font-size: 14px;
        }

    </style>
</head>

<body>
    <nav class="w-100 position-absolute top-0" style="z-index: 111">
        <div class="d-flex align-items-center justify-content-center" style="background-color: rgba(42, 44, 57, 0.9)">
            <div class="logo">
                <h1>Tefa Digital</h1>
            </div>
        </div>
    </nav>

    <div class="bg">
        <img class="bg-img" src="{{ asset('assets/img/background/front.jpg')}}" alt="">
    </div>

    <div class="row">
        <div class="col card-form">
            <h2 class="text-center text-white my-3">Form Pemesanan Design</h2>
            <div class="col card-input">
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
                    <div class="mb-4">
                        <button class="btn btn-sm btn-form">Want Upload Image?</button>
                        <button class="btn btn-sm btn-form">More</button>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3 me-3">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    <div class="preview-container p-2"></div>
                    <div class="mb-1 text-center">
                        <button type="button" class="btn btn-form rounded-5">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function previewImages() {
    const previewContainer = document.querySelector('.preview-container');
    previewContainer.innerHTML = '';

    const files = document.getElementById('formFile').files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
        const imageSrc = e.target.result;

        const previewItem = document.createElement('div');
        previewItem.classList.add('preview-item');

        const previewImage = document.createElement('img');
        previewImage.classList.add('preview-image');
        previewImage.src = imageSrc;

        const fileName = document.createElement('span');
        fileName.classList.add('preview-file-name');
        fileName.textContent = file.name;

        previewItem.appendChild(previewImage);
        previewItem.appendChild(fileName);

        previewContainer.appendChild(previewItem);
        };

        reader.readAsDataURL(file);
    }
    }

    document.getElementById('formFile').addEventListener('change', previewImages);

</script>
</html>
