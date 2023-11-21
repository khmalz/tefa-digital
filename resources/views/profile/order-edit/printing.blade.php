@extends('profile.order-edit.layout')

@section('input')
<form action="{{ route('user.printing.form.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
            <input type="text"
                class="form-control form-control-sm @error('number_customer') is-invalid @enderror"
                name="number_customer" id="phoneInput" placeholder="No Telepon"
                value="{{ old('number_customer') }}">
            @error('number_customer')
                <div id="numberInvalid" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="col-form-label-sm" for="materialInput">Material</label>
            <select class="form-select form-select-sm @error('material') is-invalid @enderror"
                name="material" aria-label="Default select example" id="materialInput">
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
            <label class="col-form-label-sm" for="scaleX">Scale (cm)</label>
            <div class="row input-scale-section">
                <div class="col">
                    <input type="text" value="0" id="scaleX" class="form-control form-control-sm"
                        placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)"
                        onblur="notAllowedEmpty(this)">
                </div>
                <div class="align-self-center col-auto">
                    <span>x</span>
                </div>
                <div class="col">
                    <input type="text" value="0" id="scaleY" class="form-control form-control-sm"
                        placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)"
                        onblur="notAllowedEmpty(this)">
                </div>
                <div class="align-self-center col-auto">
                    <span>x</span>
                </div>
                <div class="col">
                    <input type="text" value="0" id="scaleZ" class="form-control form-control-sm"
                        placeholder="0 cm" pattern="[+0-9]+" oninput="onlyNumbers(this)"
                        onblur="notAllowedEmpty(this)">
                </div>
            </div>
            <input type="hidden" name="scale" id="scaleInput">
        </div>
        <div class="mb-3">
            <label class="col-form-label-sm" for="fileUpload">File</label>
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
@endsection
