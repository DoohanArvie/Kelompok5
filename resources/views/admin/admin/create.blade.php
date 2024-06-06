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
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h5>{{ __('Tambah Akun Admin') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('admin.admin.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row pb-4">
                                                <div class="col-sm-12">
                                                    <label for="avatar" class="col-form-label">{{ __('Avatar') }}</label>
                                                    <div class="mt-auto">
                                                        <input type="file" id="avatar" name="avatar"
                                                            value="{{ old('avatar') }}" class="form-control"
                                                            accept=".jpg,.jpeg,.png">
                                                    </div>
                                                </div>
                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="name" class="col-form-label">Nama</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ old('name') }}" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="email" class="col-form-label">Email</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="email"
                                                            value="{{ old('email') }}" id="email">
                                                    </div>
                                                </div>

                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="password"
                                                        class="col-form-label">{{ __('Password Baru') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row border-bottom pb-4">
                                                    <label for="password_confirmation"
                                                        class="col-form-label">{{ __('Konfirmasi Password Baru') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="is_admin" value="1">
                                            <button type="submit" class="btn btn-success">Tambah Akun</button>
                                        </form>
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
