@extends('frontend.layout')

@section('content')
<!-- booking_form.blade.php -->
<div class="container mt-5">
    <div class="text-center">
        <h1>Booking {{ $vehicle_type == 'car' ? 'Mobil' : 'Motor' }}</h1>
        <h2>{{ $vehicle_type == 'car' ? $vehicle->nama_mobil : $vehicle->nama_motor }} - {{ $vehicle->type->nama }}</h2>
    </div>
    <hr>
    <form action="{{ route('book_vehicle', ['vehicle_type' => $vehicle_type, 'vehicle_id' => $vehicle->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
        <input type="hidden" name="vehicle_type" value="{{ $vehicle_type }}">
        <input type="hidden" name="with_driver" value="{{ $with_driver }}">
        <input type="hidden" name="pickup" value="{{ $pickup }}">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="nama_penyewa" class="form-label">Nama Penyewa:</label>
                    <input type="text" class="form-control" id="nama_penyewa" value="{{ $user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="vehicle" class="form-label">Kendaraan:</label>
                    <input type="text" class="form-control" id="vehicle" value="{{ $vehicle_type == 'car' ? $vehicle->nama_mobil : $vehicle->nama_motor }} - {{ $vehicle->type->nama }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai Sewa:</label>
                    <input type="text" class="form-control" id="tanggal_mulai" value="{{ $startDate }}" name="start_date" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai Sewa:</label>
                    <input type="text" class="form-control" id="tanggal_selesai" value="{{ $endDate }}" name="end_date" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_hari" class="form-label">Total Hari:</label>
                    <input type="text" class="form-control" id="total_hari" value="{{ $daysCount }} Hari" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="driver" class="form-label">Menggunakan Driver:</label>
                    <input type="text" class="form-control" id="driver" value="{{ $with_driver ? 'Ya' : 'Tidak' }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="metode_pickup" class="form-label">Metode Pickup:</label>
                    <input type="text" class="form-control" id="metode_pickup" value="{{ $pickup }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="harga_sewa" class="form-label">Harga Sewa {{ $vehicle_type == 'car' ? 'Mobil' : 'Motor' }} <strong>({{ $daysCount }} Hari)</strong></label>
                    <input type="text" class="form-control" id="harga_sewa" value="Rp {{ number_format($bookingFee, 0, ',', '.') }}" name="booking_fee" readonly>
                </div>
                <div class="mb-3">
                    <label for="biaya_driver" class="form-label">Biaya Driver <strong>({{ $daysCount }} Hari)</strong></label>
                    <input type="text" class="form-control" id="biaya_driver" value="Rp {{ number_format($driverFee, 0, ',', '.') }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga:</label>
                    <input type="text" class="form-control" id="total_harga" value="Rp {{ number_format($totalFee, 0, ',', '.') }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Sewa Sekarang</button>
            </div>
        </div>
    </form>
</div>
@endsection