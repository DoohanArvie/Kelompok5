@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-flex h-100"
                    onclick="location.href='{{ route('admin.bookings.index', ['status' => 'Menunggu Pembayaran']) }}'">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Menunggu Pembayaran
                                    </p>
                                    <h5 class="font-weight-bolder">{{ $countMenungguPembayaran }}</h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                        since yesterday
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 position-absolute end-0">
                                <div
                                    class="icon icon-shape bg-gradient-secondary shadow-primary text-center rounded-circle">
                                    <i class="fa-solid fa-hourglass-start text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-flex h-100"
                    onclick="location.href='{{ route('admin.bookings.index', ['status' => 'Menunggu Konfirmasi']) }}'">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Pembayaran Terkonfirmasi
                                    </p>
                                    <h5 class="font-weight-bolder">{{ $countPembayaranTerkonfirmasi }}</h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 position-absolute end-0">
                                <div class="icon icon-shape bg-gradient-warning shadow-primary text-center rounded-circle">
                                    <i class="fa-solid fa-check-circle text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-flex h-100"
                    onclick="location.href='{{ route('admin.bookings.index', ['status' => 'Belum Dikembalikan']) }}'">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Belum dikembalikan
                                    </p>
                                    <h5 class="font-weight-bolder">{{ $countBelumDikembalikan }}</h5>
                                    <p class="mb-0 mt-auto">
                                        <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 position-absolute end-0">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fa-solid fa-window-restore text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-flex h-100">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Jenis Kendaraan
                                    </p>
                                    <h5 class="font-weight-bolder">{{ $countJenisKendaraan }}</h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+5%</span>
                                        than last month
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 position-absolute end-0">
                                <div class="icon icon-shape bg-gradient-dark shadow-primary text-center rounded-circle">
                                    <i class="fa-solid fa-gauge  text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-flex h-100">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Jumlah Kendaraan
                                    </p>
                                    <h5 class="font-weight-bolder">{{ $countJumlahKendaraan }}</h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                        since yesterday
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 position-absolute end-0">
                                <div class="icon icon-shape bg-gradient-info shadow-primary text-center rounded-circle">
                                    <i class="fa-solid fa-caravan text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-flex h-100" onclick="location.href='{{ route('admin.bookings.index') }}'">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="numbers bottom-0">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Total Sewa
                                    </p>
                                    <h5 class="font-weight-bolder">{{ $countBooking }}</h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 position-absolute end-0">
                                <div class="icon icon-shape bg-gradient-success shadow-primary text-center rounded-circle">
                                    <i class="fa-solid fa-rectangle-list text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-flex h-100" onclick="location.href='{{ route('admin.users.index') }}'">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        User
                                    </p>
                                    <h5 class="font-weight-bolder">{{ $countUser }}</h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 position-absolute end-0">
                                <div class="icon icon-shape bg-gradient-danger shadow-primary text-center rounded-circle">
                                    <i class="fa-solid fa-rectangle-list text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-flex h-100" onclick="location.href='{{ route('admin.contacts.index') }}'">
                    <div class="card-body d-flex flex-column p-3">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Pesan
                                    </p>
                                    <h5 class="font-weight-bolder">{{ $countHubungiKami }}</h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 position-absolute end-0">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fa-solid fa-envelope text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Sales overview</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">4% more</span> in 2021
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active"
                                style="background-image: url('https://images.unsplash.com/photo-1605756580041-21312e9fb2bc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">OtoRent | Ankavi Team</h5>
                                    <p>
                                        Tempat Persewaan Mobil dan Motor Nyaman, Aman dan Percaya !
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item h-100"
                                style="background-image: url('https://images.unsplash.com/photo-1682020245785-4619e7a89d2f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">
                                        Persewaan Mobil dan Motor
                                    </h5>
                                    <p>
                                        Nikmati perjalanan anda dengan armada terbaik dari kami !
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item h-100"
                                style="background-image: url('https://images.unsplash.com/photo-1558981806-ec527fa84c39?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bW90b3JjeWNsZXxlbnwwfHwwfHx8MA%3D%3D'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-trophy text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">
                                        Persewaan Mobil dan Motor
                                    </h5>
                                    <p>
                                        Tunggu apalagi? Sewa Sekarang juga !
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Sewa Terbaru</h6>
                        </div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0" id="data-table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xs font-weight-bolder">
                                        Nama
                                    </th>
                                    <th
                                        class="text-uppercase text-xs font-weight-bolder">
                                        Unit
                                    </th>
                                    <th
                                        class="text-uppercase text-xs font-weight-bolder">
                                        Durasi
                                    </th>
                                    <th
                                        class="text-uppercase text-xs font-weight-bolder">
                                        Total Biaya
                                    </th>
                                    <th
                                        class="text-uppercase text-xs font-weight-bolder">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $booking)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ Storage::url('avatars/' . $booking->user->avatar) }}"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">{{ $booking->user->name }}</h6>
                                                    <p class="text-xs mb-0">{{ $booking->user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $booking->vehicle_type == 'car' ? $booking->vehicle->nama_mobil : $booking->vehicle->nama_motor }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-xs font-weight-bold">{{ $booking->days_count }}
                                                Hari</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-xs font-weight-bold">Rp
                                                {{ number_format($booking->total_fee, 0, ',', '.') }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-xs font-weight-bold">{{ $booking->booking_status }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center">Data Kosong !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Ulasan terbaru</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0" id="data-table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xs font-weight-bolder">
                                        Nama
                                    </th>
                                    <th
                                        class="text-uppercase text-xs font-weight-bolder">
                                        Ulasan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($feedbacks as $feedback)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ Storage::url('avatars/' . $feedback->avatar) }}"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">{{ $feedback->user_name }}</h6>
                                                    <p class="text-xs mb-0">{{ $booking->user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $feedback->feedback }}
                                            </p>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center">Data Kosong !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <a href="{{ url('tentang-kami') }}" class="font-weight-bold" target="_blank">ANKAVI TEAM</a>
                            Kelompok 5 MSIB Fullstack #4
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@include('layouts.datatable')
