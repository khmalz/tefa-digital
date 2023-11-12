@extends('dashboard.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Order's List</h4>
                            <div class="mt-4">
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
                                                            <a class="dropdown-item" target="_blank"
                                                                href="{{ route('print-pdf.design', 1) }}">Export
                                                                to
                                                                PDF</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('order.show', 1) }}">Detail</a>
                                                            <button class="dropdown-item" type="button"
                                                                data-coreui-toggle="modal" data-coreui-target="#designModal"
                                                                id="changeStatus">Ganti
                                                                Status</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    <form method="get" id="dateForm">
                                        <input type="hidden" name="date" value="1">
                                    </form>
                                </div>
                                <div>
                                    {{ $orders->appends(['date' => request('date')])->links() }}
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
        document.addEventListener('DOMContentLoaded', function() {
            const defaultLength = $("#data-table-all").data('default-length');

            const urlParams = new URLSearchParams(window.location.search);
            generateDataTable('data-table-all', defaultLength);

            // Ambil nilai "date" dari URL
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
                default:
                    // Jika parameter tidak sesuai, atur ke nilai default
                    selectElement.val(defaultLength);
                    break;
            }

            // Nonaktifkan fungsi kontrol panjang
            $('#data-table-all_length select').off('change')

            $("#data-table-all_length select").on("change", function() {
                const selectedValue = parseInt($('#data-table-all_length select')
                    .val()); // Ambil nilai yang dipilih dan ubah menjadi integer
                const formDate = $('#dateForm');

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
                    default:
                        formDate.find('input[name="date"]').val("today");
                        break;
                }

                // Submit formulir setelah mengatur nilainya
                formDate.submit();
            })
        });

        function generateDataTable(id, length) {
            $(`#${id}`).DataTable({
                dom: 'Bflrt',
                paging: true,
                lengthMenu: [
                    [length, 7, 30, 100],
                    ["Today", "1 Week", "1 Month", "1 Year"]
                ],
                pageLength: length,
                // stateSave: true,
                // stateDuration: 60 * 5,
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
