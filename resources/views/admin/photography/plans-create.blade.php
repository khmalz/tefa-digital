@extends('admin.dashboard.layouts.main')
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

        <div class="alert alert-danger" role="alert" id="maks-alert-plan" style="display: none;">
            Maximum plan is 4, you can't add more
        </div>

        <form action="{{ route('photography-plan.store') }}" method="post">
            @csrf
            <div class="row mb-5">
                <div class="col-md-10">
                    <div class="form-group mb-5">
                        <div class="row">
                            <label for="photography-category-select" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('photography_category_id') is-invalid @enderror"
                                    aria-label="Default select example" name="photography_category_id"
                                    id="photography-category-select" onclick="handleCategorySelectChange(this)" required>
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
                            <label for="titleInput" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" id="titleInput"
                                    class="form-control @error('title_plan') is-invalid @enderror" name="title_plan">
                                @error('title_plan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="priceInput" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" id="priceInput"
                                    class="form-control @error('price') is-invalid @enderror" name="price">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="descriptionInput" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea id="descriptionInput" class="form-control @error('description_plan') is-invalid @enderror"
                                    name="description_plan" rows="3"></textarea>
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
                        <button type="button" class="btn btn-success text-white" onclick="createFeature()">Add</button>
                        <button type="submit" class="btn btn-info save-changes-plan text-white">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let initialPlansCount = $('#photography-category-select :selected').data('plans-count');
            updateUiByCount(initialPlansCount);
        });
    </script>
@endpush
