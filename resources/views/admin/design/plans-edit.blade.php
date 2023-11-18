@extends('admin.dashboard.layouts.main')

@section('content')
    <div class="container" id="plan">
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

        <form action="{{ route('design-plan.update', $plan->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-5">
                <div class="col-md-10">
                    <div class="form-group mb-5">
                        <div class="row">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="design-category-select"
                                    required>
                                    <option selected disabled>{{ $plan->category->title }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex flex-column mt-3 w-full gap-3">
                        <div class="row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title_plan') is-invalid @enderror"
                                    name="title_plan" value="{{ old('title_plan', $plan->title) }}">
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
                                    name="price" value="{{ $plan->price }}">
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
                                <textarea class="form-control @error('description_plan') is-invalid @enderror" name="description_plan" rows="3">{{ $plan->description }}</textarea>
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
                    <div id="deleted-id-input" hidden></div>
                    @foreach ($plan->features as $feature)
                        <div class="form-group d-md-flex align-items-center gap-3" data-feature-id="{{ $feature->id }}">
                            <div class="d-flex flex-column w-100 mt-3 flex-wrap gap-3">
                                <div class="row gap-3">
                                    <label for="text" class="col-sm-2 col-form-label">Text</label>
                                    <div class="col">
                                        <input type="text"
                                            class="form-control @error('edit.*.text') is-invalid @enderror" id="text"
                                            value="{{ $feature->text }}" readonly>
                                        @error('edit.*.text')
                                            is-invalid
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gap-3">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col">
                                        <textarea class="form-control @error('edit.*.description') is-invalid @enderror" rows="3" readonly>{{ $feature->description }}</textarea>
                                        @error('edit.*.description')
                                            is-invalid
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-md-center flex-column mt-md-0 mt-3 gap-2">
                                <div>
                                    <input type="checkbox" hidden id="deleted-{{ $feature->id }}" class="delete-feature"
                                        onchange="deleteFeatureOld(this)">
                                    <label for="deleted-{{ $feature->id }}"
                                        class="btn btn-danger text-white">Delete</label>
                                </div>
                                <div><button type="button" class="btn btn-primary edit-feature" onclick="editFeature(this)"
                                        data-feature-id="{{ $feature->id }}">Edit</button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex align-items-center justify-content-between mt-3" id="button-bottom">
                        <button type="button" class="btn btn-success create-feature text-white text-white"
                            onclick="createFeature()">Add</button>
                        <button type="submit" class="btn btn-info save-changes-plan text-white text-white">Save
                            Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
