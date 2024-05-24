@extends('layouts.guest')

@section('content')
<main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                    {{ __('Register') }}
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" class="text-start" action="{{ route('register') }}" method="POST">
                                @csrf

                                <div class="input-group input-group-outline my-3">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user mx-3"></span>
                                        </div>
                                    </div>
                                    @error('name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="{{ __('Email') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope mx-3"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('Password') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock mx-3"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="{{ __('Confirm Password') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock mx-3"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection