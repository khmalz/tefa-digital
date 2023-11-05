@extends('dashboard.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Printing Order's List</h4>
                            <div class="mt-4">
                                <table class="mb-0 table border" id="data-table-printing">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle">
                                            <th class="text-center">Order ID</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Order Date</th>
                                            <th class="text-center">Material</th>
                                            <th class="text-center">Scale</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($printings as $printing)
                                            <td>{{ $printing->order->ulid }}</td>
                                            <td>{{ $printing->order->name_customer }}</td>
                                            <td>{{ $printing->created_at->format('d F Y') }}</td>
                                            <td>{{ $printing->material }}</td>
                                            <td>{{ $printing->scale }}</td>
                                            @php
                                                $statusClass = '';
                                                if ($printing->order->status == 'cancel') {
                                                    $statusClass = 'danger';
                                                } elseif ($printing->order->status == 'pending') {
                                                    $statusClass = 'warning';
                                                } elseif ($printing->order->status == 'progress') {
                                                    $statusClass = 'info';
                                                } else {
                                                    $statusClass = 'success';
                                                }
                                            @endphp
                                            <td><span
                                                    class="badge bg-{{ $statusClass }}">{{ $printing->order->status }}</span>
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
                                                            href="{{ route('print-pdf.printing', $printing->order->ulid) }}">Export
                                                            to
                                                            PDF</a>
                                                        <button class="dropdown-item" type="button"
                                                            data-coreui-toggle="modal" data-coreui-target="#printingModal"
                                                            data-order-status="{{ $printing->order->status }}"
                                                            data-order-name="{{ $printing->order->name_customer }}"
                                                            id="changeStatus"
                                                            onclick="changeStatusOrder(this, {{ $printing->id }})">Ganti
                                                            Status</button>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                        <div class="modal fade" id="printingModal" tabindex="-1"
                                            aria-labelledby="printingModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header justify-content-center">
                                                        <h5 class="modal-title" id="printingModalLabel">Ganti Status</h5>
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
            $('#printingForm').submit();
        }

        function changeStatusOrder(el, orderId) {
            let orderTitle = $(el).data('order-title');
            let orderStatus = $(el).data('order-status');
            let orderName = $(el).data('order-name');

            // Membuat template literal untuk isi modal
            let modalBody = `
                <p>ID: ${orderId}</p>
                <p class="text-capitalize">Jenis Order: Printing</p>
                <p>Nama: ${orderName}
                <form id="printingForm" method="POST">
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
            $('#printingModal .modal-content .modal-body').html(modalBody);

            // Menyiapkan form untuk pengiriman PUT request
            const editRoute = "{{ route('printing.update', ':order_id') }}";
            const actionUrl = editRoute.replace(':order_id', orderId);
            $('#printingForm').attr('action', actionUrl);

            // Menampilkan modal
            $('#printingModal').modal('show');
        }

        $(function() {
            $("#data-table-printing").DataTable({
                dom: 'Bfrtip',
                paging: true,
                pageLength: 10,
                stateSave: true,
                stateDuration: 60 * 5,
                order: [
                    [5, 'asc'],
                    [2, "asc"]
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
