@extends('frontend.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4">Booking Konfirmasi</h1>
                <table class="table table-responsive table-bordered table-hover table-striped align-middle">
                    <tbody>
                        <tr>
                            <th scope="row">Booking Kode</th>
                            <td>{{ $booking->booking_code }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Penyewa</th>
                            <td>{{ $booking->user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kendaraan</th>
                            <td>{{ $booking->vehicle_type == 'car' ? $booking->vehicle->nama_mobil : $booking->vehicle->nama_motor }} - {{ $booking->vehicle->type->nama }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Metode Pickup</th>
                            <td>{{ $booking->pickup }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah Hari Sewa</th>
                            <td>{{ $booking->days_count }} Hari</td>
                        </tr>
                        <tr>
                            <th scope="row">Mulai Sewa</th>
                            <td>{{ $booking->start_date }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Selesai Sewa</th>
                            <td>{{ $booking->end_date }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Biaya Sewa {{ $booking->vehicle_type == 'car' ? 'Mobil' : 'Motor' }} ({{ $booking->days_count }} Hari)</th>
                            <td>Rp {{ number_format($booking->booking_fee, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Biaya Driver ({{ $booking->days_count }} Hari)</th>
                            <td>Rp {{ number_format($booking->driver_fee, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Biaya</th>
                            <td>Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status Sewa</th>
                            <td>{{ ucfirst(str_replace('_', ' ', $booking->booking_status)) }}</td>
                        </tr>
                    </tbody>
                </table>
                <p>Silahkan Bayar menggunakan metode pembayaran yang tersedia</p>
            </div>
            <div class="col-md-6">
                <h1>Pembayaran</h1>
            </div>
        </div>
    </div>
@endsection
