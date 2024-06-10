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
                            <td>{{ $booking->vehicle_type == 'car' ? $booking->vehicle->nama_mobil : $booking->vehicle->nama_motor }}
                                - {{ $booking->vehicle->type->nama }}</td>
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
                            <th scope="row">Biaya Sewa {{ $booking->vehicle_type == 'car' ? 'Mobil' : 'Motor' }}
                                ({{ $booking->days_count }} Hari)</th>
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
            </div>
            <div class="col-md-6">
                <h1>Pembayaran</h1>
                @if ($booking->booking_status == 'Menunggu Pembayaran')
                    <p>Silahkan lakukan pembayaran terlebih dahulu!</p>
                @elseif ($booking->booking_status == 'Menunggu Konfirmasi')
                    <p>Silahkan tunggu konfirmasi dari admin</p>
                @elseif ($booking->booking_status == 'Pembayaran Terkonfirmasi')
                    @if ($booking->pickup == 'Ambil Sendiri')
                        <p>Silahkan ambil kendaraan di lokasi kami</p>
                    @else
                        <p>Silahkan tunggu kendaraan diantar ke lokasi Anda!</p>
                    @endif
                @elseif ($booking->booking_status == 'Belum Dikembalikan')
                    <p>Silahkan kembalikan kendaraan maksimal jam 8 malam pada tanggal {{ $booking->end_date }}</p>
                @elseif ($booking->booking_status == 'Selesai')
                    <p>Terima kasih telah menggunakan sewa kendaraan kami! Sampai jumpa di pemesanan selanjutnya!</p>
                @elseif ($booking->booking_status == 'Dibatalkan')
                    <p>Pemesanan Anda telah dibatalkan</p>
                @endif
                @if ($booking->booking_status == 'Menunggu Pembayaran')
                <button type="button" class="btn btn-primary" id="pay-button">
                    Bayar Sekarang
                </button>
                @endif
                <div class="col-md-12">
                    <div class="d-flex align-items-center mb-3" data-bs-toggle="collapse" href="#feedbackForm"
                        aria-expanded="false">
                        <div style="border-top: 1px solid #000; flex-grow: 1;"></div>
                        <span class="btn mx-3">Lihat Feedback</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    @foreach ($feedbacks as $feedback)
                    <div id="feedbackForm" class="collapse">
                        <h2 class="mt-4">Feedback Anda</h2>
                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="avatar" value="{{ Auth::user()->avatar }}">
                            <input type="hidden" name="booking_code" value="{{ $booking->booking_code }}">
                            <input type="hidden" name="vehicle_type" value="{{ $booking->vehicle_type }}">
                            <input type="hidden" name="vehicle_id" value="{{ $booking->vehicle_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            
                            <div class="mb-3">
                                <label for="feedback">Feedback</label>
                                <textarea class="form-control bg-light" id="feedback" name="feedback" rows="3" required disabled>{{ $feedback->feedback }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="rating">Rating</label>
                                <div class="rating-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $feedback->rating)
                                        <span class="star" data-rating="{{ $i }}"><i class="fas fa-star text-warning"></i></span>
                                    @else
                                        <span class="star" data-rating="{{ $i }}"><i class="fas fa-star text-secondary"></i></span>
                                    @endif
                                @endfor
                                </div>
                                <input type="hidden" name="rating" id="rating-value" value="0" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_name">Nama Pengguna</label>
                                <input type="text" class="form-control bg-light" id="user_name" name="user_name"
                                    value="{{ Auth::user()->name }}" required disabled>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-center" role="alert">
                    <strong>{{ $error }}</strong>
                </div>
            @endforeach
        @endif

    </div>
@endsection

@section('styles')
    <style>
        .fa-chevron-down {
            font-size: 16px;
            color: #000;
        }

        .rating-stars {
            cursor: pointer;
        }

        .rating-stars .star {
            font-size: 24px;
            color: #ccc;
            transition: color 0.2s;
        }

        .rating-stars .star.selected i {
            color: gold !important;
        }
    </style>
@endsection

@push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $booking->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    window.location.href = "{{ route('booking_success', $booking->booking_code) }}";
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endpush
