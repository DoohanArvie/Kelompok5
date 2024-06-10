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
                                        <h4 class="font-weight-bolder">Register</h4>
                                        <p class="mb-0">Masukkan email dan password untuk membuat akun</p>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" class="text-start" action="{{ route('register') }}"
                                            method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <input type="text" name="name"
                                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                        placeholder="{{ __('Nama') }}" required autocomplete="name"
                                                        autofocus>
                                                    <span class="input-group-text">
                                                        <i class="fa-solid fa-user text-primary text-lg"></i>
                                                    </span>
                                                    @error('name')
                                                        <span class="error invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
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
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                                        placeholder="{{ __('Confirm Password') }}" required>
                                                    <span class="input-group-text">
                                                        <i class="fa-solid fa-lock text-primary text-lg"></i>
                                                    </span>
                                                    @error('password_confirmation')
                                                        <span class="error invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                    style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg'); background-size: cover;">
                                    <span class="mask bg-gradient-primary opacity-6"></span>
                                    <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                        currency"</h4>
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
