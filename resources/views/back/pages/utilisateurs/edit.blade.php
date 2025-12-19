@extends('back.layouts.master')

@section('title', 'Modifier Utilisateur')
@section('page-title', 'Modifier Utilisateur')

@section('breadcrumb')
    <li class="breadcrumb-item active">Modifier Utilisateur</li>
@endsection

@section('content')

<div class="container mt-4">
    <div class="card shadow-lg p-4">

        <h3 class="mb-4">Modifier l'utilisateur</h3>

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

        <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- Nom --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" name="name"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                {{-- Prénom --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="lastname"
                           value="{{ old('lastname', $user->lastname) }}" required>
                </div>

                {{-- Numéro --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Numéro</label>
                    <input type="text" class="form-control" name="numero"
                           value="{{ old('numero', $user->numero) }}" required>
                </div>

                {{-- Date naissance --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" name="date_naissance"
                           value="{{ old('date_naissance', $user->date_naissance) }}" required>
                </div>

                {{-- Photo --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" class="form-control" name="photo">
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" name="email"
                           value="{{ old('email', $user->email) }}" required>
                </div>

                {{-- Rôle --}}
                <div class="col-md-6 mb-3">
                    <label>Rôle</label>
                    <select name="role" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Patron" {{ $user->role == 'Patron' ? 'selected' : '' }}>Patron</option>
                        <option value="Sous_patron" {{ $user->role == 'Sous_patron' ? 'selected' : '' }}>Sous patron</option>
                        <option value="Administrateur" {{ $user->role == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
                    </select>
                </div>

                {{-- Sexe --}}
                <div class="col-md-6 mb-3">
                    <label>Sexe</label>
                    <select name="sexe" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="homme" {{ $user->sexe == 'Homme' ? 'selected' : '' }}>Homme</option>
                        <option value="femme" {{ $user->sexe == 'Femme' ? 'selected' : '' }}>Femme</option>
                    </select>
                </div>

            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    Mettre à jour
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
