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
        @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex align-items-center mb-3" data-bs-toggle="collapse" href="#feedbackForm" aria-expanded="false">
                    <div style="border-top: 1px solid #000; flex-grow: 1;"></div>
                    <span class="btn mx-3">Beri Feedback</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <!-- Form Feedback (Awalnya Tersembunyi) -->
                <div id="feedbackForm" class="collapse">
                    <h2 class="mt-4">Form Feedback</h2>
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="avatar" value="{{ Auth::user()->avatar }}">
                        <input type="hidden" name="booking_code" value="{{ $booking->booking_code }}">
                        <input type="hidden" name="vehicle_type" value="{{ $booking->vehicle_type }}">
                        <input type="hidden" name="vehicle_id" value="{{ $booking->vehicle_id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="feedback">Feedback</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rating">Rating</label>
                            <div class="rating-stars">
                                <span class="star" data-rating="1"><i class="fas fa-star text-secondary"></i></span>
                                <span class="star" data-rating="2"><i class="fas fa-star text-secondary"></i></span>
                                <span class="star" data-rating="3"><i class="fas fa-star text-secondary"></i></span>
                                <span class="star" data-rating="4"><i class="fas fa-star text-secondary"></i></span>
                                <span class="star" data-rating="5"><i class="fas fa-star text-secondary"></i></span>
                            </div>
                            <input type="hidden" name="rating" id="rating-value" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_name">Nama Pengguna</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                    </form>
                </div>
            </div>
        </div>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll(".rating-stars .star");
        const ratingValue = document.getElementById("rating-value");

        stars.forEach((star) => {
            star.addEventListener("click", function () {
                const rating = parseInt(star.getAttribute("data-rating"));
                ratingValue.value = rating;

                stars.forEach((s) => {
                    s.querySelector("i").classList.remove("text-warning");
                    s.querySelector("i").classList.add("text-secondary");
                });

                for (let i = 0; i < rating; i++) {
                    stars[i].querySelector("i").classList.add("text-warning");
                    stars[i].querySelector("i").classList.remove("text-secondary");
                }
            });
        });
    });
</script>
@endpush
