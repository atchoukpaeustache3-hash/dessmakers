@extends('back.layouts.master')

@section('title', 'Modifier client')
@section('page-title', 'client')

@section('breadcrumb')
    <li class="breadcrumb-item active">Modification info de </li>
    <li class="breadcrumb-item active">
        {{ $client->nom }} {{ $client->prenom }}
    </li>
@endsection
@section('content')
<div class="container mt-4">

    <div class="card shadow-lg p-4">
        <h3 class="mb-4">Modifier le client</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('client.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- Nom --}}
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name"
                           class="form-control"
                           value="{{ old('name', $client->name) }}" required>
                </div>

                {{-- Prénom --}}
                <div class="col-md-6 mb-3">
                    <label for="lastname" class="form-label">Prénom</label>
                    <input type="text" name="lastname" id="lastname"
                           class="form-control"
                           value="{{ old('lastname', $client->lastname) }}">
                </div>

                {{-- Adresse --}}
                <div class="col-md-6 mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" name="adresse" id="adresse"
                           class="form-control"
                           value="{{ old('adresse', $client->adresse) }}">
                </div>

                {{-- Téléphone --}}
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" name="phone" id="phone"
                           class="form-control"
                           value="{{ old('phone', $client->phone) }}">
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                           class="form-control"
                           value="{{ old('email', $client->email) }}">
                </div>

                {{-- Sexe --}}
                <div class="col-md-6 mb-3">
                    <label for="sexe" class="form-label">Sexe</label>
                    <select id="sexe" name="sexe"
                            class="form-select" required>
                        <option value="homme" {{ old('sexe', $client->sexe) == 'homme' ? 'selected' : '' }}>Homme</option>
                        <option value="femme" {{ old('sexe', $client->sexe) == 'femme' ? 'selected' : '' }}>Femme</option>
                    </select>
                </div>

                {{-- Date venue --}}
                <div class="col-md-6 mb-3">
                    <label for="date_venue" class="form-label">Date de venue</label>
                    <input type="date" name="date_venue" id="date_venue"
                           class="form-control"
                           value="{{ old('date_venue', $client->date_venue) }}" required>
                </div>

            </div>

          <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    Mise à jour
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
