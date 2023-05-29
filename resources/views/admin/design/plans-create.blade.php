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

        <form action="{{ route('design-plan.create') }}" method="post">
            @csrf
            <div class="row mb-5">
                <div class="col-md-10">
                    <div class="form-group d-flex flex-column mt-3 w-full gap-3">
                        <div class="row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title_plan">
                            </div>
                        </div>
                        <div class="row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>
                        <div class="row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description_plan" rows="3"></textarea>
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
                                    <input type="text" class="form-control" name="text[]" id="text">
                                </div>
                            </div>
                            <div class="row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col">
                                    <textarea class="form-control" rows="3" id="description" name="description[]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3" id="button-bottom">
                        <button type="button" class="btn btn-success create-feature">Add</button>
                        <button type="submit" class="btn btn-info save-changes">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.create-feature').click(function() {
                var newFormGroup = `
            <div class="form-group d-flex align-items-center gap-3">
                <div class="d-flex flex-column w-100 mt-3 flex-wrap gap-3">
                    <div class="row gap-3">
                        <label for="text" class="col-sm-2 col-form-label">Text</label>
                        <div class="col">
                            <input type="text" name="text[]" class="form-control" id="text">
                        </div>
                    </div>
                    <div class="row gap-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col">
                            <textarea class="form-control" name="description[]" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-danger delete-feature-new">Delete</button>
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
