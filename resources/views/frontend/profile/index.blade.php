@extends('frontend.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center g-4">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">{{ __('Profile Settings') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                            id="profileForm">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control bg-light"
                                    value="{{ Auth::user()->name }}" required disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <div class="input-group">
                                    <input type="email" id="email" name="email" class="form-control bg-light"
                                        value="{{ Auth::user()->email }}" required disabled>
                                    <span class="input-group-text">
                                        @if (!Auth::user()->hasVerifiedEmail())
                                            <a href="{{ route('verification.notice') }}">Verify Email</a>
                                        @else
                                            <div class="container-fluidw"><i class="fas fa-check-circle text-success"></i>
                                                Verified</div>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('Nomor Handphone') }}</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="{{ $user->phone ?? '' }}">
                                {{-- {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }}> --}}
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <textarea id="address" name="address" class="form-control" rows="4" required {{-- {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }} --}}>{{ $user->address ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ktp" class="form-label">{{ __('KTP') }}</label>
                                @if ($user->ktp)
                                    <div>
                                        @if (in_array(pathinfo($user->ktp, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                            <img id="existingKtpPreview" src="{{ Storage::url('ktp/' . $user->ktp) }}"
                                                alt="KTP Preview" style="width: 50%;">
                                        @endif
                                        <a href="{{ Storage::url('ktp/' . $user->ktp) }}">{{ $user->ktp }}</a>
                                    </div>
                                @endif
                                <input type="file" id="ktp" name="ktp" class="form-control"
                                    accept=".pdf,.jpg,.jpeg,.png" {{-- {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }} --}}>
                            </div>
                            <div class="mb-3">
                                <label for="sim" class="form-label">{{ __('SIM') }}</label>
                                @if ($user->sim)
                                    <div>
                                        @if (in_array(pathinfo($user->sim, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                            <img id="existingSimPreview" src="{{ Storage::url('sim/' . $user->sim) }}"
                                                alt="SIM Preview" style="width: 50%;">
                                        @endif
                                        <a href="{{ Storage::url('sim/' . $user->sim) }}">{{ $user->sim }}</a>
                                    </div>
                                @endif
                                <input type="file" id="sim" name="sim" class="form-control"
                                    accept=".pdf,.jpg,.jpeg,.png" {{-- {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }} onchange="previewSIM()" --}}>
                            </div>
                            <div class="mb-3">
                                <p>{{ __('Status Akun') }} : <strong>{{ $user->account_status }}</strong></p>

                                @if ($user->account_status == 'Belum Terverifikasi')
                                    <p><strong>Silahkan lengkapi data diri Anda!</strong></p>
                                @elseif ($user->account_status == 'Menunggu Verifikasi')
                                    <p><strong>Menunggu Terverifikasi oleh Admin</strong></p>
                                @else
                                    <p><strong>Akun Anda telah Terverifikasi</strong></p>
                                @endif
                                {{-- <label for="account_status" class="form-label">{{ __('Status Akun') }}</label>
                                <input type="text" id="account_status" name="account_status" class="form-control bg-light"
                                    value="{{ $user->account_status }}" required disabled> --}}
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
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