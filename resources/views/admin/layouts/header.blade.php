<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg></button><a class="header-brand d-md-none" href="#">
            <ul class="header-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-md"><img class="avatar-img"
                                src="{{ asset('assets/admin/img/avatars/person.png') }}" alt="user@email.com" /></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        <div class="dropdown-header bg-light py-2">
                            <div class="fw-semibold">Account</div>
                        </div>
                        <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use
                                    xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-task') }}">
                                </use>
                            </svg>
                            Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item"
                            href="#">
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" id="logout" method="POST">
                                @csrf
                                <button type="submit" class="d-none"><span>Logout</span></button>
                            </form>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); confirm('Yakin?') && document.getElementById('logout').submit();">
                                <svg class="icon me-2">
                                    <use
                                        xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                                    </use>
                                </svg>
                                Logout</a>
                    </div>
                </li>
            </ul>
    </div>
</header>
