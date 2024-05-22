@extends('frontend.layout')

@section('content')

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Kontak Kami</h1> 
                <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Kontak Kami</li>
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

<div class="site-section container-fluid" id="contact-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
                <div style="">
                    <h2>Kontak Kami</h2>
                    <p>Saran dan kritik yang kami harapkan</p>
                </div>
                <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
                    <div class="card flex-fill text-center border hover-bg-enlarge">
                        <div class="card-body">
                            <span class="d-block mb-2"><i class="fas fa-phone fs-2"></i></span>
                            <h3 class="h5 mb-2">Phone Number</h3>
                            <a href="tel:(888)888-8888" class="text-decoration-none text-primary">{{ $setting->phone ?? "-" }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">
                    <div class="card flex-fill text-center border hover-bg-enlarge">
                        <div class="card-body">
                            <span class="d-block mb-2"><i class="fas fa-envelope fs-2"></i></span>
                            <h3 class="h5 mb-2">Email Address</h3>
                            <a href="mailto:johnsmith@example.com" class="text-decoration-none text-primary">{{ $setting->email ?? "-" }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                    <div class="card flex-fill text-center border hover-bg-enlarge">
                        <div class="card-body">
                            <span class="d-block mb-2"><i class="fas fa-map-marker-alt fs-2"></i></span>
                            <h3 class="h5 mb-2">Location</h3>
                            <a href="javascript:void(0);" class="text-decoration-none text-primary">{{ $setting->alamat ?? '-' }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="400">
                    <div class="card flex-fill text-center border hover-bg-enlarge">
                        <div class="card-body">
                            <span class="d-block mb-2"><i class="fas fa-clock fs-2"></i></span>
                            <h3 class="h5 mb-2">Opening Hours</h3>
                            <a href="javascript:void(0);" class="text-decoration-none text-primary">Setiap Hari Jam 09:00 - 17:00 WIB</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                @if(count($errors) > 0)
                <div class="content-header mb-0 pb-0">
                    <div class="container-fluid">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @if(session()->has('message'))
                <div class="content-header mb-0 pb-0">
                    <div class="container-fluid">
                        <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
    <div class="container-fluid col-lg-8 mb-5" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
        <div class="card card-contact px-4">
        <div class="text-center btn bg-primary mx-6 shadow-lg text-white" data-aos="slide-right" data-aos-duration="1400" data-aos-delay="120">
            <h3 class="card-title"><i class="fa-solid fa-file-signature"></i> Kontak Kami</h3>
        </div>

            <div><br></div>
            <div class="card-body">
                <div class="card-content">
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" class="form-control" name="nama_awal" placeholder="Nama Awal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-user-check"></i></span>
                                    <input type="text" name="nama_akhir" class="form-control" placeholder="Nama Akhir">
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope-open-text"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Alamat Email">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="pesan" id="pesan" class="form-control" placeholder="Pesan yang membangun." style="height: 200px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mr-auto my-2">
                                <button type="submit" class="btn btn-block btn-primary text-white py-3 px-5">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid col-lg-4" data-aos="slide-left" data-aos-duration="1400" data-aos-delay="120">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.8868016069787!2d106.75094027554906!3d-6.408580562677346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e9000be14ca9%3A0x7c2a25b97cb1d88c!2snigga%20cuci%20motor!5e0!3m2!1sid!2sid!4v1716311880489!5m2!1sid!2sid" width="100%" height="546" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

    </div>
</div>
      <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
-->

@endsection