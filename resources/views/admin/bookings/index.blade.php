@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Semua Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered table-striped table-hover text-nowrap table-responsive text-center align-middle w-100">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Nomer HP/Whatsap</th>
                                            <th>Mobil</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $booking->nama_lengkap }}</td>
                                                <td>{{ $booking->alamat_lengkap }}</td>
                                                <td>
                                                    <a href="telp:{{ $booking->nomer_wa }}">{{ $booking->nomer_wa }}</a>
                                                </td>
                                                <td>{{ $booking->car->nama_mobil }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <form onclick="return confirm('Are you sure?')"
                                                            action="{{ route('admin.bookings.destroy', $booking) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center">Data Kosong!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>                                    
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