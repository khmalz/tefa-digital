<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ef6603">
    <title>Form - {{ $title }}</title>

    @vite('resources/js/client.js')
    @stack('styles')
</head>

<body style="overflow-x: hidden" id="form">
    <nav class="w-100 position-absolute top-0" style="z-index: 111">
        <div class="d-flex align-items-center justify-content-center" style="background-color: rgba(42, 44, 57, 0.9)">
            <div class="logo">
                <h1><a class="fw-bold fs-3 p-3 text-white" href="{{ route('home') }}">{{ app('websiteTitle') }}</a></h1>
            </div>
        </div>
    </nav>

    <div class="bg position-fixed">
        <img class="bg-img position-absolute m-auto"
            src="{{ Vite::asset('resources/assets/img/background/front.jpg') }}" alt="background">
    </div>

    <div class="row justify-content-center">
        @yield('content')
    </div>

    <script>
        // Design
        const changeInputType = () => {
            const colorInput = `
               <input type="color" class="form-control form-control-color" name="color" id="colorInput" value="#ef6603" title="Choose your color" />
            `;
            const textInput = `
               <input type="text" class="form-control form-control-sm" name="color" id="colorInput">
            `;

            const currentInputType = $('#colorInput').prop('type');

            $('#colorInput').remove();
            $('#changeColorInput')
                .text(currentInputType === 'text' ? 'Ubah ke Input Teks?' : 'Ubah ke Input Color?')
                .before(currentInputType === 'text' ? colorInput : textInput);
            $('#inputType').val(currentInputType !== 'text' ? 'text' : 'color');
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

        const previewImage = (input, index) => {
            const [file] = input.files;
            if (file) {
                $(`.preview-image${index}`).removeClass("d-none").attr('src', URL.createObjectURL(file));
            }
        }

        const allowedExtensionsDesign = ['jpg', 'jpeg', 'png', 'webp'];
        const validateDesignFile = (input, index) => {
            validateFile(input, allowedExtensionsDesign, index);
            previewImage(input, index);
        }

        // Printing
        const updateScaleInput = () => {
            const inputs = $('.input-scale-section input');
            // values adalah array
            const values = inputs
                .map(function() {
                    // Mengambil nilai dari setiap input dan menghapus whitespace di awal dan akhir nilai
                    return $(this).val().trim();
                })
                .get() // Mengubah hasil map menjadi array
                .filter(inputValue => inputValue !== ''); // Membuang nilai yang kosong dari array

            $('#scaleInput').val(values.join('x'));
        }

        const allowedExtensionsPrinting = ['stl', 'obj', 'zip'];
        const validatePrintingFile = (input) => {
            validateFile(input, allowedExtensionsPrinting);
        }

        const notAllowedEmpty = (el) => {
            (el.value === '') && (el.value = '0');
            updateScaleInput();
        }

        const onlyNumbers = (el) => {
            el.value = el.value.replace(/[^+0-9]/g, '');
            updateScaleInput();
        }

        // All
        const selectCategoryAndPlan = (categoryInput, planInput, selectedCategory, selectedPlan) => {
            $(`${categoryInput} option`)
                .filter((index, element) =>
                    !isNaN(selectedCategory) ? $(element).val() === selectedCategory.toString() :
                    $(element).text().trim() === selectedCategory
                )
                .prop('selected', true)
                .trigger('change');

            $(`${planInput} option`)
                .filter((index, element) =>
                    !isNaN(selectedPlan) ? $(element).val() === selectedPlan.toString() :
                    $(element).text().trim().startsWith(selectedPlan)
                )
                .prop('selected', true);
        };

        const selectPlan = (select) => {
            let plans = $(select).find('option:selected').data('plans');
            $('#planInput').html(plans.map(plan =>
                        `<option value="${plan.id}">${plan.title} - ${plan.price.toLocaleString('id-ID')}</option>`)
                    .join(''))
                .focus();
        }

        const validationSelect = (e) => {
            e.preventDefault(); // Mencegah pengiriman formulir

            const selectedCategoryId = $("#categoryInput").val();
            (selectedCategoryId && selectedCategoryId !== 'disabled') ? e.target.submit(): $("#categoryInput")
                .focus();
        };

        const validateFile = (input, allowedExtensions, index) => {
            const [file] = input.files;

            if (file) {
                const {
                    name
                } = file;
                const fileExtension = name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    const validationHtml =
                        `<div id="validationFile" class="invalid-feedback ${index ? `inv-${index}` : ''}">Hanya file dengan format yang diizinkan.</div>`;

                    $(input).next('#validationFile').remove()
                        .end()
                        .addClass('is-invalid')
                        .val('')
                        .after(validationHtml);
                } else {
                    $(input).removeClass('is-invalid')
                        .next('#validationFile')
                        .remove();
                }
            }
        }
    </script>
    @stack('scripts')
</body>

</html>
