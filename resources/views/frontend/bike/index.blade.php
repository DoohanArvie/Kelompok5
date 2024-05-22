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
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" style="width: 50%; align-items:center" src="{{ asset('frontend/images/carousel/1fortuner.jpg') }}" alt="">
            </div>
            <hr>
        </div>
    </div>
    <!-- Header End -->
    {{-- <div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-5">
                    <div class="intro">
                        <h1><strong>Daftar Mobil</strong></h1>
                        <div class="custom-breadcrumbs">
                            <a href="index.html">Home</a> <span class="mx-2">/</span>
                            <strong>Daftar Mobil</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Property List Start -->
    {{-- <div class="container-xxl py-5"> --}}
        <div class="container-fluid px-5">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Daftar Mobil</h1>
                        <p>Temukan Mobil yang sesuai dengan kebutuhan dan preferensi Anda!</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Semua</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">SUV</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">MPV</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-4">Sedan</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-5">Hatchback</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($cars as $car)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href=""><img class="img-fluid" src="{{ Storage::url($car->image) }}"
                                                alt=""></a>
                                        {{-- <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div> --}}
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $car->type->nama }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">Rp. {{ number_format($car->price) }} / hari</h5>
                                        <a class="d-block h5 mb-2" href="">{{ $car->nama_mobil }}</a>
                                        <p><i class="text-primary me-2"></i>{{ $car->description }}</p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <div class="flex-fill text-center border-end py-3">
                                            <i class="fa-solid fa-person text-primary me-2"></i>{{ $car->penumpang }} Penumpang</div>
                                        <div class="flex-fill text-center border-end py-3">
                                            <i class="fa-solid fa-door-closed text-primary me-2"></i>{{ $car->pintu }} Pintu</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="">Cari Mobil Lainnya</a>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($cars as $car)
                            <div class="col-lg-4 col-md-6">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href=""><img class="img-fluid" src="{{ Storage::url($car->image) }}"
                                                alt=""></a>
                                        {{-- <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div> --}}
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $car->type->nama }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">Rp. {{ number_format($car->price) }} / hari</h5>
                                        <a class="d-block h5 mb-2" href="">{{ $car->nama_mobil }}</a>
                                        <p><i class="text-primary me-2"></i>{{ $car->description }}</p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-ruler-combined text-primary me-2"></i>{{ $car->penumpang }}
                                            Penumpang</small>
                                        <small class="flex-fill text-center border-end py-2">
                                            <i class="fa fa-solid fa-door-closed text-primary me-2"></i>{{ $car->pintu }} Pintu</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="">Cari Motor Lainnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
    <!-- Property List End -->

    {{-- <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="section-heading"><strong>Daftar Mobil</strong></h2>
                    <p class="mb-5">
                        Kami menyediakan berbagai macam mobil.
                    </p>
                </div>
            </div>

            <div class="row">
                @forelse($cars as $car)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="listing d-block align-items-stretch">
                            <div class="listing-img h-100 mr-4">
                                <img src="{{ Storage::url($car->image) }}" alt="Image" class="img-fluid" />
                            </div>
                            <div class="listing-contents h-100">
                                <h3>{{ $car->nama_mobil }}</h3>
                                <div class="rent-price">
                                    <strong>Rp{{ number_format($car->price, 0, ',', '.') }}</strong><span
                                        class="mx-1">/</span>hari
                                </div>
                                <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                    <div class="listing-feature pr-4">
                                        <span class="caption">Pintu:</span>
                                        <span class="number">{{ $car->pintu }}</span>
                                    </div>
                                    <div class="listing-feature pr-4">
                                        <span class="caption">Penumpang:</span>
                                        <span class="number">{{ $car->penumpang }}</span>
                                    </div>
                                </div>
                                <div>
                                    <p>
                                        {{ $car->description }}
                                    </p>
                                    <p>
                                        <a href="{{ route('car.show', $car) }}" class="btn btn-primary btn-sm">Sewa
                                            Sekarang</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="display-4 text-center mx-auto">Data yang anda cari kosong !</p>
                @endforelse
            </div>
        </div>
    </div> --}}
@endsection
