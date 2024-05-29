@extends('frontend.layout')

@section('content')
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">OtoRent</span> Solusi Perjalanan Anda!
                </h1>
                <h5 class="animated fadeIn pb-2">Temukan Mobil dan Motor terbaik untuk setiap perjalanan Anda!</h5>
                <h5 class="animated fadeIn pb-2">Sewa sekarang dan rasakan kenyamanannya!</h5>
                <h4><i class="fa fa-check text-primary me-3"></i>Mudah</h4>
                <h4><i class="fa fa-check text-primary me-3"></i>Aman</h4>
                <h4><i class="fa fa-check text-primary me-3"></i>Nyaman</h4>
                <a href="" class="btn btn-primary mt-3 py-3 px-5 me-3 animated fadeIn">Pesan Sekarang</a>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset('frontend/img/carousel/carousel-1.jpg') }}" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset('frontend/img/carousel/carousel-calya.jpg') }}" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset('frontend/img/carousel/carousel-innova.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.3s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <h4 class="text-white mb-3">Rentang Harga</h4>
                                    <select class="form-select border-0 py-3">
                                        <option value="" hidden>Pilih Rentang Harga</option>
                                        <option value="200000-300000">Rp. 200.000 - Rp. 300.000</option>
                                        <option value="300000-400000">Rp. 300.000 - Rp. 400.000</option>
                                        <option value="400000-500000">Rp. 400.000 - Rp. 500.000</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="text-white mb-3">Kategori</h4>
                                    <select name="category_id" id="category_id" class="form-select border-0 py-3">
                                        <option value="" hidden>Pilih Kategori Mobil</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="text-white mb-3">Jumlah Penumpang</h4>
                                    <select class="form-select border-0 py-3">
                                        <option value="" hidden>Jumlah Penumpang</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button class="btn btn-dark border-0 w-100 py-3">Cari</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-4"><strong>Cara Pemesanan</strong></h1>
                <p class="lead mb-5">Langkah yang mudah untuk menyewa mobil</p>
            </div>
        </div>

        <div class="row text-center">
            @php
                $steps = [
                    [
                        'title' => 'Pilih Mobil',
                        'description' =>
                            'Pilih mobil yang sesuai dengan kebutuhan dan keinginan Anda dari berbagai pilihan yang tersedia.',
                    ],
                    [
                        'title' => 'Isi Form',
                        'description' =>
                            'Lengkapi formulir dengan informasi pribadi dan detail pemesanan Anda untuk melanjutkan proses.',
                    ],
                    [
                        'title' => 'Pembayaran',
                        'description' =>
                            'Lakukan pembayaran melalui metode yang tersedia untuk menyelesaikan proses pemesanan mobil Anda.',
                    ],
                ];
            @endphp
            @foreach ($steps as $index => $step)
                <div class="col-lg-4 mb-5">
                    <div class="card text-center wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-header">
                            <div class="fs-1 text-primary">{{ $index + 1 }}</div>
                        </div>
                        <div class="card-body">
                            <h3>{{ $step['title'] }}</h3>
                            <p>{{ $step['description'] }}</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 mb-5">
                    <div class="fs-1 text-primary">{{ $index + 1 }}</div>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['description'] }}</p>
                </div> --}}
            @endforeach
            <hr>
        </div>
    </div>


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Tipe Kendaraan</h1>
                <p>Jelajahi beberapa tipe kendaraan yang tersedia di sini</p>
            </div>
            @php
                $tipekendaraan = [
                    [
                        'title' => 'SUV',
                        'icons' => 'frontend/img/icon/icon-suv.png',
                    ],
                    [
                        'title' => 'MPV',
                        'icons' => 'frontend/img/icon/icon-mpv.png',
                    ],
                    [
                        'title' => 'Sedan',
                        'icons' => 'frontend/img/icon/icon-sedan.png',
                    ],
                    [
                        'title' => 'Hatchback',
                        'icons' => 'frontend/img/icon/icon-hatchback.png',
                    ],
                    [
                        'title' => 'Elektrik',
                        'icons' => 'frontend/img/icon/icon-elektrik.png',
                    ],
                    [
                        'title' => 'Matic',
                        'icons' => 'frontend/img/icon/icon-matic.png',
                    ],
                    [
                        'title' => 'Bebek',
                        'icons' => 'frontend/img/icon/icon-bebek.png',
                    ],
                    [
                        'title' => 'Sport',
                        'icons' => 'frontend/img/icon/icon-sport.png',
                    ],
                ];
            @endphp
            <div class="row g-4">
                @foreach ($tipekendaraan as $tipe)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" style="width: 50px;" src="{{ $tipe['icons'] }}" alt="Icon">
                                </div>
                                <h6>{{ $tipe['title'] }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category End -->

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
                    <p class="mb-4" style="text-align: justify">Kami percaya bahwa perjalanan Anda layak mendapatkan
                        yang
                        terbaik. Dengan armada yang berkualitas dan layanan pelanggan yang profesional, kami berkomitmen
                        untuk menghadirkan pengalaman berkendara yang luar biasa. Nikmati kenyamanan dan kemudahan dalam
                        setiap perjalanan Anda bersama kami dengan :</p>
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

    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Daftar Kendaraan</h1>
                        <p>Temukan kendaraan yang sesuai dengan kebutuhan dan preferensi Anda!</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Mobil</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">Motor</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($cars as $car)
                            <div class="col-lg-4 col-md-6 car-item" data-category="{{ $car->type->nama }}" data-passenger="{{ $car->penumpang }}">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <img class="img-fluid" src="{{ Storage::url($car->image) }}" alt="gambar-mobil">
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
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
                                            <a href="{{ route('car.show', $car->id) }}" class="btn btn-primary btn-pesan btn-lg">Pesan</a>
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
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="">Cari Mobil Lainnya</a>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($cars as $car)
                            <div class="col-lg-4 col-md-6 car-item" data-category="{{ $car->type->nama }}" data-passenger="{{ $car->penumpang }}">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <img class="img-fluid" src="{{ Storage::url($car->image) }}" alt="gambar-mobil">
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
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
                                            <a href="{{ route('car.show', $car->id) }}" class="btn btn-primary btn-pesan btn-lg">Pesan</a>
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
                        <div class="col-12 text-center" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="">Cari Motor Lainnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Testimoni Pelanggan Kami</h1>
                <p>Dengarkan apa yang pelanggan kami katakan:</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>{{ $testimonial->pesan }}</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded"
                                    src="{{ Storage::url($testimonial->profile) }}" alt=""
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">{{ $testimonial->name }}</h6>
                                    <small>{{ $testimonial->pekerjaan }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

  <!-- Faq Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5">
            <h1 class="mb-3">Pertanyaan Umum</h1>
        </div>
        <div class="accordion" id="accordionExample">
            <!-- Accordion Item 1 -->
            <div class="accordion-item mb-3">
                <div class="accordion-card card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="accordion-title">1. Bagaimana cara melakukan pemesanan mobil?</span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Kunjungi halaman pemesanan kami, Pilih jenis mobil yang diinginkan, pilih tanggal dan waktu
                            sewa. Setelah mengisi formulir pemesanan, Anda harus membayar biaya sewa dan admin akan
                            mengkonfirmasi sewa.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Item 2 -->
            <div class="accordion-item mb-3">
                <div class="accordion-card card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="accordion-title">2. Apa syarat dan ketentuan untuk menyewa mobil?</span>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Anda harus memiliki usia minimal 21 tahun. Memiliki SIM yang masih berlaku. Menyediakan
                            identitas yang valid, seperti KTP.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Item 3 -->
            <div class="accordion-item mb-3">
                <div class="accordion-card card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span class="accordion-title">3. Bagaimana metode pembayaran yang diterima?</span>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Kami menerima pembayaran dengan Transfer Rekening Bank.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Item 4 -->
            <div class="accordion-item mb-3">
                <div class="accordion-card card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <span class="accordion-title">4. Apakah ada biaya tambahan yang harus saya bayar?</span>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Biaya sewa mobil sudah termasuk dalam harga yang tertera. Namun, biaya seperti, biaya pengemudi
                            tambahan dan biaya bahan bakar kendaraan ditanggung penyewa.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Item 5 -->
            <div class="accordion-item mb-3">
                <div class="accordion-card card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <span class="accordion-title">5. Bagaimana kebijakan pembatalan?</span>
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Kebijakan pembatalan dapat bervariasi tergantung pada waktu pembatalan dan tipe penyewaan.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Item 6 -->
            <div class="accordion-item mb-3">
                <div class="accordion-card card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <span class="accordion-title">6. Apakah ada batasan jarak perjalanan?</span>
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Biasanya, kami memberikan jarak perjalanan yang tidak terbatas.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Item 7 -->
            <div class="accordion-item mb-3">
                <div class="accordion-card card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            <span class="accordion-title">7. Apakah saya dapat mengubah atau membatalkan pemesanan saya?</span>
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Untuk mengubah atau membatalkan pemesanan, silakan hubungi tim dukungan kami melalui email atau telepon.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Item 8 -->
            <div class="accordion-item">
                <div class="accordion-card card shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            <span class="accordion-title">8. Bagaimana cara menghubungi tim dukungan pelanggan?</span>
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Anda dapat menghubungi tim dukungan kami melalui nomor telepon atau email yang tercantum di halaman kontak kami.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq End -->





    <!-- Call to Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px solid rgba(0, 0, 0, .05);">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded w-100"
                                src="{{ asset('frontend/img/assets/assets-contact.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="mb-4">
                                <h1 class="mb-3">Hubungi Kami</h1>
                                <p style="text-align: justify">Kami siap membantu Anda merencanakan perjalanan dengan
                                    armada terbaik dan layanan pelanggan yang ramah dan profesional. Nikmati kenyamanan dan
                                    keamanan dengan kendaraan yang terawat dan pemesanan yang mudah bersama kami.</p>
                            </div>
                            <a href="" class="btn btn-primary py-3 px-4 me-2"><i
                                    class="fa fa-phone-alt me-2"></i>Telepon Kami</a>
                            <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Buat
                                Pemesanan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->
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
