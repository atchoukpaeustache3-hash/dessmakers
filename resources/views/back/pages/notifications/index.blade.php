<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('storage/back/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('storage/back/assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('storage/back/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('storage/back/assets/images/logo-light.png')}}" alt="" height="17">
            </span>
        </a>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <!-- USER INFO -->
            <div class="d-flex align-items-center p-3 mb-3 rounded bg-light text-dark">
                @php
                    $user = Auth::user();
                @endphp
                <img src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('storage/back/assets/images/users/avatar-1.jpg') }}"
                     alt="avatar" class="rounded-circle me-2" width="40" height="40">
                <div>
                    <div class="fw-bold">{{ $user->name ?? 'Utilisateur' }}</div>
                    <small class="text-muted">{{ $user->email ?? '' }}</small>
                </div>
            </div>

            <!-- MENU -->
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('home') }}">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <!-- Apprentis -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApprentis" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApprentis">
                        <i class="ri-user-line"></i> <span data-key="t-apprentis">Apprentis</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApprentis">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('apprentis.index') }}" class="nav-link" data-key="t-list">Liste</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('apprentis.create') }}" class="nav-link" data-key="t-add">Ajouter</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Mesures -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMesures" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMesures">
                        <i class="ri-file-list-line"></i> <span data-key="t-mesures">Mesures</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMesures">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('mesure.all') }}" class="nav-link" data-key="t-all">Toutes les mesures</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('client.create') }}" class="nav-link" data-key="t-add">Ajouter mesure</a>
                                {{-- Ici 0 peut être remplacé dynamiquement selon le client --}}
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Clients -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarClients" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarClients">
                        <i class="ri-group-line"></i> <span data-key="t-clients">Clients</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarClients">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('client.index') }}" class="nav-link" data-key="t-list">Liste</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('client.create') }}" class="nav-link" data-key="t-add">Ajouter client</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
