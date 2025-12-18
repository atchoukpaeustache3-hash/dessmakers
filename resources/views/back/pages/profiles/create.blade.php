@extends('back.layouts.master')

@section('title', 'Information Profile')
@section('page-title', 'Profile')

@section('breadcrumb')
    
    <li class="breadcrumb-item active">
       {{ Auth::check() ? Auth::user()->name : 'Invité' }}
    </li>
    <li class="breadcrumb-item">
        {{ Auth::check() ? Auth::user()->role : 'Invité' }}
    </li>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11 col-md-12">

                <!-- COVER -->
                <div class="profile-foreground position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg">
                        <img src="{{ asset('storage/back/assets/images/profile-bg.jpg')}}" alt="" class="profile-wid-img">
                    </div>
                </div>

                <!-- HEADER -->
                <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                    <div class="row g-4">
                        <div class="col-auto">
                            <div class="avatar-lg">
                                <img 
                                    src="{{ Auth::user()->photo 
                                            ? asset('storage/'.Auth::user()->photo) 
                                            : asset('storage/back/assets/images/users/avatar-1.jpg') }}"
                                    alt="user-img"
                                    class="img-thumbnail rounded-circle"
                                >
                            </div>
                        </div>

                        <div class="col">
                            <div class="p-2">
                                <h3 class="text-white mb-1">
                                    {{ Auth::user()->name }}
                                </h3>
                                <p class="text-white text-opacity-75">
                                    {{ Auth::user()->email }}
                                </p>
                                <div class="hstack text-white-50 gap-1">
                                    <div class="me-2">
                                        <i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>
                                        California, United States
                                    </div>
                                    <div>
                                        <i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>
                                        Themesbrand
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-auto order-last order-lg-0">
                            <div class="row text text-white-50 text-center">
                                <div class="col-lg-6 col-4">
                                    <div class="p-2">
                                        <h4 class="text-white mb-1">24.3K</h4>
                                        <p class="fs-14 mb-0">Followers</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-4">
                                    <div class="p-2">
                                        <h4 class="text-white mb-1">1.3K</h4>
                                        <p class="fs-14 mb-0">Following</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="d-flex profile-wrapper">
                                <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1">
                                    <li class="nav-item">
                                        <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab">
                                            <i class="ri-airplay-fill d-inline-block d-md-none"></i>
                                            <span class="d-none d-md-inline-block">Overview</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="flex-shrink-0">
                                    <a href="{{ route('profil.edit') }}" class="btn btn-success">
                                        <i class="ri-edit-box-line align-bottom"></i> Modifie Profile
                                    </a>
                                </div>
                            </div>

                            <div class="tab-content pt-4 text-muted">
                                <div class="tab-pane active" id="overview-tab">
                                    <div class="row">
                                        <div class="col-xxl-3">

                                            <!-- CHARGEMENT -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-5">Complete Your Profile</h5>
                                                    <div class="progress animated-progress custom-progress progress-label">
                                                        <div class="progress-bar bg-danger" style="width: 30%">
                                                            <div class="label">30%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- INFO -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Info</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="ps-0">
                                                                        <div class="row">

                                                                            <!-- GAUCHE (3 infos) -->
                                                                            <div class="col-md-6">
                                                                                <table class="table table-borderless mb-0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th class="ps-0">Nom :</th>
                                                                                            <td class="text-muted">{{ Auth::user()->name }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="ps-0">Prénom :</th>
                                                                                            <td class="text-muted">{{ Auth::user()->lastname }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="ps-0">Numéro :</th>
                                                                                            <td class="text-muted">{{ Auth::user()->numero }}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                            <!-- DROITE (reste des infos) -->
                                                                            <div class="col-md-6">
                                                                                <table class="table table-borderless mb-0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th class="ps-0">Role :</th>
                                                                                            <td class="text-muted">{{ Auth::user()->role }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="ps-0">Sexe :</th>
                                                                                            <td class="text-muted">{{ Auth::user()->sexe }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="ps-0">E-mail :</th>
                                                                                            <td class="text-muted">{{ Auth::user()->email }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="ps-0">Date Naissance :</th>
                                                                                            <td class="text-muted">{{ Auth::user()->created_at->format('d M Y') }}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
