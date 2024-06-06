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
                            @if (session('status'))
                                <div class="alert alert-success text-center text-white">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger text-white">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                                                        class="form-control" accept=".jpg,.jpeg,.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group row border-bottom pb-4">
                                                            <label for="name" class="col-form-label">Nama</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{ old('name', $admin->name) }}" id="name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row border-bottom pb-4">
                                                            <label for="email" class="col-form-label">Email</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="email"
                                                                    value="{{ old('email', $admin->email) }}"
                                                                    id="email">
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
                                                        <input type="password" id="current_password" name="current_password"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="password"
                                                        class="col-form-label">{{ __('Password Baru') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" id="password" name="password"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="password_confirmation"
                                                        class="col-form-label">{{ __('Konfirmasi Password Baru') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" class="form-control" required>
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
        $(document).ready(function() {
            $("#showPasswordBtn").click(function() {
                var passwordInput = $("#password");
                var buttonText = $(this).text();

                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    $(this).text("Hide");
                } else {
                    passwordInput.attr("type", "password");
                    $(this).text("Show");
                }
            });
        });
    </script>
@endpush
