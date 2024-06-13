<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $setting->nama_perusahaan }} | Ankavi Team</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet" /> --}}
    <link rel="icon" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" type="image/png">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link id="pagestyle" href="{{ asset('frontend/css/argon/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('frontend/css/animate/animate.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">
    @stack('style-alt')
    @stack('styles')
</head>

<body>
    {{-- <div class="container-xxl bg-white p-0"> --}}
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        @include('layouts.navbar')
        
        
    </div>
    <!-- Navbar End -->

    {{-- <div class="site-wrap" id="home-section"> --}}

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 mt-5 footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row">

                <div class="col-lg-3 col-md-4">
                    @php
                        $settings = \App\Models\Setting::first();
                    @endphp

                    @if ($settings && $settings->logo)
                        <img class="img-fluid" src="{{ Storage::url($settings->logo) }}" alt="Logo"
                            width="100%">
                    @else
                    @endif
                </div>
                <div class="col-lg-7 col-md-4">
                    <h1 class="text-white mb-4">{{ $setting->nama_perusahaan }}</h1>
                    <p>{{ $setting->footer_description }}</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $setting->alamat }}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $setting->phone }}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $setting->email }}</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="{{ $setting->facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $setting->instagram }}"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $setting->twitter }}"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $setting->linkedin }}"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link text-white-50 text-decoration-none" href="">Tentang Kami</a>
                    <a class="btn btn-link text-white-50 text-decoration-none" href="">Kontak</a>
                    <a class="btn btn-link text-white-50 text-decoration-none" href="">FAQs</a>
                    <a class="btn btn-link text-white-50 text-decoration-none" href="">Privacy Policy</a>
                    <a class="btn btn-link text-white-50 text-decoration-none" href="">Terms & Condition</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">{{ $setting->nama_perusahaan }}</a>, All Right
                        Reserved.
                        Designed By Ankavi Team
                        <strong>Kelompok 5 MSIB Fullstack #4</strong>
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

    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/argon/core/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/argon/core/bootstrap.min.js') }}"></script>
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

    <script src="{{ asset('frontend/js/waypoints/waypoints.min.js') }}"></script>

    <script src="{{ asset('frontend/js/owlcarousel/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/argon/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/argon/plugins/smooth-scrollbar.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/argon/argon-dashboard.min.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '{{ session('alert-type') == 'success' ? 'Berhasil!' : 
                              (session('alert-type') == 'error' ? 'Gagal!' : 
                              (session('alert-type') == 'info' ? 'Berhasil!' : '')) }}',
                    text: '{{ session('message') }}',
                    icon: '{{ session('alert-type') }}',
                    confirmButtonColor: '#5e72e4',
                    confirmButtonText: 'OK',
                    timer: 1500
                });
            });
        </script>
    @endif
    {{-- <script src="https://kit.fontawesome.com/41f5370a51.js" crossorigin="anonymous"></script> --}}
    @stack('script-alt')
    @stack('scripts')
</body>

</html>
