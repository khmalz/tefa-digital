@extends('admin.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Tefa Digital Dashboard</h4>
                            <div class="table-responsive mt-4">
                                <table class="mb-0 table border" id="data-table">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle">
                                            <th>User</th>
                                            <th class="text-center">Country</th>
                                            <th>Usage</th>
                                            <th class="text-center">Payment Method</th>
                                            <th>Activity</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Yiorgos Avraamu</div>
                                                <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan
                                                    1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">50%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020
                                                            - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use
                                                        xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard') }}">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">10 sec ago</div>
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
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Avram Tarasios</div>
                                                <div class="small text-medium-emphasis"><span>Recurring</span> |
                                                    Registered:
                                                    Jan 1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-br"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">10%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020
                                                            - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%"
                                                        aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-visa">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">5 minutes ago</div>
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
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Quintin Ed</div>
                                                <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan
                                                    1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-in"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">74%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020 - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 74%" aria-valuenow="74" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-stripe">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">1 hour ago</div>
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
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Enéas Kwadwo</div>
                                                <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan
                                                    1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-fr"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">98%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020 - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 98%" aria-valuenow="98" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">Last month</div>
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
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Agapetus Tadeáš</div>
                                                <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan
                                                    1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-es"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">22%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020 - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 22%" aria-valuenow="22" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-apple-pay">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">Last week</div>
                                            </td>
                                            <td>
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-transparent p-0" type="button"
                                                        data-coreui-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                                            </use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Friderik Dávid</div>
                                                <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan
                                                    1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-pl"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">43%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020 - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 43%" aria-valuenow="43" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-amex">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">Yesterday</div>
                                            </td>
                                            <td>
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-transparent p-0" type="button"
                                                        data-coreui-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                                            </use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Enéas Kwadwo</div>
                                                <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan
                                                    1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-fr"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">98%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020 - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 98%" aria-valuenow="98" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">Last month</div>
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
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Agapetus Tadeáš</div>
                                                <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan
                                                    1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-es"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">22%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020 - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 22%" aria-valuenow="22" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-apple-pay">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">Last week</div>
                                            </td>
                                            <td>
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-transparent p-0" type="button"
                                                        data-coreui-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                                            </use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td>
                                                <div>Friderik Dávid</div>
                                                <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan
                                                    1, 2020</div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-pl"></use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="float-start">
                                                        <div class="fw-semibold">43%</div>
                                                    </div>
                                                    <div class="float-end"><small class="text-medium-emphasis">Jun 11,
                                                            2020 - Jul 10, 2020</small></div>
                                                </div>
                                                <div class="progress progress-thin">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 43%" aria-valuenow="43" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <svg class="icon icon-xl">
                                                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-amex">
                                                    </use>
                                                </svg>
                                            </td>
                                            <td>
                                                <div class="small text-medium-emphasis">Last login</div>
                                                <div class="fw-semibold">Yesterday</div>
                                            </td>
                                            <td>
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-transparent p-0" type="button"
                                                        data-coreui-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                                            </use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                            href="#">Info</a><a class="dropdown-item"
                                                            href="#">Edit</a><a class="dropdown-item text-danger"
                                                            href="#">Delete</a></div>
                                                </div>
                                            </td>
                                        </tr>
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
