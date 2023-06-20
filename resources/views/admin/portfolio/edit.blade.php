@extends('admin.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Edit Portfolio Image </h4>
                            <form action="{{ route('portfolio.update', $portfolio->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="Category" class="form-label">Category</label>
                                    <select class="form-select text-capitalize @error('category') is-invalid @enderror"
                                        aria-label="Select Category" name="category">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option
                                                {{ old('category', $portfolio->category) == $category ? 'selected' : '' }}
                                                value="{{ $category }}">{{ $category }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $portfolio->title) }}" id="Title"
                                        aria-describedby="title" name="title">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Image" class="form-label">Image</label>
                                    @if ($portfolio->image !== 'placeholder.jpg')
                                        <img src="{{ asset('assets/img/' . $portfolio->image) }}"
                                            class="img-preview d-block img-fluid col-md-8 col-lg-4 mb-3 rounded"
                                            alt="{{ $portfolio->title }}">
                                    @endif
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image" aria-describedby="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage() {
            const image = document.querySelector("#image")
            const imgPreview = document.querySelector(".img-preview")
            imgPreview.classList.remove("d-none");
            imgPreview.classList.add("d-block");
            imgPreview.classList.add("mb-3");
            const [file] = image.files
            if (file) {
                const blob = URL.createObjectURL(file)
                imgPreview.src = blob
            }
        }
    </script>
@endpush
