@extends('frontend.layout')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-7">
                <div id="carouselExample" class="carousel slide carousel-fade wow fadeInUp" data-wow-delay="0.1s">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $cars->image1) }}" class="d-block img-fluid w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $cars->image2) }}" class="d-block img-fluid w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $cars->image3) }}" class="d-block img-fluid w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $cars->image4) }}" class="d-block img-fluid w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="row mt-2 wow slideInLeft" data-wow-delay="0.1s">
                    <div class="col-3 thumbnail">
                        <img src="{{ asset('storage/' . $cars->image1) }}" class="img-fluid" data-bs-target="#carouselExample"
                            data-bs-slide-to="0" alt="...">
                    </div>
                    <div class="col-3 thumbnail">
                        <img src="{{ asset('storage/' . $cars->image2) }}" class="img-fluid" data-bs-target="#carouselExample"
                            data-bs-slide-to="1" alt="...">
                    </div>
                    <div class="col-3 thumbnail">
                        <img src="{{ asset('storage/' . $cars->image3) }}" class="img-fluid" data-bs-target="#carouselExample"
                            data-bs-slide-to="2" alt="...">
                    </div>
                    <div class="col-3 thumbnail">
                        <img src="{{ asset('storage/' . $cars->image4) }}" class="img-fluid" data-bs-target="#carouselExample"
                            data-bs-slide-to="3" alt="...">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-3">
                <div class="card p-4 wow slideInRight" data-wow-delay="0.1s">
                    <h1>{{ $cars->nama_mobil }}</h1>
                    <div class="row">
                        <div class="col">
                            <p class="lead mb-0">Rp. {{ number_format($cars->price) }} / hari</p>
                        </div>
                        <div class="col">
                        @php
                            $averageRating = $feedbacks->avg('rating');
                            $roundedRating = round($averageRating);
                        @endphp

                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $roundedRating)
                                <i class="fas fa-star text-warning"></i>
                            @else
                                <i class="fas fa-star text-secondary"></i>
                            @endif
                        @endfor
                        <span class="ms-2">{{ number_format($averageRating, 1) }}</span>
                    </div>
                    </div>
                    <div class="row mt-3">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-car text-primary custom-icon me-2"></i>
                                    <span class="badge bg-primary">
                                        {{ $cars->type->nama }}
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-user text-primary custom-icon me-2"></i>
                                    <span class="badge bg-primary">
                                        {{ $cars->penumpang }} Penumpang
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="description">
                        <h5><strong>Deskripsi</strong></h5>
                        <p class="text-muted" style="text-align: justify">{{ $cars->description }}</p>
                    </div>
                    <hr>
                    @auth
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        {{-- <a href="{{ route('check_availability', ['car_id' => $cars->id]) }}" class="btn btn-primary">Cek Ketersediaan</a> --}}
                        <a href="{{ route('check_availability', ['vehicle_type' => 'car', 'vehicle_id' => $cars->id]) }}" class="btn btn-primary">Cek Ketersediaan Mobil</a>
                    </div>
                    @else
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="{{ url('/login') }}" class="btn btn-primary">Login untuk menyewa</a>
                    </div>
                    @endauth
                </div>
            </div>
            <div class="row mt-5">
                <!-- Testimonial Start -->
                <div class="mx-auto mb-1 wow fadeInUp" data-wow-delay="0.1s">
                    <h3>Ulasan Pelanggan Kami</h3>
                </div>
                
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach($feedbacks as $feedback)
                    <div class="testimonial-item rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>{{ $feedback->feedback }}</p>
                            <div class="col mb-3">
                                @for ($i = 0; $i < $feedback->rating; $i++)
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                                @for ($i = $feedback->rating; $i < 5; $i++)
                                    <i class="fas fa-star text-secondary"></i>
                                @endfor
                                <span class="ms-2">{{ $feedback->rating }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded"
                                    src="{{ asset('storage/avatars/' . $feedback->avatar) }}"
                                    alt="" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">{{ $feedback->user_name }}</h6>
                                    <small>{{ $feedback->created_at->format('M d, Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>

    </div>


    {{-- <div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-5">
                    <div class="intro">
                        <h1><strong>{{ $cars->nama_mobil }}</strong></h1>
                        <div class="custom-breadcrumbs">
                            <a href="index.html">Home</a>
                            <span class="mx-2">/</span>
                            <strong>{{ $cars->nama_mobil }}</strong>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if (count($errors) > 0)
                        <div class="content-header mb-0 pb-0">
                            <div class="container-fluid">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <ul class="p-0 m-0" style="list-style: none;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="content-header mb-0 pb-0">
                            <div class="container-fluid">
                                <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show"
                                    role="alert">
                                    <strong>{{ session()->get('message') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div><!-- /.container-fluid -->
                        </div>
                    @endif
                    <h2 class="section-heading"><strong>ISI DATA ANDA</strong></h2>
                    <div class="card p-5">
                        <form action="{{ route('car.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $cars->id }}">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                    class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <input type="text" name="alamat_lengkap" value="{{ old('alamat_lengkap') }}"
                                    class="form-control" id="alamat">
                            </div>
                            <div class="form-group">
                                <label for="nomer_wa">Nomer Hp/Whatsapp</label>
                                <input type="string" name="nomer_wa" value="{{ old('nomer_wa') }}" class="form-control"
                                    id="nomer_wa">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@push('style-alt')
    <style>
        .thumbnail {
            object-fit: cover;
            cursor: pointer;
        }

        .img-fluid {
            height: auto;
            border-radius: 10px;
        }

        .custom-icon {
            font-size: 1.5rem;
        }
    </style>
@endpush
