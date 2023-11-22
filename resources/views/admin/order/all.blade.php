@extends('admin.dashboard.layouts.main')

@push('styles')
    @vite('resources/js/datatable.js')
@endpush

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Order's List</h4>
                                <form method="get">
                                    @if (request('type') != 'cancel')
                                        <input type="hidden" name="type" value="cancel">
                                        <button type="submit" class="btn btn-danger btn-sm px-3 py-2 text-white">Cancel
                                            Order</button>
                                    @else
                                        <a href="{{ route('order.all') }}" class="btn btn-info btn-sm px-3 py-2 text-white">
                                            Reset</a>
                                    @endif
                                </form>
                            </div>
                            <div class="mt-4">
                                <form method="GET" id="orderForm">
                                    @if (request('type') == 'cancel')
                                        <input type="hidden" name="type" value="cancel">
                                    @endif

                                    <input type="hidden" name="date" value="{{ request('date', 1) }}">

                                    <div class="d-flex justify-content-between flex-wrap"
                                        style="column-gap: 10px; row-gap: 5px">
                                        <div class="col-xl-11 col-8">
                                            <select class="form-select" name="category" aria-label="Select Category Order">
                                                <option value="all"
                                                    {{ request('category') == 'all' ? 'selected' : null }}>All
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
                                <table class="mb-0 table border" id="data-table-all"
                                    data-default-length="{{ $defaultLength }}">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle">
                                            <th class="text-center">Order ID</th>
                                            <th class="text-center">Order</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Order Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->ulid }}</td>
                                                <td class="text-center">
                                                    {{ $order->orderable->order_title }}
                                                </td>
                                                <td>{{ $order->name_customer }}</td>
                                                <td>{{ $order->created_at->format('d F Y') }}</td>
                                                @php
                                                    $statusClass = '';
                                                    if ($order->status == 'cancel') {
                                                        $statusClass = 'danger';
                                                    } elseif ($order->status == 'pending') {
                                                        $statusClass = 'warning';
                                                    } elseif ($order->status == 'progress') {
                                                        $statusClass = 'info';
                                                    } else {
                                                        $statusClass = 'success';
                                                    }
                                                @endphp
                                                <td><span class="badge bg-{{ $statusClass }}">{{ $order->status }}</span>
                                                </td>
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
                                                            @php
                                                                $orderableType = strtolower(class_basename($order->orderable_type));
                                                            @endphp

                                                            <a class="dropdown-item" target="_blank"
                                                                href="{{ route("print-pdf.$orderableType", $order->ulid) }}">Export
                                                                to PDF</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('order.show', $order->ulid) }}">Detail</a>
                                                            <button class="dropdown-item" type="button"
                                                                data-coreui-toggle="modal" data-coreui-target="#orderModal"
                                                                data-order-title="{{ $order->orderable->order_title }}"
                                                                data-order-status="{{ $order->status }}"
                                                                data-order-name="{{ $order->name_customer }}"
                                                                data-order-category="{{ $orderableType }}"
                                                                id="changeStatus"
                                                                onclick="changeStatusOrder(this, '{{ $order->ulid }}')">Ganti
                                                                Status</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div class="modal fade" id="orderModal" tabindex="-1"
                                            aria-labelledby="orderModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header justify-content-center">
                                                        <h5 class="modal-title" id="orderModalLabel">Ganti Status</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- Konten form yang akan diisi oleh JavaScript --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" onclick="submitStatusOrderForm()"
                                                            class="btn btn-primary">Save
                                                            change</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                                <div>
                                    {{ $orders->appends(['date' => request('date'), 'category' => request('category')])->links() }}
                                </div>
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
        function submitStatusOrderForm() {
            $('#orderStatusForm').submit();
        }

        function changeStatusOrder(el, orderId) {
            const orderTitle = $(el).data('order-title');
            const orderStatus = $(el).data('order-status');
            const orderName = $(el).data('order-name');
            const orderCategory = $(el).data('order-category');

            // Membuat template literal untuk isi modal
            const modalBody = `
                <p>ID: ${orderId}</p>
                <p class="text-capitalize">Jenis Order: ${orderTitle}</p>
                <p>Nama: ${orderName}
                <form id="orderStatusForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="statusSelect">Status:</label>
                        <select class="form-control" id="statusSelect" name="status">
                            <option ${orderStatus === 'pending' ? 'selected' : ''} value="pending">Pending</option>
                            <option ${orderStatus === 'progress' ? 'selected' : ''} value="progress">Progress</option>
                            <option ${orderStatus === 'completed' ? 'selected' : ''} value="completed">Completed</option>
                        </select>
                    </div>
                </form>
            `;

            // Mengganti konten modal dengan template literal
            $('#orderModal .modal-content .modal-body').html(modalBody);

            // Menyiapkan form untuk pengiriman PUT request
            const editRoute = "{{ route('order.update', ':order_id') }}";
            const actionUrl = editRoute.replace(':order_id', orderId);
            $('#orderStatusForm').attr('action', actionUrl);

            // Menampilkan modal
            $('#orderModal').modal('show');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const defaultLength = $("#data-table-all").data('default-length');

            const urlParams = new URLSearchParams(window.location.search);
            generateDataTable('data-table-all', defaultLength);

            const dateParam = urlParams.get('date');

            const selectElement = $('#data-table-all_length select');

            switch (dateParam) {
                case "week":
                    selectElement.val('7');
                    break;
                case "month":
                    selectElement.val('30');
                    break;
                case "year":
                    selectElement.val('100');
                    break;
                case "all":
                    selectElement.val('500');
                    break;
                default:
                    // Jika parameter tidak sesuai, atur ke nilai default
                    selectElement.val(defaultLength);
                    break;
            }

            // Nonaktifkan fungsi kontrol panjang
            $('#data-table-all_length select').off('change')

            $("#data-table-all_length select").on("change", function() {
                const selectedValue = parseInt($('#data-table-all_length select').val());
                const formDate = $('#orderForm');

                switch (selectedValue) {
                    case 7:
                        formDate.find('input[name="date"]').val("week");
                        break;
                    case 30:
                        formDate.find('input[name="date"]').val("month");
                        break;
                    case 100:
                        formDate.find('input[name="date"]').val("year");
                        break;
                    case 500:
                        formDate.find('input[name="date"]').val("all");
                        break;
                    default:
                        formDate.find('input[name="date"]').val("today");
                        break;
                }
            })
        });

        function generateDataTable(id, length) {
            $(`#${id}`).DataTable({
                dom: '<"mt-2"l><frBt>',
                paging: true,
                responsive: true,
                lengthMenu: [
                    [length, 7, 30, 100, 500],
                    ["Today", "This Week", "This Month", "This Year", "All"]
                ],
                pageLength: length,
                order: [
                    [4, "asc"],
                    [3, 'asc']
                ],
                buttons: [{
                        extend: "copy",
                        exportOptions: {
                            columns: ":not(:last-child)" // Mengabaikan kolom terakhir
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: ":not(:last-child)" // Mengabaikan kolom terakhir
                        }
                    },
                    {
                        extend: "pdf",
                        exportOptions: {
                            columns: ":not(:last-child)" // Mengabaikan kolom terakhir
                        },
                        customize: function(doc) {
                            // Mengatur properti alignment menjadi center untuk seluruh teks dalam tabel
                            doc.content[1].table.body.forEach(function(row) {
                                row.forEach(function(cell) {
                                    cell.alignment = 'center';
                                });
                            });

                            // Mengatur lebar kolom agar semua kolom terlihat dalam satu halaman PDF
                            let colWidth = 100 / doc.content[1].table.body[0].length + '%';

                            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length)
                                .fill(colWidth);

                            // Menambahkan margin ke sisi kiri dan kanan
                            doc.pageMargins = [10, 10, 10, 10];
                        },
                    },
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
        }
    </script>
@endpush
