@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: 86vh">
        <form action="">
            @csrf
            <label for="category-title-input" class="form-label">Title</label>
            <input class="form-control" id="category-title-input" type="text"><br>
            <label for="category-description-input" class="form-label">Description</label>
            <textarea class="form-control" name="" id="category-description-input" cols="30" rows="10"></textarea>
            <div class="mt-3">
                <label for="category-image-input" class="form-label">Image</label>
                <input class="form-control" type="file" id="category-image-input">
            </div>
            <div class="mt-4">
                <a href="" class="btn-submit">Save</a>
            </div>
        </form>

    </div>
@endsection
