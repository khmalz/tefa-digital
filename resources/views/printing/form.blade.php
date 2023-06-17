@extends('layouts.form', ['title' => 'Printing'])

@section('content')
    <div class="col-md-6">
        <div class="card-form position-relative m-auto mb-3 overflow-hidden rounded">
            <h4 class="fw-semibold my-3 text-center text-white">Form Pemesanan Printing</h4>
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
                            <label class="col-form-label-sm" for="materialInput">Material</label>
                            <select class="form-select form-select-sm" name="material" aria-label="Default select example">
                                <option selected disabled>Select the material</option>
                                <option value="Metal Stainless Steel">Metal Stainless Steel</option>
                                <option value="Strong Nylon Plastic">Strong Nylon Plastic</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="scaleInput">Scale (cm)</label>
                            <div class="row input-scale-section">
                                <div class="col">
                                    <input type="text" value="0" class="form-control form-control-sm"
                                        placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)"
                                        onblur="notAllowedEmpty(this)">
                                </div>
                                <div class="align-self-center col-auto">
                                    <span>x</span>
                                </div>
                                <div class="col">
                                    <input type="text" value="0" class="form-control form-control-sm"
                                        placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)"
                                        onblur="notAllowedEmpty(this)">
                                </div>
                                <div class="align-self-center col-auto">
                                    <span>x</span>
                                </div>
                                <div class="col">
                                    <input type="text" value="0" class="form-control form-control-sm"
                                        placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)"
                                        onblur="notAllowedEmpty(this)">
                                </div>
                            </div>
                            <input type="text" name="scale" id="scaleInput">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="fileInput">File</label>
                            <input class="form-control form-control-sm form-control-file" name="file" type="file"
                                id="fileUpload" accept=".stl, .obj, .zip" onchange="validateFile(this)">
                        </div>
                        <div class="mb-3">
                            <label for="descriptionInput" class="col-form-label-sm">Description</label>
                            <textarea class="form-control form-control-sm" name="description" id="descriptionInput" rows="3"></textarea>
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

        const notAllowedEmpty = (el) => {
            (el.value === '') && (el.value = '0');
            updateScaleInput();
        }

        const onlyNumbers = (el) => {
            el.value = el.value.replace(/[^+0-9]/g, '');
            updateScaleInput();
        }

        const validateFile = (input) => {
            const [file] = input.files;
            const allowedExtensions = ['stl', 'obj', 'zip'];

            if (file) {
                const {
                    name
                } = file;
                const fileExtension = name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    const validationHtml =
                        `<div id="validationFile" class="invalid-feedback">Hanya file dengan format STL, OBJ, dan ZIP yang diizinkan.</div>`

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
@endpush
