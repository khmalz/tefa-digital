@extends('profile.order-edit.layout')

@section('input')
<form action="{{ route('user.videography.form.store') }}" method="POST" onsubmit="validationSelect(event)">
    @csrf
    <div class="p-5">
        <div class="mb-3">
            <label class="col-form-label-sm" for="categoryInput">Category</label>
            <select class="form-select form-select-sm @error('category') is-invalid @enderror"
                id="categoryInput"
                aria-label=".form-select-sm example" onchange="selectPlan(this)" name="category" required>
                <option selected disabled>category - videography</option>
            </select>
            @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="col-form-label-sm" for="planInput">Plan</label>
            <select class="form-select form-select-sm @error('videography_plan_id') is-invalid @enderror"
                name="videography_plan_id" id="planInput"
                aria-label=".form-select-sm example" required>
                <option selected disabled>videography category</option>
            </select>
            @error('videography_plan_id')
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
