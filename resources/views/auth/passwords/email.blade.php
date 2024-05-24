@extends('layouts.guest')

@section('content')
<body class="bg-gray-200">
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
                                        {{ __('Reset Password') }}
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form role="form" class="text-start" action="{{ route('password.email') }}" method="POST">
                                    @csrf

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
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">
                                            {{ __('Send Password Reset Link') }}
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
</body>
@endsection