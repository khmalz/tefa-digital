@extends('admin.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Design Order's List</h4>
                            <div class="mt-4">
                                <table class="mb-0 table border" id="data-table-design">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle">
                                            <th class="text-center">Order ID</th>
                                            <th class="text-center">Order</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Order Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($designs as $design)
                                            <tr>
                                                <td>{{ $design->order->ulid }}</td>
                                                <td>{{ $design->category->title }}</td>
                                                <td>{{ $design->order->name_customer }}</td>
                                                <td>{{ $design->created_at->format('d F Y') }}</td>
                                                @php
                                                    $statusClass = '';
                                                    if ($design->order->status == 'cancel') {
                                                        $statusClass = 'danger';
                                                    } elseif ($design->order->status == 'pending') {
                                                        $statusClass = 'warning';
                                                    } elseif ($design->order->status == 'progress') {
                                                        $statusClass = 'info';
                                                    } else {
                                                        $statusClass = 'success';
                                                    }
                                                @endphp
                                                <td><span
                                                        class="badge bg-{{ $statusClass }}">{{ $design->order->status }}</span>
                                                </td>
                                                <td>{{ $design->price }}</td>
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
                                                                href="{{ route('print-pdf.design', $design->order->ulid) }}">Export
                                                                to
                                                                PDF</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('order.show', $design->order->ulid) }}">Detail</a>
                                                            <button class="dropdown-item" type="button"
                                                                data-coreui-toggle="modal" data-coreui-target="#designModal"
                                                                data-order-title="{{ $design->category->title }}"
                                                                data-order-status="{{ $design->order->status }}"
                                                                data-order-name="{{ $design->order->name_customer }}"
                                                                id="changeStatus"
                                                                onclick="changeStatusOrder(this, {{ $design->id }})">Ganti
                                                                Status</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div class="modal fade" id="designModal" tabindex="-1"
                                            aria-labelledby="designModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header justify-content-center">
                                                        <h5 class="modal-title" id="designModalLabel">Ganti Status</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- Konten form yang akan diisi oleh JavaScript --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" onclick="submitForm()"
                                                            class="btn btn-primary">Save
                                                            change</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        function submitForm() {
            $('#designForm').submit();
        }

        function changeStatusOrder(el, orderId) {
            let orderTitle = $(el).data('order-title');
            let orderStatus = $(el).data('order-status');
            let orderName = $(el).data('order-name');

            // Membuat template literal untuk isi modal
            let modalBody = `
                <p>ID: ${orderId}</p>
                <p class="text-capitalize">Jenis Order: ${orderTitle}</p>
                <p>Nama: ${orderName}
                <form id="designForm" method="POST">
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
            $('#designModal .modal-content .modal-body').html(modalBody);

            // Menyiapkan form untuk pengiriman PUT request
            const editRoute = "{{ route('design.update', ':order_id') }}";
            const actionUrl = editRoute.replace(':order_id', orderId);
            $('#designForm').attr('action', actionUrl);

            // Menampilkan modal
            $('#designModal').modal('show');
        }

        $(function() {
            $("#data-table-design").DataTable({
                dom: 'Bfrtip',
                paging: true,
                pageLength: 10,
                stateSave: true,
                stateDuration: 60 * 5,
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
        })
    </script>
@endpush
