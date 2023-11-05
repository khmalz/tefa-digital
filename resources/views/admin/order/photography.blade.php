@extends('dashboard.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Photography Order's List</h4>
                            <div class="mt-4">
                                <table class="mb-0 table border" id="data-table-photography">
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
                                        @foreach ($photographies as $photography)
                                            <td>{{ $photography->order->ulid }}</td>
                                            <td>{{ $photography->category->title }}</td>
                                            <td>{{ $photography->order->name_customer }}</td>
                                            <td>{{ $photography->created_at->format('d F Y') }}</td>
                                            @php
                                                $statusClass = '';
                                                if ($photography->order->status == 'cancel') {
                                                    $statusClass = 'danger';
                                                } elseif ($photography->order->status == 'pending') {
                                                    $statusClass = 'warning';
                                                } elseif ($photography->order->status == 'progress') {
                                                    $statusClass = 'info';
                                                } else {
                                                    $statusClass = 'success';
                                                }
                                            @endphp
                                            <td><span
                                                    class="badge bg-{{ $statusClass }}">{{ $photography->order->status }}</span>
                                            </td>
                                            <td>{{ $photography->price }}</td>
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
                                                            href="{{ route('print-pdf.photography', $photography->order->ulid) }}">Export
                                                            to
                                                            PDF</a>
                                                        <button class="dropdown-item" type="button"
                                                            data-coreui-toggle="modal"
                                                            data-coreui-target="#photographyModal"
                                                            data-order-title="{{ $photography->category->title }}"
                                                            data-order-status="{{ $photography->order->status }}"
                                                            data-order-name="{{ $photography->order->name_customer }}"
                                                            id="changeStatus"
                                                            onclick="changeStatusOrder(this, {{ $photography->id }})">Ganti
                                                            Status</button>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                        <div class="modal fade" id="photographyModal" tabindex="-1"
                                            aria-labelledby="photographyModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header justify-content-center">
                                                        <h5 class="modal-title" id="photographyModalLabel">Ganti Status</h5>
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
            $('#photographyForm').submit();
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
                <form id="photographyForm" method="POST">
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
            $('#photographyModal .modal-content .modal-body').html(modalBody);

            // Menyiapkan form untuk pengiriman PUT request
            const editRoute = "{{ route('photography.update', ':order_id') }}";
            const actionUrl = editRoute.replace(':order_id', orderId);
            $('#photographyForm').attr('action', actionUrl);

            // Menampilkan modal
            $('#photographyModal').modal('show');
        }

        $(function() {
            $("#data-table-photography").DataTable({
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
