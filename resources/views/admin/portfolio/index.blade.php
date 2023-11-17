@extends('dashboard.layouts.main')

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
                            <ul class="nav nav-pills mb-3 gap-1" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active navstabs" id="pills-design-tab" data-coreui-toggle="pill"
                                        data-coreui-target="#pills-design" type="button" role="tab"
                                        aria-controls="pills-design" aria-selected="true">Design</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link navstabs" id="pills-photography-tab" data-coreui-toggle="pill"
                                        data-coreui-target="#pills-photography" type="button" role="tab"
                                        aria-controls="pills-photography" aria-selected="false">Photography</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link navstabs" id="pills-videography-tab" data-coreui-toggle="pill"
                                        data-coreui-target="#pills-videography" type="button" role="tab"
                                        aria-controls="pills-videography" aria-selected="false">Videography</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link navstabs" id="pills-printing-tab" data-coreui-toggle="pill"
                                        data-coreui-target="#pills-printing" type="button" role="tab"
                                        aria-controls="pills-printing" aria-selected="false">Printing</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                @foreach ($categories as $category)
                                    <div class="tab-pane fade @if ($loop->first) show active @endif"
                                        id="pills-{{ $category }}" role="tabpanel"
                                        aria-labelledby="pills-{{ $category }}-tab" data-category="{{ $category }}"
                                        tabindex="0">
                                        <div class="table-responsive mt-4">
                                            <table class="mb-0 table border" id="portfolio-{{ $category }}">
                                                <thead class="table-light fw-semibold">
                                                    <tr class="align-middle">
                                                        <th class="text-center">Image</th>
                                                        <th class="w-100 text-center" style="max-width: 40% !important;">
                                                            Title
                                                        </th>
                                                        <th class="text-center" style="max-width: 40% !important;">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @forelse ($portfolios->where('category', $category) as $portfolio)
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
                                                                        <form
                                                                            action="{{ route('portfolio.destroy', $portfolio->id) }}"
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
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
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
        $(document).ready(function() {
            let categories = [];
            $('[data-category]').each(function() {
                categories.push($(this).data('category'));
            });

            categories.forEach(function(category) {
                $('#portfolio-' + category).DataTable({
                    paging: true,
                    pageLength: 10,
                    stateSave: true,
                    stateDuration: 60 * 5,
                    language: {
                        infoEmpty: "No entries to show",
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                    },
                    responsive: true
                });
            });
        });
    </script>
@endpush
