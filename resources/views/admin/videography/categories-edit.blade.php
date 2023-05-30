@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: 100%">
        <form action="{{ route('videography-category.update', $videographyCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="category-title-input" class="form-label">Title</label>
                <input class="form-control" id="category-title-input" type="text" name="title"
                    value="{{ old('title', $videographyCategory->title) }}">
            </div>
            <div class="mt-3">
                <label for="category-description-input" class="form-label">Description</label>
                <textarea class="form-control" id="category-description-input" name="body" cols="30" rows="10">{{ old('body', $videographyCategory->body) }}</textarea>
            </div>
            <div class="mt-3">
                <label for="category-image-input" class="form-label">Image</label>
                <input class="form-control" type="file" id="category-image-input" name="image">
            </div>
            <div class="mt-4">
                <button type="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
@endsection
