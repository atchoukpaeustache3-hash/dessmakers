@extends('back.layouts.master')

@section('title', 'Information Profile')
@section('page-title', 'Profile')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="">Modifier profile de </a>
    </li>
    <li class="breadcrumb-item active">
       {{ Auth::user()->name }}
    </li>
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- CENTRAGE -->
        <div class="row justify-content-center">
            <div class="col-xxl-10 col-xl-11 col-lg-12">

                <!-- COVER + PHOTO DE PROFIL -->
                <div class="position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg profile-setting-img">
                        <img src="{{ asset('storage/back/assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
                        <div class="overlay-content">
                            <div class="text-end p-3">
                                <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                    <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                                    <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                        <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PHOTO PROFIL -->
                    <div class="text-center mt-3">
                        <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                                <img id="previewProfileImage"
                                     src="{{ Auth::user()->photo ? asset('storage/'.Auth::user()->photo) : asset('storage/back/assets/images/users/avatar-1.jpg') }}"
                                     class="rounded-circle avatar-xl img-thumbnail"
                                     alt="user-profile-image">

                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" name="photo" type="file" class="profile-img-file-input" onchange="previewProfileImage(event)">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </form>

                        <h5 class="fs-16 mb-1">{{ Auth::user()->name }}</h5>
                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <div class="row mt-4">

                    <!-- CÔTÉ GAUCHE : PROGRESS -->
                    <div class="col-xxl-3">
                        <div class="card mt-n5">
                            <div class="card-body text-center">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Complete Your Profile</h5>
                                        <div class="progress animated-progress custom-progress progress-label">
                                            <div class="progress-bar bg-danger" style="width: 30%">
                                                <div class="label">30%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- CÔTÉ DROITE : DETAILS -->
                    <div class="col-xxl-9">
                        <div class="card mt-xxl-n5">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails">Personal Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword">Change Password</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">

                                    <!-- MODIFIER NOM -->
                                    <div class="tab-pane active" id="personalDetails">
                                        <form action="{{ route('profile.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <label class="form-label">Nom</label>
                                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Prenom</label>
                                                    <input type="text" name="lastname" class="form-control" value="{{ Auth::user()->lastname }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Numéro</label>
                                                    <input type="text" name="numero" class="form-control" value="{{ Auth::user()->numero }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Date naissance</label>
                                                    <input type="date" name="date_naissance" class="form-control" value="{{ Auth::user()->date_naissance }}">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                                </div>

                                                <div class="col-lg-12 text-end mt-3">
                                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- MODIFIER MOT DE PASSE -->
                                    <div class="tab-pane" id="changePassword">
                                        <form action="{{ route('profile.password.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row g-3">
                                                <div class="col-lg-4">
                                                    <label class="form-label">Ancien mot de passe</label>
                                                    <input type="password" name="current_password" class="form-control">
                                                </div>

                                                <div class="col-lg-4">
                                                    <label class="form-label">Nouveau mot de passe</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>

                                                <div class="col-lg-4">
                                                    <label class="form-label">Confirmation</label>
                                                    <input type="password" name="password_confirmation" class="form-control">
                                                </div>

                                                <div class="col-lg-12 text-end mt-3">
                                                    <button type="submit" class="btn btn-success">Changer le mot de passe</button>
                                                </div>
                                            </div>
                                        </form>
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

<!-- JS pour preview instantané -->
<script>
function previewProfileImage(event) {
    const input = event.target;
    const reader = new FileReader();

    reader.onload = function(){
        const preview = document.getElementById('previewProfileImage');
        preview.src = reader.result;
    }

    if(input.files && input.files[0]){
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection
