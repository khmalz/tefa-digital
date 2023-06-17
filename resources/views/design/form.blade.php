@extends('layouts.form', ['title' => 'Design'])

@section('content')
    <div class="col-md-7">
        <div class="card-form position-relative m-auto mb-3 overflow-hidden rounded">
            <h4 class="fw-semibold my-3 text-center text-white">Form Pemesanan Design</h4>
            <div class="card-input position-relative mb-4 overflow-hidden rounded bg-white">
                <form action="" method="POST">
                    @csrf
                    <div class="p-5">
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="nameInput">Nama</label>
                            <input type="text" class="form-control form-control-sm" name="name_customer" id="nameInput"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="phoneInput">Nomor telepon</label>
                            <input type="text" class="form-control form-control-sm" name="number_customer"
                                id="phoneInput" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="emailInput">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email_customer" id="emailInput"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="sloganInput">Slogan</label>
                            <input type="text" class="form-control form-control-sm" name="slogan" id="sloganInput"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="colorInput">Color</label>
                            <div class="d-flex gap-1" id="colorInputSection">
                                <input type="text" class="form-control form-control-sm" name="color" id="colorInput"
                                    placeholder="">
                                <button type="button" onclick="changeInputType()" id="changeColorInput"
                                    class="btn btn-sm btn-general">Ubah ke Input
                                    Color?</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descriptionInput" class="col-form-label-sm">Description</label>
                            <textarea class="form-control form-control-sm" name="description" id="descriptionInput" rows="3"></textarea>
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-sm btn-general" type="button" id="uploadImage" onclick="addImage(this)"
                                data-input-image-count="0">Want Upload
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
@endsection

@push('scripts')
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

        const addImage = (input) => {
            const inputImageCount = $(input).data('input-image-count') + 1;
            imageIndexReal++;

            const imageSection = `
               <div id="imageSection${imageIndexReal}" class="mt-2">
                  <img class="preview-image${imageIndexReal} d-none img-fluid col-md-8 col-lg-4 mb-2 rounded" alt="preview image">
                  <div class="d-flex">
                     <div class="me-3 mb-3">
                           <input class="form-control form-control-sm" name="gambar[]" type="file" accept=".jpg, .jpeg, .png, .webp" id="image${imageIndexReal}" onchange="validateDesignFile(this, ${imageIndexReal})">
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
            $(input).data('input-image-count', inputImageCount)
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

        const allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        const validateDesignFile = (input, index) => {
            validateFile(input, allowedExtensions, index);
            previewImage(input, index);
        }

        const previewImage = (input, index) => {
            const [file] = input.files;

            if (file) {
                $(`.preview-image${index}`).removeClass("d-none").attr('src', URL.createObjectURL(file));
            }
        }
    </script>
@endpush
