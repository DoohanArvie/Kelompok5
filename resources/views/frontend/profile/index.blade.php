@extends('frontend.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center g-4">
            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile Settings') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                            id="profileForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 d-flex flex-column mb-3">
                                    <label for="avatar" class="form-label">{{ __('Foto Profil') }}</label>
                                    @if (Auth::user()->avatar)
                                        <div>
                                            @if (in_array(pathinfo(Auth::user()->avatar, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                <img id="existingAvatarPreview" class="img-fluid"
                                                    src="{{ Storage::url('avatars/' . Auth::user()->avatar) }}"
                                                    alt="Avatar Preview" style="width: 100%;">
                                            @endif
                                        </div>
                                    @endif
                                    <div class="mt-auto">
                                        <a href="{{ Storage::url('avatars/' . Auth::user()->avatar) }}">{{ Auth::user()->avatar }}</a>
                                        <input type="file" id="avatar" name="avatar" class="form-control"
                                            accept=".pdf,.jpg,.jpeg,.png">
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-column">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Nama') }}</label>
                                        <input type="text" id="name" name="name" class="form-control bg-light"
                                            value="{{ Auth::user()->name }}" required disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <div class="input-group">
                                            <input type="email" id="email" name="email"
                                                class="form-control bg-light" value="{{ Auth::user()->email }}" required
                                                disabled>
                                            <span class="input-group-text">
                                                @if (!Auth::user()->hasVerifiedEmail())
                                                    <a href="{{ route('verification.notice') }}">Verify Email</a>
                                                @else
                                                    <div class="container-fluidw"><i
                                                            class="fas fa-check-circle text-success"></i>
                                                        Verified</div>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">{{ __('Nomor Handphone') }}</label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="{{ $user->phone ?? '' }}">
                                        {{-- {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }}> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">{{ __('Alamat') }}</label>
                                <textarea id="address" name="address" class="form-control" rows="4" required {{-- {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }} --}}>{{ $user->address ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6 d-flex flex-column">
                                        <label for="ktp" class="form-label">{{ __('KTP') }}</label>
                                        @if ($user->ktp)
                                            <div>
                                                @if (in_array(pathinfo($user->ktp, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                    <img id="existingKtpPreview" class="img-fluid"
                                                        src="{{ Storage::url('ktp/' . $user->ktp) }}" alt="KTP Preview"
                                                        style="width: 100%;">
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
                                        <label for="sim" class="form-label">{{ __('SIM') }}</label>
                                        @if ($user->sim)
                                            <div>
                                                @if (in_array(pathinfo($user->sim, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                    <img id="existingSimPreview" class="img-fluid"
                                                        src="{{ Storage::url('sim/' . $user->sim) }}" alt="SIM Preview"
                                                        style="width: 100%;">
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
                                {{-- <label for="account_status" class="form-label">{{ __('Status Akun') }}</label>
                                <input type="text" id="account_status" name="account_status" class="form-control bg-light"
                                    value="{{ $user->account_status }}" required disabled> --}}
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Update Password') }}</div>
                    <div class="card-body">
                        <form action="{{ route('password.update.custom') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">{{ __('Password Sekarang') }}</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password Baru') }}</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation"
                                    class="form-label">{{ __('Konfirmasi Password') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@emretulek/jbvalidator"></script>
    <script>
        $('#profileForm').validator();
    </script>
@endsection
@include('layouts.datatable')
