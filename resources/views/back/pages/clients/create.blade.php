@extends('back.layouts.master')

@section('title', 'Ajout Client')
@section('page-title', 'Ajouter Client')

@section('breadcrumb')
    <li class="breadcrumb-item active">Ajout Client</li>
@endsection
@section('content')

<div class="container mt-4">
    <div class="card shadow-lg p-4">

        <h3 class="mb-4">Ajouter un client</h3>

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

        <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">

                {{-- First Name --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           placeholder="Enter your firstname"
                           value="{{ old('name') }}"
                           required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Last Name --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text"
                           class="form-control"
                           name="lastname"
                           placeholder="Enter your lastname"
                           value="{{ old('lastname') }}"
                           required>
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>

                {{-- Adresse --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text"
                           class="form-control"
                           name="adresse"
                           placeholder="Enter your adresse"
                           value="{{ old('adresse') }}"
                           required>
                    <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
                </div>

                {{-- Phone --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="tel"
                           class="form-control"
                           name="phone"
                           placeholder="+(245) 451 45123"
                           value="{{ old('phone') }}"
                           required>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email"
                           class="form-control"
                           name="email"
                           placeholder="example@gmail.com"
                           value="{{ old('email') }}"
                           required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Date venue --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date d'arrivée</label>
                    <input type="date"
                           class="form-control"
                           name="date_venue"
                           value="{{ old('date_venue') }}"
                           required>
                    <x-input-error :messages="$errors->get('date_venue')" class="mt-2" />
                </div>

                {{-- Sexe --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sexe</label>
                    <select class="form-select"
                            name="sexe"
                            required>
                        <option value="">Choose sexe...</option>
                        <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>Femme</option>
                        <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>Homme</option>
                    </select>
                    <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
                </div>

            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
