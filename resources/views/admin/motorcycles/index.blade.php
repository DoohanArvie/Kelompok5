@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Motor</h3>
                            <a href="{{ route('admin.motorcycles.create') }}" class="btn btn-success shadow-sm float-right"> <i
                                    class="fa fa-plus"></i> Tambah </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered table-striped table-hover text-nowrap table-responsive text-center align-middle w-100">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Gambar Motor</th>
                                            <th>Type Motor</th>
                                            <th>Harga Sewa</th>
                                            <th>Jumlah Penumpang</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($motorcycles as $motorcycle)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $motorcycle->nama_motor }}</td>
                                                <td>
                                                    <a target="_blank" href="{{ Storage::url($motorcycle->image) }}">
                                                        <img width="80" src="{{ Storage::url($motorcycle->image) }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary">
                                                        {{ $motorcycle->type->nama }}
                                                    </span>
                                                </td>
                                                <td>Rp{{ number_format($motorcycle->price, 0, ',', '.') }}</td>
                                                <td>{{ $motorcycle->penumpang }}</td>
                                                <td>{{ $motorcycle->statusLabel() }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a href="{{ route('admin.motorcycles.edit', $motorcycle) }}"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form onclick="return confirm('Are you sure?')"
                                                            action="{{ route('admin.motorcycles.destroy', $motorcycle) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center">Data Kosong !</td>
                                            </tr>
                                        @endforelse
                                </table>
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

@include('layouts.datatable')
