<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header d-flex justify-content-between align-items-center">

            <!-- LOGO & HAMBURGER -->
            <div class="d-flex align-items-center">
                <div class="navbar-brand-box horizontal-logo">
                    <a href="" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('storage/back/assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('storage/back/assets/images/logo-dark.png') }}" alt="" height="17">
                        </span>
                    </a>
                    <a href="" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('storage/back/assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('storage/back/assets/images/logo-light.png') }}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon"><span></span><span></span><span></span></span>
                </button>
            </div>

            <!-- HEADER ITEMS -->
            <div class="d-flex align-items-center">

                <!-- Fullscreen -->
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="btnFullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <!-- Light/Dark mode -->
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>
                <!-- User dropdown -->
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('storage/back/assets/images/users/avatar-1.jpg') }}" 
                                 alt="avatar" class="rounded-circle me-2" width="40" height="40">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                    {{ Auth::check() ? Auth::user()->name : 'Invité' }}
                                </span>
                                
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                    {{ Auth::check() ? Auth::user()->email : '' }}
                                </span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">Bienvenue {{ Auth::check() ? Auth::user()->name : 'Invité' }}!</h6>
                        <a class="dropdown-item" href="{{ route('profile.create') }}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> Profile</a>
                       <a class="dropdown-item" href="{{ route('profile.create') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                            Déconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</header>


