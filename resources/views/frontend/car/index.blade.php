@extends('frontend.layout')

@section('content')
    <!-- Header Start -->
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
            margin-top: auto; /* Ensures the footer is at the bottom */
        }

        .car-item img {
            max-width: 100%;
            height: auto;
        }
    </style>
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
            <div class="col-md-6 wow slideInRight" data-wow-delay="0.3s" >
                <img class="img-fluid" style="width: 100%; align-items:center" src="{{ asset('frontend/img/header/header-3.jpg') }}" alt="">
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
            <div class="col-lg-10">
                <div class="row">
                    @foreach ($cars as $car)
                        <div class="col-lg-3 col-md-6 car-item" data-category="{{ $car->type->nama }}" data-passenger="{{ $car->penumpang }}">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid" src="{{ Storage::url($car->image) }}" alt=""></a>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        {{ $car->type->nama }}
                                    </div>
                                </div>
                                <div class="p-4 property-content">
                                    <h5 class="text-primary mb-3">Rp. {{ number_format($car->price) }} / hari</h5>
                                    <a class="d-block h5 mb-2" href="">{{ $car->nama_mobil }}</a>
                                    <p><i class="text-primary me-2"></i>{{ $car->description }}</p>
                                </div>
                                <div class="property-footer p-4 pb-0">
                                    <div class="d-flex justify-content-end">
                                        <a href="#" class="btn btn-warning">Pesan</a>
                                    </div>
                                    <div class="d-flex border-top mt-3">
                                        <div class="flex-fill text-center border-end py-3">
                                            <i class="fa-solid fa-person text-primary me-2"></i>{{ $car->penumpang }} Penumpang
                                        </div>
                                        <div class="flex-fill text-center border-end py-3">
                                            <i class="fa-solid fa-door-closed text-primary me-2"></i>{{ $car->pintu }} Pintu
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-2 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <div class="accordion" id="accordionFilters">
                    <!-- Filter Mobil -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingType">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseType" aria-expanded="true" aria-controls="collapseType">
                                Kategori Mobil
                            </button>
                        </h2>
                        <div id="collapseType" class="accordion-collapse collapse show" aria-labelledby="headingType" data-bs-parent="#accordionFilters">
                            <div class="accordion-body">
                                <ul class="nav nav-pills flex-column mb-5">
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary active w-100" data-bs-toggle="pill" data-filter="all">Semua</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill" data-filter="SUV">SUV</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill" data-filter="MPV">MPV</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill" data-filter="Sedan">Sedan</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill" data-filter="Hatchback">Hatchback</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Filter Penumpang -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingPassenger">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePassenger" aria-expanded="false" aria-controls="collapsePassenger">
                                Seat Penumpang
                            </button>
                        </h2>
                        <div id="collapsePassenger" class="accordion-collapse collapse" aria-labelledby="headingPassenger" data-bs-parent="#accordionFilters">
                            <div class="accordion-body">
                                <ul class="nav nav-pills flex-column mb-5">
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill" data-passenger="all">Semua</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill" data-passenger="2">2 Penumpang</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill" data-passenger="4">4 Penumpang</button>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <button class="btn btn-outline-primary w-100" data-bs-toggle="pill" data-passenger="8">8 Penumpang</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButtons = document.querySelectorAll('[data-filter]');
            const passengerButtons = document.querySelectorAll('[data-passenger]');
            const carItems = document.querySelectorAll('.car-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const filter = this.getAttribute('data-filter');

                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    carItems.forEach(item => {
                        if (filter === 'all' || item.getAttribute('data-category') === filter) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            passengerButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const passenger = this.getAttribute('data-passenger');

                    passengerButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    carItems.forEach(item => {
                        if (passenger === 'all' || parseInt(item.getAttribute('data-passenger')) === parseInt(passenger)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
