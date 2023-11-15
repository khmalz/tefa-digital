 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center header-transparent">
     <div class="d-flex align-items-center justify-content-between container">
         <div class="logo">
             <h1><a href="/">Tefa Digital</a></h1>
         </div>

         <nav id="navbar" class="navbar">
             <ul>
                 <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                 <li><a class="nav-link scrollto" href="#about">About</a></li>
                 <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
                 @auth
                     <li class="dropdown"><a href="#"><span>Welcome, {{ auth()->user()->name }}</span> <i
                                 class="bi bi-chevron-down"></i></a>
                         <ul>
                             @role('clent')
                                 <li><a href="{{ route('user.profile.index') }}">{{ auth()->user()->email }}</a></li>
                                 <li><a href="{{ route('user.order.list') }}">List Order</a></li>
                             @else
                                 <li><a href="{{ route('dashboard') }}">{{ auth()->user()->email }}</a></li>
                             @endrole
                             <li>
                                 <form action="{{ route('logout') }}" method="post" class="d-inline">
                                     @csrf
                                     <a href="#"
                                         onclick="return confirm('Yakin ? ') ? this.parentElement.submit() : null">Log
                                         Out</a>
                                 </form>
                             </li>
                         </ul>
                     </li>
                 @else
                     <li><a class="nav-link" href="{{ route('login.index') }}">Login</a></li>
                 @endauth
             </ul>
             <i class="bi bi-list mobile-nav-toggle"></i>
         </nav>
         <!-- .navbar -->
     </div>
 </header>
 <!-- End Header -->
