@extends('admin.dashboard.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4>Portfolio Image</h4>
                                <a href="{{ route('portfolio.create') }}" class="btn btn-success text-light">Create</a>
                            </div>
                            <form method="GET" id="orderForm" class="my-3">
                                <div class="d-flex justify-content-between flex-wrap"
                                    style="column-gap: 10px; row-gap: 5px">
                                    <div class="col-xl-11 col-8">
                                        <select class="form-select" name="category" aria-label="Select Category Order">
                                            <option value="all" {{ request('category') == 'all' ? 'selected' : null }}>
                                                All
                                                Category</option>
                                            <option value="design"
                                                {{ request('category') == 'design' ? 'selected' : null }}>
                                                Design</option>
                                            <option value="photography"
                                                {{ request('category') == 'photography' ? 'selected' : null }}>
                                                Photography
                                            </option>
                                            <option value="videography"
                                                {{ request('category') == 'videography' ? 'selected' : null }}>
                                                Videography
                                            </option>
                                            <option value="printing"
                                                {{ request('category') == 'printing' ? 'selected' : null }}>Printing
                                            </option>
                                        </select>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary btn-sm px-3 py-2">Filter</button>
                                    </div>
                                </div>
                            </form>

                            <div class="mt-4">
                                <table class="mb-0 table border" id="portfolio-table">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle">
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($portfolios as $portfolio)
                                            <tr>
                                                @if ($portfolio->image !== 'placeholder.jpg')
                                                    <td>
                                                        <img class="portfolio-img"
                                                            src="{{ asset('assets/img/' . $portfolio->image) }}"
                                                            alt="{{ $portfolio->title }}">
                                                    </td>
                                                @else
                                                    <td>
                                                        <img class="portfolio-img"
                                                            src="{{ asset('assets/img/category/placeholder.jpg') }}"
                                                            alt="{{ $portfolio->title }}">
                                                    </td>
                                                @endif
                                                <td>{{ $portfolio->title }}</td>
                                                <td class="text-capitalize">{{ $portfolio->category }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg class="icon">
                                                                <use
                                                                    xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('portfolio.edit', $portfolio->id) }}">Edit</a>
                                                            <form action="{{ route('portfolio.destroy', $portfolio->id) }}"
                                                                method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    onclick="return confirm('Yakin untuk menghapusnya?')"
                                                                    class="dropdown-item text-danger">
                                                                    Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $("#portfolio-table").DataTable({
                dom: 'frtp',
                paging: true,
                responsive: true,
                pageLength: 10,
                stateSave: true,
                stateDuration: 60 * 2,
                order: [
                    [1, 'asc'],
                ],
                language: {
                    infoEmpty: "No entries to show",
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                },
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": -1,
                }]
            });
        });
    </script>
@endpush
