@extends('layouts.form', ['title' => 'Printing'])

@section('content')
    <div class="col-md-6">
        <div class="card-form position-relative m-auto mb-3 overflow-hidden rounded">
            <h4 class="fw-semibold my-3 text-center text-white">Form Pemesanan Printing</h4>
            <div class="card-input position-relative mb-4 overflow-hidden rounded bg-white">
                <form action="{{ route('user.printing.form.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5">
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
                            <label class="col-form-label-sm" for="materialInput">Material</label>
                            <select class="form-select form-select-sm @error('material') is-invalid @enderror"
                                name="material" aria-label="Default select example">
                                <option selected disabled>Select the material</option>
                                <option value="Metal Stainless Steel">Metal Stainless Steel</option>
                                <option value="Strong Nylon Plastic">Strong Nylon Plastic</option>
                            </select>
                            @error('material')
                                <div id="emailInvalid" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                            <input type="hidden" name="scale" id="scaleInput">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="fileInput">File</label>
                            <input
                                class="form-control form-control-sm form-control-file @error('file') is-invalid @enderror"
                                name="file" type="file" id="fileUpload" accept=".stl, .obj, .zip"
                                onchange="validatePrintingFile(this)">
                            @error('file')
                                <div id="fileInvalid" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

        const allowedExtensions = ['stl', 'obj', 'zip'];
        const validatePrintingFile = (input) => {
            validateFile(input, allowedExtensions);
        }
    </script>
@endpush
