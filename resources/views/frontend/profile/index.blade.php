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
                                    <label for="avatar" class="form-label font-weight-bold">{{ __('Foto Profil') }}</label>
                                    <div>
                                        @if (Auth::user()->avatar)
                                            <img id="existingAvatarPreview" class="img-fluid"
                                                src="{{ Storage::url('avatars/' . Auth::user()->avatar) }}"
                                                alt="Avatar Preview">
                                        @else
                                            <img id="existingAvatarPreview" class="img-fluid"
                                                src="{{ asset('default-avatar.png') }}" alt="Avatar Preview">
                                        @endif
                                    </div>
                                    <div class="mt-auto">
                                        <input type="file" id="avatar" name="avatar"
                                            class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
                                        @error('avatar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-column">
                                    <div class="mb-3">
                                        <label for="name" class="form-label font-weight-bold">{{ __('Nama') }}</label>
                                        <input type="text" id="name" name="name" class="form-control bg-light"
                                            value="{{ Auth::user()->name }}" required disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label font-weight-bold">{{ __('Email') }}</label>
                                        <div class="input-group">
                                            <input type="email" id="email" name="email" class="form-control bg-light"
                                                value="{{ Auth::user()->email }}" required disabled>
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
                                        <label for="phone" class="form-label font-weight-bold">{{ __('Nomor Handphone') }}</label>
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
                                        <label for="ktp" class="form-label font-weight-bold">{{ __('KTP') }}</label>
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
                                        <label for="sim" class="form-label font-weight-bold">{{ __('SIM') }}</label>
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
                                <label for="current_password" class="form-label font-weight-bold">{{ __('Password Sekarang') }}</label>
                                <div class="input-group">
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror" required>
                                    <span class="input-group-text" onclick="togglePassword(this)" style="cursor: pointer;">
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
                                <label for="password" class="form-label font-weight-bold">{{ __('Password Baru') }}</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password"
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
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label font-weight-bold">{{ __('Konfirmasi Password') }}</label>
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

    <!-- Modal untuk Crop Gambar -->
    <div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable"> <!-- Menambahkan kelas modal-dialog-scrollable -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cropModalLabel">Crop Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img id="imageCrop" src="#" alt="Crop Preview" style="max-width: 100%;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button id="cropButton" type="button" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>


    @push('script-alt')
        <!-- Cropper.js -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var avatar = document.getElementById('avatar');
                var image = document.getElementById('imageCrop');
                var existingAvatarPreview = document.getElementById('existingAvatarPreview');
                var cropButton = document.getElementById('cropButton');
                var cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
                var cropper;

                avatar.addEventListener('change', function (e) {
                    var files = e.target.files;
                    var done = function (url) {
                        avatar.value = '';
                        image.src = url;
                        cropModal.show();
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(image, {
                            aspectRatio: 1,
                            viewMode: 1,
                        });
                    };
                    var reader;
                    var file;
                    if (files && files.length > 0) {
                        file = files[0];
                        if (URL) {
                            done(URL.createObjectURL(file));
                        } else if (FileReader) {
                            reader = new FileReader();
                            reader.onload = function (e) {
                                done(reader.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });

                cropButton.addEventListener('click', function () {
                    if (cropper) {
                        var canvas = cropper.getCroppedCanvas({
                            width: 200,
                            height: 200,
                        });
                        canvas.toBlob(function (blob) {
                            var url = URL.createObjectURL(blob);
                            var reader = new FileReader();
                            reader.readAsDataURL(blob);
                            reader.onloadend = function () {
                                var base64data = reader.result;
                                var formData = new FormData();
                                formData.append('avatar', blob);
                                formData.append('_token', '{{ csrf_token() }}');

                                fetch('{{ route("profile.update.avatar") }}', {
                                    method: 'POST',
                                    body: formData,
                                }).then(response => response.json()).then(data => {
                                    if (data.success) {
                                        existingAvatarPreview.src = base64data;
                                        cropModal.hide();
                                        alert('Avatar berhasil diperbarui!');
                                    } else {
                                        alert('Gagal memperbarui avatar.');
                                    }
                                }).catch(error => {
                                    console.error(error);
                                    alert('Terjadi kesalahan.');
                                });
                            };
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
