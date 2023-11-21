@extends('profile.order-edit.layout')

@section('input')
    <form action="{{ route('user.order.printing.update', $order->ulid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="p-5">
            <div class="mb-3">
                <label class="col-form-label-sm" for="nameInput">Name</label>
                <input type="text" class="form-control form-control-sm" name="name_customer" id="nameInput"
                    placeholder="Name" readonly value="{{ old('name_customer', auth()->user()->name) }}">
                <small>
                    <div id="nameHelp" class="form-text">Update profile jika ingin mengubah</div>
                </small>
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="emailInput">Email</label>
                <input type="email" class="form-control form-control-sm" name="email_customer" id="emailInput"
                    placeholder="Email" readonly value="{{ old('email_customer', auth()->user()->email) }}">
                <small>
                    <div id="emailHelp" class="form-text">Update profile jika ingin mengubah</div>
                </small>
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="phoneInput">No Telepon</label>
                <input type="text" class="form-control form-control-sm @error('number_customer') is-invalid @enderror"
                    name="number_customer" id="phoneInput" placeholder="No Telepon"
                    value="{{ old('number_customer', $order->number_customer) }}">
                @error('number_customer')
                    <div id="numberInvalid" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="materialInput">Material</label>
                <select class="form-select form-select-sm @error('material') is-invalid @enderror" name="material"
                    aria-label="Default select example" id="materialInput">
                    <option selected disabled>Select the material</option>
                    <option
                        {{ old('material', $order->orderable->material) == 'Metal Stainless Steel' ? 'selected' : null }}
                        value="Metal Stainless Steel">Metal Stainless Steel</option>
                    <option {{ old('material', $order->orderable->material) == 'Strong Nylon Plastic' ? 'selected' : null }}
                        value="Strong Nylon Plastic">Strong Nylon Plastic</option>
                </select>
                @error('material')
                    <div id="emailInvalid" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="scaleX">Scale (cm)</label>
                <div class="row input-scale-section">
                    <div class="col">
                        <input type="text" value="0" id="scaleX" class="form-control form-control-sm"
                            placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)" onblur="notAllowedEmpty(this)">
                    </div>
                    <div class="align-self-center col-auto">
                        <span>x</span>
                    </div>
                    <div class="col">
                        <input type="text" value="0" id="scaleY" class="form-control form-control-sm"
                            placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)" onblur="notAllowedEmpty(this)">
                    </div>
                    <div class="align-self-center col-auto">
                        <span>x</span>
                    </div>
                    <div class="col">
                        <input type="text" value="0" id="scaleZ" class="form-control form-control-sm"
                            placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)" onblur="notAllowedEmpty(this)">
                    </div>
                </div>
                <input type="hidden" name="scale" id="scaleInput" value="{{ old('scale', $order->orderable->scale) }}">
            </div>
            <div class="mb-3">
                <p class="m-0 p-0">File lama</p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <i class="bi bi-folder2 text-warning" style="font-size: 1.3rem;"></i>
                        <span id="fileName">{{ $order->orderable->file_name }}</span>
                    </div>
                    <div>
                        <a href="{{ route('user.download.file', $order->orderable->id) }}" class="text-primary"
                            style="font-size: 1rem">
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <label class="col-form-label-sm" for="fileUpload">File (Mengganti file lama)</label>
                    <input class="form-control form-control-sm form-control-file @error('file') is-invalid @enderror"
                        name="file" type="file" id="fileUpload" accept=".stl, .obj, .zip"
                        onchange="validatePrintingFile(this)">
                    @error('file')
                        <div id="fileInvalid" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="descriptionInput" class="col-form-label-sm">Description</label>
                <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" name="description"
                    id="descriptionInput" rows="3">{{ old('description', $order->description) }}</textarea>
                @error('description')
                    <div id="descriptionInvalid" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-general rounded-2">Edit Order</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            splitAndSetValues()
        })

        const splitAndSetValues = () => {
            const scaleInputValue = $('#scaleInput').val();

            // Memastikan bahwa nilai input tersembunyi tidak kosong
            const values = scaleInputValue !== '' ? scaleInputValue.split('x') : ['0', '0', '0'];

            // Mengatur nilai untuk scaleX, scaleY, dan scaleZ sesuai urutan
            $('#scaleX').val(values[0]);
            $('#scaleY').val(values[1]);
            $('#scaleZ').val(values[2]);
        };

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
    </script>
@endpush
