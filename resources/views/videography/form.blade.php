@extends('layouts.form', ['title' => 'Videography'])

@section('content')
    <div class="col-md-7">
        <div class="card-form position-relative m-auto mb-3 overflow-hidden rounded">
            <h4 class="fw-semibold my-3 text-center text-white">Form Pemesanan Videography</h4>
            <div class="card-input position-relative mb-4 overflow-hidden rounded bg-white">
                <form action="{{ route('user.videography.form.store') }}" method="POST"
                    onsubmit="validationSelectVideography(event)">
                    @csrf
                    <div class="p-5">
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="categoryInput">Category</label>
                            <select class="form-select form-select-sm" id="categoryInput"
                                data-select-category="{{ old('category', $selectedCategory) }}"
                                aria-label=".form-select-sm example" onchange="selectPlanVideography(this)" name="category"
                                required>
                                <option selected disabled>Select the category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" data-plans='@json($category->plans)'>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="planInput">Plan</label>
                            <select class="form-select form-select-sm" name="videography_plan_id" id="planInput"
                                data-select-plan="{{ old('videography_plan_id', $selectedPlan) }}"
                                aria-label=".form-select-sm example" required>
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
        $(document).ready(function() {
            const selectedCategory = $('#categoryInput').data('select-category');
            const selectedPlan = $('#planInput').data('select-plan');

            selectCategoryAndPlan('#categoryInput', '#planInput', selectedCategory, selectedPlan);
        });

        const selectPlanVideography = (select) => {
            selectPlan(select)
        }

        const validationSelectVideography = (e) => {
            validationSelect(e, '#categoryInput')
        };
    </script>
@endpush
