<style>
    .nav-treeview {
  transition: max-height 0.5s ease-in-out;
  max-height: 0;
  overflow: hidden;
}

.nav-item.has-treeview:hover .nav-treeview {
  max-height: 500px; /* Atur sesuai kebutuhan tinggi maksimum sub-menu */
}

</style>

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/Manchester_United_FC_crest.svg/1200px-Manchester_United_FC_crest.svg.png" class="navbar-brand-img h-100" alt="main_logo" />
            <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active bg-primary text-white' : '' }}" href="{{ route('home') }}">
                    <i class="fa-solid fa-house text-info text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="fa-solid fa-user text-warning text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Users') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#kategoriCollapse" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="kategoriCollapse">
                    <i class="fa-solid fa-list text-success text-lg opacity-10"></i>
                    <span>
                        {{ __('Kategori') }}
                        
                    </span>
                </a>
                <div class="collapse" id="kategoriCollapse">
                    <div class="nav-item">
                        <a href="{{ route('admin.typemotorcycles.index') }}" class="nav-link {{ request()->routeIs('admin.typesmotorcycles.index') ? 'active bg-primary text-white' : '' }}">
                            <i class="fa-solid fa-motorcycle text-success text-lg opacity-10"></i>
                            <span>Kategori Motor</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('admin.types.index') }}" class="nav-link {{ request()->routeIs('admin.types.index') ? 'active bg-primary text-white' : '' }}">
                            <i class="fa-solid fa-car text-success text-lg opacity-10"></i>
                            <span>Kategori Mobil</span>
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a href="#kendaraanCollapse" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="kendaraanCollapse">
                    <i class="fa-solid fa-ring text-info text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">
                        Kendaraan
                    </span>
                </a>
                <div class="collapse" id="kendaraanCollapse">
                    <div class="nav-item">
                        <a href="{{ route('admin.motorcycles.index') }}" class="nav-link {{ request()->routeIs('admin.motorcycles.index') ? 'active bg-primary text-white' : '' }}">
                            <i class="fa-solid fa-motorcycle text-info text-lg opacity-10"></i>
                            <span class="nav-link-text ms-1">Motor</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('admin.cars.index') }}" class="nav-link {{ request()->routeIs('admin.cars.index') ? 'active bg-primary text-white' : '' }}">
                            <i class="fa-solid fa-car text-info text-lg opacity-10"></i>
                            <span class="nav-link-text ms-1">Mobil</span>
                        </a>
                    </div>
                    </div>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin.testimonials.index') }}">
                    <i class="fa-solid fa-quote-left text-danger text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Testimonial') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin.blogs.index') }}">
                    <i class="fa-solid fa-square-rss text-info text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Blog') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.teams.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin.teams.index') }}">
                    <i class="fa-solid fa-user-group text-success text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Team') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin.settings.index') }}">
                    <i class="fa-solid fa-gears text-warning text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Settings') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin.contacts.index') }}">
                    <i class="fa-solid fa-envelope text-danger text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Pesan') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin.bookings.index') }}">
                    <i class="fa-solid fa-calendar text-info text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Booking') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.drivers.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('admin.drivers.index') }}">
                    <i class="fa-solid fa-users-gear text-warning text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Driver') }}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Account pages
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fa-solid fa-user text-dark text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ Auth::user()->name }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    <i class="fa-solid fa-gears text-info text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Settings') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket text-danger text-lg opacity-10"></i>
                    <span class="nav-link-text ms-1">{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        {{-- <div class="card card-plain shadow-none" id="sidenavCard">
            
            <img class="w-50 mx-auto" src="../assets/img/illustrations/icon-documentation.svg"
                alt="sidebar_illustration" />
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to
            pro</a> --}}
    </div>
</aside>