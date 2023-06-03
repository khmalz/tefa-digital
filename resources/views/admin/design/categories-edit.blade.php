@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: 100%">
        <form action="{{ route('design-category.update', $designCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="category-title-input" class="form-label">Title</label>
                <input class="form-control @error('title') is-invalid @enderror" id="category-title-input" type="text"
                    name="title" value="{{ old('title', $designCategory->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="category-description-input" class="form-label">Description</label>
                <textarea class="form-control @error('body') is-invalid @enderror" id="category-description-input" name="body"
                    cols="30" rows="10">{{ old('body', $designCategory->body) }}</textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="category-image-input" class="form-label">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="category-image-input"
                    name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-4">
                <button type="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
@endsection
