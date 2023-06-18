@extends('layouts.form', ['title' => 'Design'])

@section('content')
    <div class="col-md-7">
        <div class="card-form position-relative m-auto mb-3 overflow-hidden rounded">
            <h4 class="fw-semibold my-3 text-center text-white">Form Pemesanan Design</h4>
            <div class="card-input position-relative mb-4 overflow-hidden rounded bg-white">
                <form action="{{ route('user.design.form.store') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="validationSelect(event)">
                    @csrf
                    <div class="p-5">
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="categoryInput">Category</label>
                            <select class="form-select form-select-sm" id="categoryInput"
                                data-select-category="{{ $selectedCategory }}" aria-label=".form-select-sm example"
                                onchange="selectPlan(this)" required>
                                <option selected disabled>Select the category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" data-plans='@json($category->plans)'>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="planInput">Plan</label>
                            <select class="form-select form-select-sm" name="design_plan_id" id="planInput"
                                data-select-plan="{{ $selectedPlan }}" aria-label=".form-select-sm example" required>
                                <option selected disabled>Select the plan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="nameInput">Name</label>
                            <input type="text"
                                class="form-control form-control-sm @error('name_customer') is-invalid @enderror"
                                name="name_customer" id="nameInput" placeholder="" value="{{ old('name_customer') }}">
                            @error('name_customer')
                                <div id="nameInvalid" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="phoneInput">Phone Number</label>
                            <input type="text"
                                class="form-control form-control-sm @error('number_customer') is-invalid @enderror"
                                name="number_customer" id="phoneInput" placeholder="" value="{{ old('number_customer') }}">
                            @error('number_customer')
                                <div id="numberInvalid" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="emailInput">Email</label>
                            <input type="email"
                                class="form-control form-control-sm @error('email_customer') is-invalid @enderror"
                                name="email_customer" id="emailInput" placeholder="" value="{{ old('email_customer') }}">
                            @error('email_customer')
                                <div id="emailInvalid" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="sloganInput">Slogan</label>
                            <input type="text" class="form-control form-control-sm @error('slogan') is-invalid @enderror"
                                name="slogan" id="sloganInput" placeholder="" value="{{ old('slogan') }}">
                            @error('slogan')
                                <div id="sloganInvalid" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="colorInput">Color</label>
                            <input type="hidden" name="input_type" value="color" id="inputType">
                            <div class="d-flex gap-1" id="colorInputSection">
                                <input type="{{ old('input_type', 'color') }}"
                                    class="form-control {{ old('input_type') === 'text' ? 'form-control-sm' : 'form-control-color' }}"
                                    name="color" id="colorInput"
                                    value="{{ old('color', old('input_type') === 'text' ? '' : '#ef6603') }}">
                                <button type="button" onclick="changeInputType()" id="changeColorInput"
                                    class="btn btn-sm btn-general">{{ old('input_type') === 'text' ? 'Ubah ke Input Color?' : 'Ubah ke Input Teks?' }}</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descriptionInput" class="col-form-label-sm">Description</label>
                            <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" name="description"
                                id="descriptionInput" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div id="descriptionInvalid" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-sm btn-general" type="button" id="uploadImage"
                                onclick="addImage(this)" data-input-image-count="0">Want Upload
                                Image?</button>
                            <div id="container-image"></div>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-general rounded-2">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const selectedCategory = $('#categoryInput').data('select-category');
            const selectedPlan = $('#planInput').data('select-plan');

            $('#categoryInput option')
                .filter((index, element) => $(element).text().trim() === selectedCategory)
                .prop('selected', true)
                .trigger('change');

            $('#planInput option')
                .filter((index, element) => $(element).text().trim().startsWith(selectedPlan))
                .prop('selected', true);
        });

        const selectPlan = (select) => {
            let plans = $(select).find('option:selected').data('plans');
            $('#planInput').html(plans.map(plan =>
                        `<option value="${plan.id}">${plan.title} - ${plan.price.toLocaleString('id-ID')}</option>`)
                    .join(''))
                .focus();
        }

        const validationSelect = (e) => {
            e.preventDefault(); // Mencegah pengiriman formulir

            const selectedCategoryId = $('#categoryInput').val();
            (selectedCategoryId && selectedCategoryId !== 'disabled') ? e.target.submit(): $('#categoryInput')
                .focus();
        };

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
