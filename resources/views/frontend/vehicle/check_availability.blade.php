@extends('frontend.layout')

@section('content')
    <!-- check_availability.blade.php -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <img src="{{ Storage::url($vehicle->image1) }}" class="img-fluid" alt="">
            </div>
            <div class="col-6">
                <div class="mb-4">
                    <h1>Cek Ketersediaan </h1>
                    @if ($vehicle_type === 'car')
                        <h4>{{ $vehicle->nama_mobil }} - {{ $vehicle->type->nama }}</h4>
                    @else
                        <h4>{{ $vehicle->nama_motor }} - {{ $vehicle->type->nama }}</h4>
                    @endif
                </div>
                <form
                    action="{{ route('check_vehicle_availability', ['vehicle_type' => $vehicle_type, 'vehicle_id' => $vehicle->id]) }}"
                    method="GET">
                    @csrf
                    <input type="hidden" name="vehicle_type" value="{{ $vehicle_type }}">
                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date" id="start_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="end_date" id="end_date" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Menggunakan Driver</label>
                        <div>
                            @if ($vehicle_type === 'car')
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="with_driver" id="with_driver_yes"
                                        value="1" required>
                                    <label class="form-check-label" for="with_driver_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="with_driver" id="with_driver_no"
                                        value="0" required>
                                    <label class="form-check-label" for="with_driver_no">Tidak</label>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="with_driver" id="with_driver_yes"
                                        value="1" disabled>
                                    <label class="form-check-label" for="with_driver_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="with_driver" id="with_driver_no"
                                        value="0" checked disabled>
                                    <label class="form-check-label" for="with_driver_no">Tidak</label>
                                </div>
                                <input type="hidden" name="with_driver" value="0">
                                {{-- <p>Tidak</p> --}}
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="pickup">Metode Pickup</label>
                        <select name="pickup" id="pickup" class="form-control" required>
                            <option value="">Pilih Metode Pickup</option>
                            <option value="Ambil Sendiri">Ambil Sendiri</option>
                            <option value="Diantar Sesuai Alamat">Diantar Sesuai Alamat</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Cek Ketersediaan</button>
                </form>
            </div>
        </div>

        <!-- Modal Alert -->
        @if (session('error'))
            <div class="modal" tabindex="-1" id="errorModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Kesalahan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
            <!-- Modal -->
        @elseif ($isAvailable)
            <div class="modal fade" id="availabilityModal" tabindex="-1" aria-labelledby="availabilityModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="availabilityModalLabel"><strong>Kendaraan Tersedia</strong></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="{{ route('booking_form', ['vehicle_type' => $vehicle_type, 'vehicle_id' => $vehicle->id]) }}"
                                method="GET">
                                @csrf
                                <input type="hidden" name="start_date" value="{{ $startDate }}" required>
                                <input type="hidden" name="end_date" value="{{ $endDate }}" required>
                                <input type="hidden" name="with_driver" value="{{ $with_driver }}">
                                <input type="hidden" name="pickup" value="{{ $pickup }}">
                                <div class="mb-3">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="start_date"
                                        value="{{ $startDate }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="end_date">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="end_date"
                                        value="{{ $endDate }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="with_driver">Menggunakan Driver</label>
                                    <select class="form-control" name="with_driver" disabled>
                                        <option value="1" {{ $with_driver ? 'selected' : '' }}>Ya</option>
                                        <option value="0" {{ !$with_driver ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pickup">Metode Pickup</label>
                                    <select class="form-control" name="pickup" disabled>
                                        <option value="Ambil Sendiri" {{ $pickup == 'Ambil Sendiri' ? 'selected' : '' }}>
                                            Ambil Sendiri</option>
                                        <option value="Diantar Sesuai Alamat"
                                            {{ $pickup == 'Diantar Sesuai Alamat' ? 'selected' : '' }}>Diantar Sesuai
                                            Alamat</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Sewa Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('script-alt')
    <script>
        $(document).ready(function() {
            @if (session('error'))
                $('#errorModal').modal('show');
            @elseif ($isAvailable)
                $('#availabilityModal').modal('show');
            @endif
        });
    </script>
@endpush