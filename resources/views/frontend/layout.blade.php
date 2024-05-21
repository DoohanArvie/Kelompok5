<!DOCTYPE html>
<html lang="en">

<head>
    <title>CarRental &mdash; Free Website Template by Colorlib</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-icons.min.css') }}" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/animate/animate.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
</head>

<body>
    {{-- <div class="container-xxl bg-white p-0"> --}}
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/Manchester_United_FC_crest.svg/1200px-Manchester_United_FC_crest.svg.png" alt="Icon" style="width: 50px; height: 50px;">
                        {{-- <h1>DeMobil</h1> --}}
                    </div>
                    <h1 class="m-0 text-primary">DeMobil</h1>

                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kendaraan</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ url('daftar-mobil') }}" class="dropdown-item">Mobil</a>
                                <a href="{{ url('daftar-motor') }}" class="dropdown-item">Motor</a>
                            </div>
                        </div>
                        <a href="{{ url('tentang-kami') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="{{ url('kontak') }}" class="nav-item nav-link">Kontak</a>
                    </div>
                    <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

    {{-- <div class="site-wrap" id="home-section"> --}}

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 col-md-6">
                        <h1 class="text-white mb-4">DeMobil</h1>                            
                        <p>{{ $setting->footer_description }}</p>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jln. Pemuda No 1</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+628 123 456 789</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>demobil@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="{{ $setting->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">DeMobil</a>, All Right Reserved.
							Designed By Kelompok 5
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        
    {{-- </div> --}}

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>

    <script src="{{ asset('frontend/js/easing/easing.min.js') }}"></script>

    <script src="{{ asset('frontend/js/wow/wow.min.js') }}"></script>

    <script src="{{ asset('frontend/js/waypoint/waypoints.min.js') }}"></script>

    <script src="{{ asset('frontend/js/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('frontend/js/main.js') }}"></script>
    {{-- <script src="https://kit.fontawesome.com/41f5370a51.js" crossorigin="anonymous"></script> --}}
    @stack('script-alt')
</body>

</html>
