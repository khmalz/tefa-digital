@extends('admin.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Add Portfolio Image </h4>
                            <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="Category" class="form-label">Category</label>
                                    <select class="form-select text-capitalize" aria-label="Select Category"
                                        name="category">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ old('category') == $category ? 'selected' : '' }}
                                                value="{{ $category }}">{{ $category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Title" class="form-label">Title</label>
                                    <input type="text" class="form-control" value="{{ old('title') }}" id="Title"
                                        aria-describedby="title" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="Image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="Image" name="path"
                                        aria-describedby="image">
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
