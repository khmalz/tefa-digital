@extends('layouts.form', ['title' => 'Photography'])

@section('content')
    <div class="col-md-7">
        <div class="card-form position-relative m-auto mb-3 overflow-hidden rounded">
            <h4 class="fw-semibold my-3 text-center text-white">Form Pemesanan Photography</h4>
            <div class="card-input position-relative mb-4 overflow-hidden rounded bg-white">
                <form action="{{ route('user.photography.form.store') }}" method="POST" onsubmit="validationSelect(event)">
                    @csrf
                    <div class="p-5">
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="categoryInput">Category</label>
                            <select class="form-select form-select-sm @error('category') is-invalid @enderror"
                                id="categoryInput" data-select-category="{{ old('category', $selectedCategory) }}"
                                aria-label=".form-select-sm example" onchange="selectPlan(this)" name="category" required>
                                <option selected disabled>Select the category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" data-plans='@json($category->plans)'>
                                        {{ $category->title }}</option>
                                @endforeach
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="planInput">Plan</label>
                            <select class="form-select form-select-sm @error('photography_plan_id') is-invalid @enderror"
                                name="photography_plan_id" id="planInput"
                                data-select-plan="{{ old('photography_plan_id', $selectedPlan) }}"
                                aria-label=".form-select-sm example" required>
                                <option selected disabled>Select the category first</option>
                            </select>
                            @error('photography_plan_id')
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
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectedCategory = $('#categoryInput').data('select-category');
            const selectedPlan = $('#planInput').data('select-plan');

            selectCategoryAndPlan('#categoryInput', '#planInput', selectedCategory, selectedPlan);
        });
    </script>
@endpush
