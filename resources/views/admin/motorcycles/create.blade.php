@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data</h3>
                            <a href="{{ route('admin.motorcycles.index') }}" class="btn btn-success shadow-sm float-right"> <i
                                    class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.motorcycles.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row border-bottom pb-4">
                                    <label for="nama_motor" class="col-sm-2 col-form-label">Nama Motor</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_motor"
                                            value="{{ old('nama_motor') }}" id="nama_motor">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="type_id" class="col-sm-2 col-form-label">Tipe Motor</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="type_id" id="type_id">
                                            @foreach ($types as $type)
                                                <option {{ old('type_id') == $type->id ? 'selected' : null }}
                                                    value="{{ $type->id }}">{{ $type->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="price" class="col-sm-2 col-form-label">Harga Sewa</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" name="price"
                                            value="{{ old('price') }}" id="price">
                                    </div>
                                </div>
                                <!--<div class="form-group row border-bottom pb-4">
                                    <label for="mesin" class="col-sm-2 col-form-label">Mesin</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" name="mesin"
                                            value="{{ old('mesin') }}" id="mesin">
                                    </div>
                                </div>-->
                                <div class="form-group row border-bottom pb-4">
                                    <label for="penumpang" class="col-sm-2 col-form-label">Jumlah Penumpang</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" name="penumpang"
                                            value="{{ old('penumpang') }}" id="penumpang">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="6">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="status" id="status">
                                            @foreach ($statuses as $no => $status)
                                                <option {{ old('status') == $no ? 'selected' : null }}
                                                    value="{{ $no }}">{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
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
