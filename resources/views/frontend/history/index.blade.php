@extends('frontend.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <!-- Tabel Riwayat Sewa -->
                        <h5 class="mb-4">Riwayat Sewa</h5>
                        <div class="table-responsive">
                            <table id="data-table"
                                class="table table-bordered table-striped table-hover text-nowrap table-responsive text-center align-middle w-100">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Booking</th>
                                        <th>Jenis Kendaraan</th>
                                        {{-- <th>Kendaraan</th> --}}
                                        <th>Tanggal Mulai Sewa</th>
                                        <th>Tanggal Selesai Sewa</th>
                                        <th>Metode Pickup</th>
                                        <th>Durasi</th>
                                        <th>Driver</th>
                                        <th>Total Biaya</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $index => $booking)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $booking->booking_code }}</td>
                                            <td>{{ $booking->vehicle_type == 'car' ? 'Mobil' : 'Motor' }}</td>
                                            {{-- <td>{{ $booking->vehicle->nama_mobil }}</td> --}}
                                            <td>{{ $booking->start_date }}</td>
                                            <td>{{ $booking->end_date }}</td>
                                            <td>{{ $booking->pickup }}</td>
                                            <td>{{ $booking->days_count }} Hari</td>
                                            <td>{{ $booking->with_driver ? 'Ya' : 'Tidak' }}</td>
                                            <td>Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</td>
                                            <td>{{ $booking->booking_status }}</td>
                                            <td>
                                                <a href="{{ route('booking_confirmation', ['booking_code' => $booking->booking_code, 'vehicle_type' => $booking->vehicle_type, 'vehicle_id' => $booking->vehicle_id]) }}"
                                                    class="btn btn-primary btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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