@extends('frontend.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center g-4">
            <!-- Profile Settings -->
            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-8">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white font-weight-bold">
                        {{ __('Profile Settings') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                            id="profileForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 d-flex flex-column mb-3">
                                    <label for="avatar"
                                        class="form-label font-weight-bold">{{ __('Foto Profil') }}</label>
                                    @if (Auth::user()->avatar)
                                        <div>
                                            @if (in_array(pathinfo(Auth::user()->avatar, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                <img id="existingAvatarPreview" class="img-fluid"
                                                    src="{{ Storage::url('avatars/' . Auth::user()->avatar) }}"
                                                    alt="Avatar Preview">
                                            @endif
                                        </div>
                                    @endif
                                    <div class="mt-auto">
                                        <a
                                            href="{{ Storage::url('avatars/' . Auth::user()->avatar) }}">{{ Auth::user()->avatar }}</a>
                                        <input type="file" id="avatar" name="avatar"
                                            class="form-control @error('avatar') is-invalid @enderror"
                                            accept=".pdf,.jpg,.jpeg,.png">
                                        @error('avatar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-column">
                                    <div class="mb-3">
                                        <label for="name"
                                            class="form-label font-weight-bold">{{ __('Nama') }}</label>
                                        <input type="text" id="name" name="name" class="form-control bg-light"
                                            value="{{ Auth::user()->name }}" required disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email"
                                            class="form-label font-weight-bold">{{ __('Email') }}</label>
                                        <div class="input-group">
                                            <input type="email" id="email" name="email"
                                                class="form-control bg-light" value="{{ Auth::user()->email }}" required
                                                disabled>
                                            <span class="input-group-text">
                                                @if (!Auth::user()->hasVerifiedEmail())
                                                    <a href="{{ route('verification.notice') }}">Verify Email</a>
                                                @else
                                                    <div class="container-fluid"><i
                                                            class="fas fa-check-circle text-success"></i>
                                                        Verified</div>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone"
                                            class="form-label font-weight-bold">{{ __('Nomor Handphone') }}</label>
                                        <input type="number" id="phone" name="phone" class="form-control"
                                            value="{{ $user->phone ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label font-weight-bold">{{ __('Alamat') }}</label>
                                <textarea id="address" name="address" class="form-control" rows="4" required>{{ $user->address ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6 d-flex flex-column">
                                        <label for="ktp"
                                            class="form-label font-weight-bold">{{ __('KTP') }}</label>
                                        @if ($user->ktp)
                                            <div>
                                                @if (in_array(pathinfo($user->ktp, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                    <img id="existingKtpPreview" class="img-fluid"
                                                        src="{{ Storage::url('ktp/' . $user->ktp) }}" alt="KTP Preview">
                                                @endif
                                            </div>
                                        @endif
                                        <div class="mt-auto">
                                            <a href="{{ Storage::url('ktp/' . $user->ktp) }}">{{ $user->ktp }}</a>
                                            <input type="file" id="ktp" name="ktp" class="form-control"
                                                accept=".pdf,.jpg,.jpeg,.png">
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex flex-column">
                                        <label for="sim"
                                            class="form-label font-weight-bold">{{ __('SIM') }}</label>
                                        @if ($user->sim)
                                            <div>
                                                @if (in_array(pathinfo($user->sim, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                    <img id="existingSimPreview" class="img-fluid"
                                                        src="{{ Storage::url('sim/' . $user->sim) }}" alt="SIM Preview">
                                                @endif
                                            </div>
                                        @endif
                                        <div class="mt-auto">
                                            <a href="{{ Storage::url('sim/' . $user->sim) }}">{{ $user->sim }}</a>
                                            <input type="file" id="sim" name="sim" class="form-control"
                                                accept=".pdf,.jpg,.jpeg,.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p>{{ __('Status Akun') }} : <strong>{{ $user->account_status }}</strong></p>
                                @if ($user->account_status == 'Belum Terverifikasi')
                                    <p><strong>Silahkan lengkapi data diri Anda!</strong></p>
                                @elseif ($user->account_status == 'Menunggu Verifikasi')
                                    <p><strong>Menunggu Terverifikasi oleh Admin</strong></p>
                                @else
                                    <p><strong>Akun Anda telah Terverifikasi</strong></p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Update Password -->
            <div class="col-md-4">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white font-weight-bold">
                        {{ __('Update Password') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.update.custom') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password"
                                    class="form-label font-weight-bold">{{ __('Password Sekarang') }}</label>
                                <div class="input-group">
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror" required>
                                        <span class="input-group-text" onclick="togglePassword(this)"
                                            style="cursor: pointer;">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    @error('current_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password"
                                    class="form-label font-weight-bold">{{ __('Password Baru') }}</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    <span class="input-group-text" onclick="togglePassword(this)"
                                        style="cursor: pointer;">
                                        <i class="fas fa-eye-slash"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation"
                                    class="form-label font-weight-bold">{{ __('Konfirmasi Password') }}</label>
                                <div class="input-group">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                        <span class="input-group-text" onclick="togglePassword(this)" style="cursor: pointer;">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script-alt')
        <script>
            $(document).ready(function() {
                $('input[type="number"]').on('keypress', function(event) {
                    // Prevent "-" from being entered
                    if (event.which === 45 || event.key === '-') {
                        event.preventDefault();
                    }
                });

                $('input[type="number"]').on('input', function() {
                    // Remove any negative signs that might have been pasted
                    let value = $(this).val();
                    if (value.indexOf('-') !== -1) {
                        $(this).val(value.replace('-', ''));
                    }
                });

                $('input[type="number"]').on('blur', function() {
                    // Ensure no negative value remains after input loses focus
                    let value = $(this).val();
                    if (value < 0) {
                        $(this).val(Math.abs(value)); // Convert negative to positive
                    }
                });
            });

            function togglePassword(element) {
                const $input = $(element).closest('.input-group').find('input');
                const $icon = $(element).find('i');

                if ($input.attr('type') === 'password') {
                    $input.attr('type', 'text');
                    $icon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    $input.attr('type', 'password');
                    $icon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            }
        </script>
    @endpush

@endsection

@include('layouts.datatable')
