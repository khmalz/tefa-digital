@extends('admin.layouts.main')

@push('styles')
    <style>
        input.deleted,
        textarea.deleted {
            background-color: #fac2c2;
        }
    </style>
@endpush

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
                                        <textarea class="form-control @error('edit.*.description') is-invalid @enderror" rows="3">{{ $feature->description }}</textarea>
                                        @error('edit.*.description')
                                            is-invalid
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-md-center flex-column mt-md-0 mt-3 gap-2">
                                <div>
                                    <input type="checkbox" hidden id="deleted-{{ $feature->id }}" class="delete-feature">
                                    <label for="deleted-{{ $feature->id }}"
                                        class="btn btn-danger text-white">Delete</label>
                                </div>
                                <div><button type="button" class="btn btn-primary edit-feature"
                                        data-feature-id="{{ $feature->id }}">Edit</button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex align-items-center justify-content-between mt-3" id="button-bottom">
                        <button type="button" class="btn btn-success create-feature text-white text-white">Add</button>
                        <button type="submit" class="btn btn-info save-changes text-white text-white">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-feature').on('change', function() {
                var parent = $(this).closest('.form-group');
                var id = parent.data('feature-id');
                var deletedInput = $(`#deletedID-${id}`);

                if (!this.checked) { // checkbox is unchecked
                    if (deletedInput.length) {
                        deletedInput.remove();
                        parent.find('input[type="text"], textarea').removeClass(
                            'border-danger text-muted deleted');
                    }
                } else { // checkbox is checked
                    if (!deletedInput.length) {
                        var input =
                            `<input type="text" name="delete[]" id="deletedID-${id}" class="deleted-id" value="${id}" readonly>`;
                        $('#deleted-id-input').append(input);
                        parent.find('input[type="text"], textarea').addClass(
                            'border-danger text-muted deleted');
                    }
                }
            });

            $('.edit-feature').on('click', function() {
                var parent = $(this).closest('.form-group');
                var textInput = parent.find('input[type="text"]');
                var descTextarea = parent.find('textarea');

                textInput.prop('readonly', false).focus().attr('name', 'edit[' + parent.data('feature-id') +
                    '][text]');
                descTextarea.prop('readonly', false).attr('name', 'edit[' + parent.data('feature-id') +
                    '][description]');
            });

            $('.create-feature').click(function() {
                var newFormGroup = `
                    <div class="form-group d-md-flex align-items-center gap-3" data-feature-id="{{ $feature->id }}">
                        <div class="d-flex flex-column w-100 mt-3 flex-wrap gap-3">
                            <input type="hidden" name="id[]" class="form-control" value="{{ $plan->id }}">
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
                                    <textarea class="form-control" name="description[] @error('description.*') is-invalid @enderror" rows="3"></textarea>
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
