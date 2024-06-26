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
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-success shadow-sm float-right">
                                <i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.testimonials.update', $testimonial) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row border-bottom pb-4">
                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $testimonial->name) }}" id="name">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="profile" class="col-sm-2 col-form-label">Profile</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="profile"
                                            value="{{ old('profile') }}" id="profile">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pekerjaan"
                                            value="{{ old('pekerjaan', $testimonial->pekerjaan) }}" id="pekerjaan">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="6">{{ old('pesan', $testimonial->pesan) }}</textarea>
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
