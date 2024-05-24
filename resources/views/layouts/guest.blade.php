<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/dashboard/material-dashboard.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/boot') }}"> --}}
</head>

{{-- <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <!-- /.login-logo -->
        <div class="card"> --}}
            @yield('content')
        {{-- </div>
    </div>
</body> --}}
    <!-- /.login-box -->
    <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-12 col-md-6 my-auto">
                    <div class="copyright text-center text-sm text-white text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        {{-- , made with <i class="fa fa-heart" aria-hidden="true"></i> by --}}
                        <a href="" class="font-weight-bold text-white"
                            target="_blank">ANKAVI TEAM</a> Kelompok 5
                        MSIB Fullstack #4
                    </div>
                </div>
                {{-- <div class="col-12 col-md-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-white"
                                target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-white"
                                target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-white"
                                target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white"
                                target="_blank">License</a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </footer>

    @vite('resources/js/app.js')
    {{-- Material JS --}}
    
    <script src="{{ asset('frontend/js/dashboard/material-dashboard.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    {{-- <script src="{{ asset('js/adminlte.min.js') }}" defer></script> --}}
</body>

</html>