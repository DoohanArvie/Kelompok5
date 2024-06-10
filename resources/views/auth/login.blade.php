@extends('layouts.guest')

@section('content')
    <!-- Main Content -->

    <body class="">
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-start">
                                        <h4 class="font-weight-bolder">Login</h4>
                                        <p class="mb-0">Masukkan email dan password Anda!</p>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" class="text-start" action="{{ route('login') }}"
                                            method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <input type="email" name="email"
                                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                        placeholder="{{ __('Email') }}" required>
                                                    <span class="input-group-text">
                                                        <i class="fa-solid fa-envelope text-primary text-lg"></i>
                                                    </span>
                                                    @error('email')
                                                        <span class="error invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <input type="password" name="password"
                                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                        placeholder="{{ __('Password') }}" required>
                                                    <span class="input-group-text">
                                                        <i class="fa-solid fa-lock text-primary text-lg"></i>
                                                    </span>
                                                    @error('password')
                                                        <span class="error invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        @if (Route::has('password.request'))
                                            <p class="mt-4 text-sm text-center">
                                                Lupa password?
                                                <a href="{{ route('password.request') }}"
                                                    class="text-primary font-weight-bold">{{ __('Reset Password') }}</a>
                                            </p>
                                        @endif
                                        <p class="mt-4 text-sm text-center">
                                            Belum punya akun?
                                            <a href="{{ route('register') }}"
                                                class="text-primary font-weight-bold">Daftar Sekarang</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                    style="background-image: url('https://images.unsplash.com/photo-1571348500628-1e9b6aa00dba?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover;">
                                    <span class="mask bg-gradient-primary opacity-6"></span>
                                    <h4 class="mt-5 text-white font-weight-bolder position-relative">"OtoRent | Sewa Rental Mobil Motor"</h4>
                                    <p class="text-white position-relative">The more effortless the writing looks, the more
                                        effort the writer actually put into the process.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
@endsection
