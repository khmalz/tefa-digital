<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="Tefa Digital - Dashboard to manage service orders" />
    <meta name="keyword" content="Tefa Digital, Service, Design, Printing, Videoghraphy, Fotoghraphy" />
    <title>Login | {{ config('app.name') }}</title>
    <!-- Main styles for this application-->
    <link href="{{ asset('assets/admin/css/style.min.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="bg-light min-vh-100 d-flex align-items-center flex-row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mx-4 mb-4">
                        <div class="card-body p-4">
                            <div>
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>
                            </div>
                            <form action="{{ route('login.store') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use
                                                xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}">
                                            </use>
                                        </svg></span>
                                    <input class="form-control" name="email" type="text" placeholder="Email" />
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use
                                                xlink:href="{{ asset('assets/admin/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}">
                                            </use>
                                        </svg></span>
                                    <input class="form-control" name="password" type="password"
                                        placeholder="Password" />
                                </div>
                                <button class="btn btn-block btn-info text-white" type="submit">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
