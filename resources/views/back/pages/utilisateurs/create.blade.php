@extends('back.layouts.master')

@section('title', 'Ajout Utilisateur')
@section('page-title', 'Ajouter Utilisateur')

@section('breadcrumb')
    <li class="breadcrumb-item active">Ajout Utilisateur</li>
@endsection

@section('content')

<div class="container mt-4">
    <div class="card shadow-lg p-4">

        <h3 class="mb-4">Ajouter un utilisateur</h3>

        {{-- Affichage des erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('user.store') }}">
            @csrf

            <div class="row">

                {{-- Username --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           placeholder="Enter username"
                           value="{{ old('name') }}"
                           required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                 {{-- Lastname --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Prénom d'utilisateur</label>
                    <input type="text"
                           class="form-control"
                           name="lastname"
                           placeholder="Enter username"
                           value="{{ old('lastname') }}"
                           required>
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>
                 {{-- numero --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Numero</label>
                    <input type="text"
                           class="form-control"
                           name="numero"
                           placeholder="Enter username"
                           value="{{ old('numero') }}"
                           required>
                    <x-input-error :messages="$errors->get('numero')" class="mt-2" />
                </div>

                 {{-- Date Naissance --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date naissance</label>
                    <input type="date"
                           class="form-control"
                           name="date_naissance"
                           placeholder="Enter username"
                           value="{{ old('date_naissance') }}"
                           required>
                    <x-input-error :messages="$errors->get('date_naissance')" class="mt-2" />
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file"
                           class="form-control"
                           name="photo"
                           placeholder="Enter username"
                           value="{{ old('photo') }}"
                           >
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>

                 

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Adresse Email</label>
                    <input type="email"
                           class="form-control"
                           name="email"
                           placeholder="example@gmail.com"
                           value="{{ old('email') }}"
                           required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mot de passe</label>
                    <div class="position-relative">
                        <input type="password"
                               class="form-control pe-5"
                               name="password"
                               placeholder="Enter password"
                               required>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirm Password --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Confirmer mot de passe</label>
                    <input type="password"
                           class="form-control"
                           name="password_confirmation"
                           placeholder="Confirm password"
                           required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            <div class="col-md-6 mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="">-- Choisir --</option>
                                    <option value="Patron">Patron</option>
                                    <option value="Sous_patron">Sous patron</option>
                                    <option value="Administrateur">Administrateur</option>
                                </select>
                             <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
                <div class="col-md-6 mb-3">
                                <label>Sexe</label>
                                <select name="sexe" class="form-control">
                                    <option value="">-- Choisir --</option>
                                    <option value="femme">Femme</option>
                                    <option value="homme">Homme</option>
                                </select>
                             <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
                </div>
            </div>

            
            

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    Ajouter
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
