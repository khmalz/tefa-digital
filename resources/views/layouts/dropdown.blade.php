@auth
    <li class="dropdown"><a href="#"><span>Welcome, {{ auth()->user()->name }}</span> <i
                class="bi bi-chevron-down"></i></a>
        <ul>
            @role('client')
                <li><a href="{{ route('user.profile.index') }}">{{ auth()->user()->email }}</a></li>
                <li><a href="{{ route('user.order.list') }}">List Order</a></li>
                <li><a href="{{ route('user.order.list') }}">Transaction History</a></li>
            @else
                <li><a href="{{ route('dashboard') }}">{{ auth()->user()->email }}</a></li>
            @endrole
            <li>
                <form action="{{ route('logout') }}" method="post" class="d-inline">
                    @csrf
                    <a href="#" onclick="return confirm('Yakin ? ') ? this.parentElement.submit() : null">Log
                        Out</a>
                </form>
            </li>
        </ul>
    </li>
@else
    <li><a class="nav-link" href="{{ route('login.index') }}">Login</a></li>
@endauth
