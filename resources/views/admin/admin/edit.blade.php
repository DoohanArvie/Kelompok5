@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data</h3>
                            <a href="{{ route('admin.admin.index') }}" class="btn btn-success shadow-sm float-right"> <i
                                    class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="row justify-content-center g-4">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h5>{{ __('Profile Settings') }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{ route('admin.admin.update', $admin) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row justify-content-center border-bottom">
                                                    <div class="col-md-4">
                                                        <div class="form-group row pb-4">
                                                            <div class="col-sm-12">
                                                                <label for="avatar"
                                                                    class="col-form-label">{{ __('Avatar') }}</label>
                                                                @if ($admin->avatar)
                                                                    <div>
                                                                        @if (in_array(pathinfo($admin->avatar, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                                            <img id="existingAvatarPreview"
                                                                                class="img-fluid"
                                                                                src="{{ Storage::url('avatars/' . $admin->avatar) }}"
                                                                                alt="{{ $admin->name }} Avatar"
                                                                                style="width: 100%;">
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <div class="mt-auto">
                                                                    <a
                                                                        href="{{ Storage::url('avatars/' . $admin->avatar) }}">{{ $admin->avatar }}</a>
                                                                    <input type="file" id="avatar" name="avatar"
                                                                        class="form-control @error('avatar') is-invalid @enderror"
                                                                        accept=".jpg,.jpeg,.png">
                                                                    @error('avatar')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group row border-bottom pb-4">
                                                            <label for="name" class="col-form-label">Nama</label>
                                                            <div class="col-sm-12">
                                                                <input type="text"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    name="name" value="{{ old('name', $admin->name) }}"
                                                                    id="name" required>
                                                                @error('name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row border-bottom pb-4">
                                                            <label for="email" class="col-form-label">Email</label>
                                                            <div class="col-sm-12">
                                                                <input type="text"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    name="email"
                                                                    value="{{ old('email', $admin->email) }}"
                                                                    id="email" required>
                                                                @error('email')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Update
                                                            Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h5>{{ __('Password Settings') }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{ route('password.update.custom') }}">
                                                @csrf
                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="current_password"
                                                        class="col-form-label">{{ __('Password Sekarang') }}</label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input type="password" id="current_password"
                                                                name="current_password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                required>
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
                                                </div>
                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="password"
                                                        class="col-form-label">{{ __('Password Baru') }}</label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input type="password" id="password" name="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                required>
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
                                                </div>
                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="password_confirmation"
                                                        class="col-form-label">{{ __('Konfirmasi Password Baru') }}</label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input type="password" id="password_confirmation"
                                                                name="password_confirmation"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                required>

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
                                                </div>
                                                <button type="submit" class="btn btn-success">Update Password</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('script-alt')
    <script>
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
