<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3">
    {{-- <div class="container"> --}}
    @php
        $settings = \App\Models\Setting::first();
    @endphp
    <div class="p-2 me-2">
        @if ($settings && $settings->logo)
            <img class="img-fluid" src="{{ Storage::url($settings->logo) }}" alt="Icon"
                style="width: 50px; height: 50px;">
        @else
            <img class="img-fluid"
                src="https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/Manchester_United_FC_crest.svg/1200px-Manchester_United_FC_crest.svg.png"
                alt="Icon" style="width: 50px; height: 50px;">
        @endif
        {{-- <h1>DeMobil</h1> --}}
    </div>
    <h1 class="m-0 text-primary">{{ $settings->nama_perusahaan }}</h1>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">
            <div class="row">
                <div class="col-auto m-auto mx-3">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                </div>
                <div class="col-auto m-auto mx-3">
                    <div class="dropdown">
                        <a class="{{ request()->is('daftar-mobil', 'daftar-motor') ? 'active' : '' }} cursor-pointer dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kendaraan
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4"
                            aria-labelledby="dropdownMenuButton">
                            <a href="{{ url('daftar-mobil') }}"
                                class="dropdown-item {{ request()->is('daftar-mobil') ? 'active' : '' }}">Mobil</a>
                            <a href="{{ url('daftar-motor') }}"
                                class="dropdown-item {{ request()->is('daftar-motor') ? 'active' : '' }}">Motor</a>
                        </ul>
                    </div>
                </div>
                <div class="col-auto m-auto mx-3">
                    <a href="{{ url('tentang-kami') }}"
                        class=" {{ request()->is('tentang-kami') ? 'active' : '' }}">Tentang Kami</a>
                </div>
                <div class="col-auto m-auto mx-3">
                    <a href="{{ url('kontak') }}" class=" {{ request()->is('kontak') ? 'active' : '' }}">Kontak</a>
                </div>
                <div class="col-auto m-auto mx-3">
                    @auth
                        @if (auth()->user()->is_admin)
                            <a href="{{ route('home') }}">
                                Dashboard
                            </a>
                        @else
                            <!-- Jika pengguna bukan admin, tampilkan dropdown dengan tautan ke halaman profil dan opsi logout -->
                            <div class="dropdown">
                                <a class="dropdown-toggle {{ Request::is('profile', 'history') ? 'active' : '' }}"
                                    href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item {{ Request::is('profile') ? 'active' : '' }}"
                                        href="{{ route('profile.index') }}">
                                        Profil
                                    </a>
                                    <a class="dropdown-item {{ Request::is('history') ? 'active' : '' }}"
                                        href="{{ route('history.index') }}">
                                        Riwayat Sewa
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Keluar
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                                {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ Request::is('profile') ? 'active' : '' }}"
                                        href="{{ route('profile.index') }}">
                                        Profil
                                    </a>
                                    <a class="dropdown-item {{ Request::is('history') ? 'active' : '' }}"
                                        href="{{ route('history.index') }}">
                                        Riwayat Sewa
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Keluar
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div> --}}
                            </div>
                            {{-- </div> --}}
                        @endif
                    @else
                        {{-- <a class="nav-link" href="{{ route('login') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            Login
                        </a> --}}
                        <a href="{{ route('login') }}" class="btn btn-primary shadow-sm float-right">Login</a>
                    @endauth
                </div>
            </div>
        </ul>
    </div>
    {{-- </div> --}}
</nav>
<!-- End Navbar -->
