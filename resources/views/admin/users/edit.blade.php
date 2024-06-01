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
                            <a href="{{ route('admin.users.index') }}" class="btn btn-success shadow-sm float-right"> <i
                                    class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.users.update', $user) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="form-group row border-bottom pb-4">
                                            <label for="nama" class="col-form-label">Nama</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ old('name', $user->name) }}" id="nama" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row border-bottom pb-4">
                                            <label for="email" class="col-form-label">Email</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ old('email', $user->email) }}" id="email" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row border-bottom pb-4">
                                            <label for="phone" class="form-label">No Handphone</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ old('phone', $user->name) }}" id="phone" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row border-bottom pb-4">
                                            <label for="alamat" class="col-form-label">Alamat</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="alamat"
                                                    value="{{ old('alamat', $user->address) }}" id="alamat" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row border-bottom pb-4">
                                            <label for="status_akun" class="col-form-label">Status Akun</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="account_status" id="status_akun">
                                                    <option value="Belum Terverifikasi" {{ $user->account_status == 'Belum Terverifikasi' ? 'selected' : '' }}>Belum Terverifikasi</option>
                                                    <option value="Menunggu Verifikasi" {{ $user->account_status == 'Menunggu Terverifikasi' ? 'selected' : '' }}>Menunggu Terverifikasi</option>
                                                    <option value="Terverifikasi" {{ $user->account_status == 'Terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row border-bottom pb-4">
                                            <div class="col-sm-12">
                                                <label for="ktp" class="col-form-label">KTP</label>
                                                <input type="hidden" name="ktp" value="{{ $user->ktp }}"><br>
                                                <a href="{{ Storage::url('ktp/' . $user->ktp) }}" target="_blank">
                                                    <img src="{{ Storage::url('ktp/' . $user->ktp) }}" width="100%"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group row border-bottom pb-4">
                                            <div class="col-sm-12">
                                                <label for="sim" class="col-form-label">SIM</label>
                                                <input type="hidden" name="sim" value="{{ $user->sim }}"><br>
                                                <a href="{{ Storage::url('sim/' . $user->sim) }}" target="_blank">
                                                    <img src="{{ Storage::url('sim/' . $user->sim) }}" width="100%"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
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
