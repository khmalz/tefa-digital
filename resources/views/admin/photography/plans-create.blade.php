@extends('admin.layouts.main')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="alert alert-danger" role="alert" id="maks-alert" style="display: none;">
            Maximum plan is 4, you can't add more
        </div>

        <form action="{{ route('photography-plan.store') }}" method="post">
            @csrf
            <div class="row mb-5">
                <div class="col-md-10">
                    <div class="form-group mb-5">
                        <div class="row">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('photography_category_id') is-invalid @enderror"
                                    aria-label="Default select example" name="photography_category_id"
                                    id="photography-category-select" required>
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option {{ $categoryValue == $category->title ? 'selected' : '' }}
                                            value="{{ $category->id }}" data-plans-count="{{ $category->plans_count }}">
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('photography_category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex flex-column mt-3 w-full gap-3">
                        <div class="row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title_plan') is-invalid @enderror"
                                    name="title_plan">
                                @error('title_plan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description_plan') is-invalid @enderror" name="description_plan" rows="3"></textarea>
                                @error('description_plan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="form-group d-flex">
                        <div class="d-flex flex-column w-100 mt-3 gap-3">
                            <div class="row">
                                <label for="text" class="col-sm-2 col-form-label">Text</label>
                                <div class="col">
                                    <input type="text" class="form-control @error('text.*') is-invalid @enderror"
                                        name="text[]" id="text">
                                    @error('text.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col">
                                    <textarea class="form-control @error('description.*') is-invalid @enderror" rows="3" id="description"
                                        name="description[]"></textarea>
                                    @error('description.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3" id="button-bottom">
                        <button type="button" class="btn btn-success text-white create-feature">Add</button>
                        <button type="submit" class="btn btn-info text-white save-changes">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let initialPlansCount = $('#photography-category-select :selected').data('plans-count');
            updateUiByCount(initialPlansCount);

            $('#photography-category-select').change(function() {
                let selectedPlansCount = $(this).find(':selected').data('plans-count');
                updateUiByCount(selectedPlansCount);
            });

            function updateUiByCount(plansCount) {
                $('#maks-alert').toggle(plansCount >= 4);
                $('.save-changes').prop('disabled', plansCount >= 4);
            }

            $('.create-feature').click(function() {
                let newFormGroup = `
                    <div class="form-group d-md-flex align-items-center gap-3">
                        <div class="d-flex flex-column w-100 mt-3 flex-wrap gap-3">
                            <div class="row gap-3">
                                <label for="text" class="col-sm-2 col-form-label">Text</label>
                                <div class="col">
                                    <input type="text" name="text[]" class="form-control @error('text.*') is-invalid @enderror" id="text">
                                    @error('text.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gap-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col">
                                    <textarea class="form-control @error('description.*') is-invalid @enderror" name="description[]" rows="3"></textarea>
                                    @error('description.*')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <button type="button" class="btn btn-danger text-white delete-feature-new">Delete</button>
                        </div>
                    </div>
                `;
                $(newFormGroup).insertBefore('#button-bottom');

                // Set focus to the newly created text input
                $(newFormGroup).find('input[name="text[]"]').focus();

                // Unset the readonly attribute and clear the value of the input and textarea
                $(newFormGroup).find('input[name="text[]"], textarea[name="description[]"]').prop(
                    'readonly', false).val('');
            });

            // Fungsi untuk menghapus form-group baru
            $(document).on('click', '.delete-feature-new', function() {
                $(this).closest('.form-group').remove();
            });
        });
    </script>
@endpush
