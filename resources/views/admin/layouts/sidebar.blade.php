<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <a href="/" class="text-decoration-none text-white">
            <h4>Tefa Digital</h4>
        </a>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                Dashboard</a>
        </li>
        <li class="nav-title">Orderan</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('order.index') }}">
                List</a>
        </li>
        <li class="nav-title">Tampilan</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('portfolio.index') }}">
                Portfolio</a>
            <a class="nav-link" href="{{ route('contact.index') }}">
                Contact Us</a>
        </li>
        <li class="nav-title">Jasa</li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                Design</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('design-category.index') }}">Category</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('design-plan.index') }}">Plan</a></li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                Photography</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('photography-category.index') }}">Category</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('photography-plan.index') }}">Plan</a></li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                Videography</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('videography-category.index') }}">Category</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('videography-plan.index') }}">Plan</a></li>
            </ul>
        </li>
        {{-- <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button> --}}
</div>
