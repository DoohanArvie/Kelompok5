@extends('frontend.layout')

@section('content')
<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-5">
                <div class="intro">
                    <h1><strong>Kontak</strong></h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{ url('/') }}" class="link-underline link-underline-opacity-0">Home</a> <span class="mx-2">/</span>
                        <strong>Kontak</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <div style="display:none;">
                    <h2>Kontak Kami</h2>
                    <p>Saran dan kritik yang kami harapkan</p>
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
            <div class="col-lg-8 mb-5">
                <div class="card card-contact px-4">
                    <div class="text-center btn bg-primary mx-6 shadow-lg text-white">
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
                                        <textarea name="pesan" id="pesan" class="form-control" placeholder="Pesan yang membangun." cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 mr-auto">
                                        <button type="submit" class="btn btn-block btn-primary text-white py-3 px-5" ><i class="fa-solid fa-paper-plane"></i>  Kirim Pesan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ml-auto">
                <div class="card-content">
                    <div class="bg-white p-3 p-md-5">
                        <div class="text-end">
                            <i class="fa fa-key fa-lg" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-black mb-4">Alamat Kami</h3>
                        <ul class="list-unstyled footer-link">
                            <li class="d-block mb-3">
                                <span class="d-block text-black">Alamat Lengkap:</span>
                                <span>{{ $setting->alamat ?? '-' }}</span>
                            </li>
                            <li class="d-block mb-3">
                                <span class="d-block text-black">Phone:</span>
                                <span>{{ $setting->phone ?? "-" }}</span>
                            </li>
                            <li class="d-block mb-3">
                                <span class="d-block text-black">Email:</span>
                                <span>{{ $setting->email ?? "-" }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection