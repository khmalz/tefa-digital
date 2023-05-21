@extends('admin.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>List Order</h4>
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
                                <div class="tab-pane fade show active" id="pills-design" role="tabpanel"
                                    aria-labelledby="pills-design-tab" tabindex="0">
                                    <div class="table-responsive mt-4">
                                        <table class="mb-0 table border" id="data-table-design">
                                            <thead class="table-light fw-semibold">
                                                <tr class="align-middle">
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-photography" role="tabpanel"
                                    aria-labelledby="pills-photography-tab" tabindex="0">
                                    <div class="table-responsive mt-4">
                                        <table class="mb-0 table border" id="data-table-photography">
                                            <thead class="table-light fw-semibold">
                                                <tr class="align-middle">
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-videography" role="tabpanel"
                                    aria-labelledby="pills-videography-tab" tabindex="0">
                                    <div class="table-responsive mt-4">
                                        <table class="mb-0 table border" id="data-table-videography">
                                            <thead class="table-light fw-semibold">
                                                <tr class="align-middle">
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-printing" role="tabpanel"
                                    aria-labelledby="pills-printing-tab" tabindex="0">
                                    <div class="table-responsive mt-4">
                                        <table class="mb-0 table border" id="data-table-printing">
                                            <thead class="table-light fw-semibold">
                                                <tr class="align-middle">
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
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
        const generateDropdownHtml = (orderId) => {
            return `
                <div class="dropdown">
                    <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon">
                        <use xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                        </svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="detail/${orderId}">Detail</a>
                        <a class="dropdown-item" href="detail/${orderId}">Ganti Status</a>
                    </div>
                </div>
            `;
        }

        const api = {
            design: "http://tefa-digital.test/api/design",
            photography: "http://tefa-digital.test/api/photography",
            videography: "http://tefa-digital.test/api/videography",
            printing: "http://tefa-digital.test/api/printing"
        }

        let columns = [{
                "data": "order_id",
                "title": "Order ID"
            },
            {
                "data": "order",
                "title": "Order"
            },
            {
                "data": "nama",
                "title": "Nama Customer"
            },
            {
                "data": "date",
                "title": "Tanggal"
            },
            {
                "data": "status",
                "title": "Status"
            },
            {
                "data": "price",
                "title": "Price"
            },
            {
                "data": null,
                "title": "Action",
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return generateDropdownHtml(row.order_id);
                }
            }
        ];

        let columnsPR = [{
                "data": "order_id",
                "title": "Order ID"
            },
            {
                "data": "nama",
                "title": "Nama Customer"
            },
            {
                "data": "date",
                "title": "Tanggal"
            },
            {
                "data": "material",
                "title": "Material"
            },
            {
                "data": "scale",
                "title": "Scale"
            },
            {
                "data": "status",
                "title": "Status"
            },
            {
                "data": null,
                "title": "Action",
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return generateDropdownHtml(row.order_id);
                }
            }
        ];

        function createDataTable(tabId, url, columns) {
            $(tabId).DataTable({
                ajax: {
                    url: url,
                    dataSrc: "data",
                },
                paging: true,
                pageLength: 10,
                stateSave: true,
                stateDuration: 60 * 5,
                columns,
                order: [
                    tabId === "#data-table-printing" ? [2, "asc"] : [3, "asc"]
                ],
                language: {
                    infoEmpty: "No entries to show",
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                },
            });
        }

        // Fungsi untuk menghancurkan data table
        function destroyDataTable(tabId) {
            $(tabId).DataTable().destroy();
        }

        $(document).ready(function() {
            // Mendapatkan session active_tab
            const activeTab = sessionStorage.getItem("active_tab");

            activeTab ? $(activeTab).click() : createDataTable('#data-table-design', api.design, columns);

            const tabs = [{
                    id: "#pills-design-tab",
                    tableId: "#data-table-design",
                    url: api.design,
                    columns,
                },
                {
                    id: "#pills-photography-tab",
                    tableId: "#data-table-photography",
                    url: api.photography,
                    columns,
                },
                {
                    id: "#pills-videography-tab",
                    tableId: "#data-table-videography",
                    url: api.videography,
                    columns,
                },
                {
                    id: "#pills-printing-tab",
                    tableId: "#data-table-printing",
                    url: api.printing,
                    columns: columnsPR,
                },
            ];

            const clickTab = (id, tableId, url, columns) => {
                // Menyimpan session active_tab pada saat tab diklik
                sessionStorage.setItem('active_tab', id);

                // Membuat data table untuk tab yang aktif
                createDataTable(tableId, url, columns);

                // Menghancurkan data table pada tab yang tidak aktif
                tabs.filter((tab) => tab.id !== id).forEach(({
                    tableId
                }) => destroyDataTable(tableId));
            };

            tabs.forEach(({
                id,
                tableId,
                url,
                columns
            }) => {
                $(id).on("click", function(e) {
                    clickTab(id, tableId, url, columns);
                });

                activeTab === id ? clickTab(id, tableId, url, columns) : destroyDataTable(tableId);
            });
        });
    </script>
@endpush
