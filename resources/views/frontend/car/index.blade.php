@extends('frontend.layout')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Daftar Mobil</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Daftar Mobil</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 wow slideInRight" data-wow-delay="0.3s">
                <img class="img-fluid" style="width: 100%; align-items:center"
                    src="{{ asset('frontend/img/header/header-3.jpg') }}" alt="">
            </div>
            <hr>
        </div>
    </div>
    <!-- Header End -->

    <!-- Property List Start -->
    <div class="container-fluid px-5">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Mobil</h1>
                    <p>Temukan Mobil yang sesuai dengan kebutuhan dan preferensi Anda!</p>
                </div>
            </div>
        </div>
        <div class="row g-4" id="car-list">
            <div class="col-lg-2 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <div class="text-start mb-2">
                    <i class="fa-solid fa-filter text-primary mb-2" style="font-size: 2rem"></i>
                    <h2 class="card-title">Filter Mobil</h2>
                </div>
                <div class="accordion" id="accordionFilters">
                    <!-- Filter Mobil -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingType">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseType" aria-expanded="true" aria-controls="collapseType">
                                Kategori Mobil
                            </button>
                        </h2>
                        <div id="collapseType" class="accordion-collapse collapse show" aria-labelledby="headingType"
                            data-bs-parent="#accordionFilters">
                            <div class="accordion-body">
                                <ul class="nav nav-pills flex-column mb-5">
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary active w-100" data-bs-toggle="pill"
                                            data-filter="all">Semua</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-filter="SUV">SUV</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-filter="MPV">MPV</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-filter="Sedan">Sedan</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-filter="Hatchback">Hatchback</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Filter Penumpang -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPassenger">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsePassenger" aria-expanded="false" aria-controls="collapsePassenger">
                                Seat Penumpang
                            </button>
                        </h2>
                        <div id="collapsePassenger" class="accordion-collapse collapse" aria-labelledby="headingPassenger"
                            data-bs-parent="#accordionFilters">
                            <div class="accordion-body">
                                <ul class="nav nav-pills flex-column mb-5">
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-passenger="all">Semua</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-passenger="2">2 Penumpang</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-passenger="4">4 Penumpang</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-passenger="8">8 Penumpang</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Filter Rentang Harga -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsePrice" aria-expanded="false" aria-controls="collapsePrice">
                                Rentang Harga
                            </button>
                        </h2>
                        <div id="collapsePrice" class="accordion-collapse collapse" aria-labelledby="headingPrice"
                            data-bs-parent="#accordionFilters">
                            <div class="accordion-body">
                                <ul class="nav nav-pills flex-column mb-5">
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-price-min="0" data-price-max="">Semua</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-price-min="0" data-price-max="100000">Rp 0 - 100.000</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-price-min="100000" data-price-max="200000">Rp. 100.000 -
                                            200.000</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-price-min="200000" data-price-max="300000">Rp. 200.000 -
                                            300.000</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-price-min="300000" data-price-max="400000">Rp. 300.000 -
                                            400.000</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-price-min="400000" data-price-max="500000">Rp. 400.000 -
                                            500.000</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill"
                                            data-price-min="500000" data-price-max="1000000">Rp. 500.000 -
                                            1.000.000</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row g-4">
                    @foreach ($cars as $car)
                        <div class="col-lg-3 col-md-6 car-item" data-category="{{ $car->type->nama }}"
                            data-passenger="{{ $car->penumpang }}">
                            <div class="property-item rounded overflow-hidden wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.4 }}s">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('storage/' . $car->image1) }}" alt="gambar-mobil">
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        {{ $car->type->nama }}
                                    </div>
                                </div>
                                <div class="p-4 property-content">
                                    <h5 class="text-primary mb-3 price">Rp. {{ number_format($car->price) }} / hari</h5>
                                    <a class="d-block h5 mb-2" href="">{{ $car->nama_mobil }}</a>
                                    <p style="text-align: justify"></i>{{ $car->description }}</p>
                                </div>
                                <div class="property-footer">
                                    <div class="d-flex justify-content-end p-4 pb-0">
                                        <a href="{{ route('car.show', $car->id) }}"
                                            class="btn btn-primary btn-pesan btn-lg">Pesan</a>
                                    </div>
                                    <div class="d-flex border-top mt-3">
                                        <div class="flex-fill text-center border-end py-3">
                                            <i class="fa-solid fa-person text-primary me-2"></i>{{ $car->penumpang }}
                                            Penumpang
                                        </div>
                                        <div class="flex-fill text-center py-3">
                                            <i class="fa-solid fa-door-closed text-primary me-2"></i>{{ $car->pintu }}
                                            Pintu
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
@endsection

@push('style-alt')
    <style>
        .property-item {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .property-content {
            flex-grow: 1;
        }

        .property-footer {
            margin-top: auto;
        }
    </style>
@endpush
@push('script-alt')
    <script>
        $(document).ready(function() {

            // Mencegah event bubbling pada klik tombol "Pesan"
            $('.btn-pesan').click(function(e) {
                e.stopPropagation();
            });

            // Filter berdasarkan kategori mobil
            $('[data-filter]').click(function() {
                var filterValue = $(this).attr('data-filter');
                if (filterValue === 'all') {
                    $('.car-item').show();
                } else {
                    $('.car-item').hide();
                    $('.car-item[data-category="' + filterValue + '"]').show();
                }
                // Hapus kelas 'active' dari semua tombol filter kategori dan tambahkan ke yang diklik
                $('[data-filter]').removeClass('active');
                $(this).addClass('active');
            });

            // Filter berdasarkan jumlah penumpang
            $('[data-passenger]').click(function() {
                var passengerValue = $(this).attr('data-passenger');
                if (passengerValue === 'all') {
                    $('.car-item').show();
                } else {
                    $('.car-item').hide();
                    $('.car-item[data-passenger="' + passengerValue + '"]').show();
                }
                // Hapus kelas 'active' dari semua tombol filter penumpang dan tambahkan ke yang diklik
                $('[data-passenger]').removeClass('active');
                $(this).addClass('active');
            });

            // Filter berdasarkan rentang harga
            $('[data-price-min]').click(function() {
                var minPrice = parseFloat($(this).attr('data-price-min'));
                var maxPrice = $(this).attr('data-price-max') ? parseFloat($(this).attr('data-price-max')) :
                    Infinity;

                $('.car-item').each(function() {
                    var priceText = $(this).find('.price').text();
                    var carPrice = parseFloat(priceText.replace(/[^0-9]/g, ''));
                    console.log(carPrice);
                    if (carPrice >= minPrice && carPrice <= maxPrice) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Hapus kelas 'active' dari semua tombol filter harga dan tambahkan ke yang diklik
                $('[data-price-min]').removeClass('active');
                $(this).addClass('active');
            });

        });
    </script>
@endpush
