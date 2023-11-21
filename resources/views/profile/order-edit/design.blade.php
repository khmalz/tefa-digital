@extends('profile.order-edit.layout')

@section('input')
    <form action="{{ route('user.design.form.store') }}" method="POST" enctype="multipart/form-data"
        onsubmit="validationSelectDesign(event)">
        @csrf
        <div class="p-5">
            <div class="mb-3">
                <label class="col-form-label-sm" for="categoryInput">Category</label>
                <select class="form-select form-select-sm @error('category') is-invalid @enderror" id="categoryInput"
                    aria-label=".form-select-sm example"
                    onchange="selectPlanDesign(this)" name="category" required>
                    <option selected disabled>Design - Logo</option>
                </select>
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
                    name="number_customer" id="phoneInput" placeholder="No Telepon" value="{{ old('number_customer') }}">
                @error('number_customer')
                    <div id="numberInvalid" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="col-form-label-sm" for="sloganInput">Slogan <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control form-control-sm @error('slogan') is-invalid @enderror"
                    name="slogan" id="sloganInput" placeholder="Slogan" value="{{ old('slogan') }}">
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
                <button class="btn btn-sm btn-general" type="button" id="uploadImage" onclick="addImage(this)"
                    data-input-image-count="0">Want Upload
                    Image?</button>
                <div id="container-image"></div>
            </div>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-general rounded-2">Pesan</button>
        </div>
    </form>
@endsection
