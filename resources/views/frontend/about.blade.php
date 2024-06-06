@extends('frontend.layout')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Tentang Kami</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Tentang Kami</li>
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

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="frontend/img/assets/assets-dedikasi.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Dedikasi Kami Untuk Anda</h1>
                    @foreach ($settings as $setting)
                        <p class="mb-4" style="text-align: justify">{{ $setting->tentang_perusahaan }}</p>
                    @endforeach
                    <p><i class="fa fa-check text-primary me-3"></i>Kendaraan yang selalu terjaga kebersihannya dan dalam
                        kondisi prima</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Pengemudi yang berpengalaman dan ramah</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Sistem pemesanan yang mudah dan cepat</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-3">Team Kami</h1>
                @foreach ($settings as $setting)
                    <p>{{ $setting->tentang_team }}</p>
                @endforeach
                <p></p>
            </div>
            <div class="row g-4 align-items-stretch">
                @foreach ($teams as $team)
                    <div class="col-lg-2 col-md-6 wow fadeInUp mx-auto" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden h-100">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ Storage::url($team->photo) }}" alt="">
                            </div>
                            <div class="container-fluid text-center p-4 mt-3">
                                <h5 class="fw-bold mb-3">{{ $team->nama }}</h5>
                                <h6 class="mb-2"><i>{{ $team->jabatan }}</i></h6>
                                <p class="fw-bold mb-3">{{ $team->bio }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Team End -->
@endsection
