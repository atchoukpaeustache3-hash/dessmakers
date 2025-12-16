@extends('back.layouts.master')

@section('title', 'Modifier Apprenti')
@section('page-title', 'Apprentis')

@section('breadcrumb')
    <li class="breadcrumb-item active">Modification info de </li>
    <li class="breadcrumb-item active">
        {{ $apprenti->nom }} {{ $apprenti->prenom }}
    </li>
@endsection
@section('content')
<div class="container mt-4">

    <div class="card shadow-lg p-4">
        <h3 class="mb-4">Modifier l'apprenti</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('apprentis.update', $apprenti->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- Nom --}}
                <div class="col-md-6 mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control"
                           value="{{ old('nom', $apprenti->nom) }}" required>
                </div>

                {{-- Prénom --}}
                <div class="col-md-6 mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control"
                           value="{{ old('prenom', $apprenti->prenom) }}" required>
                </div>

                {{-- Sexe --}}
                <div class="col-md-6 mb-3">
                    <label for="sexe" class="form-label">Sexe</label>
                    <select name="sexe" id="sexe" class="form-select" required>
                        <option value="Homme" {{ old('sexe', $apprenti->sexe) == 'Homme' ? 'selected' : '' }}>Homme</option>
                        <option value="Femme" {{ old('sexe', $apprenti->sexe) == 'Femme' ? 'selected' : '' }}>Femme</option>
                    </select>
                </div>

                {{-- Date de naissance --}}
                <div class="col-md-6 mb-3">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                    <input type="date" name="date_naissance" id="date_naissance" class="form-control"
                           value="{{ old('date_naissance', $apprenti->date_naissance) }}">
                </div>

                {{-- Adresse --}}
                <div class="col-md-6 mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="form-control"
                           value="{{ old('adresse', $apprenti->adresse) }}">
                </div>

                {{-- Option --}}
                <div class="col-md-6 mb-3">
                    <label for="option" class="form-label">Option</label>
                    <select name="option" id="option" class="form-select" required>
                        <option value="stage" {{ old('option', $apprenti->option) == 'stage' ? 'selected' : '' }}>Stage</option>
                        <option value="perfectionnement" {{ old('option', $apprenti->option) == 'perfectionnement' ? 'selected' : '' }}>Perfectionnement</option>
                        <option value="formation" {{ old('option', $apprenti->option) == 'formation' ? 'selected' : '' }}>Formation</option>
                    </select>
                </div>

                {{-- Niveau d'étude --}}
                <div class="col-md-6 mb-3">
                    <label for="niveau_etude" class="form-label">Niveau d'étude</label>
                    <input type="text" name="niveau_etude" id="niveau_etude" class="form-control"
                           value="{{ old('niveau_etude', $apprenti->niveau_etude) }}">
                </div>

                {{-- Durée formation --}}
                <div class="col-md-6 mb-3">
                    <label for="duree_formation" class="form-label">Durée de la formation (en mois)</label>
                    <input type="number" name="duree_formation" id="duree_formation" class="form-control"
                           value="{{ old('duree_formation', $apprenti->duree_formation) }}" min="1">
                </div>

                {{-- Date début --}}
                <div class="col-md-6 mb-3">
                    <label for="date_debut_apprentissage" class="form-label">Date de début</label>
                    <input type="date" name="date_debut_apprentissage" id="date_debut_apprentissage" class="form-control"
                           value="{{ old('date_debut_apprentissage', $apprenti->date_debut_apprentissage) }}">
                </div>

                {{-- Date fin --}}
                <div class="col-md-6 mb-3">
                    <label for="date_fin_apprentissage" class="form-label">Date de fin</label>
                    <input type="date" name="date_fin_apprentissage" id="date_fin_apprentissage" class="form-control"
                           value="{{ old('date_fin_apprentissage', $apprenti->date_fin_apprentissage) }}">
                </div>

                {{-- Montant contrat --}}
                <div class="col-md-6 mb-3">
                    <label for="montant_contrat" class="form-label">Montant du contrat</label>
                    <input type="number" name="montant_contrat" id="montant_contrat" class="form-control"
                           value="{{ old('montant_contrat', $apprenti->montant_contrat) }}" min="0" required>
                </div>

                {{-- Avance payée --}}
                <div class="col-md-6 mb-3">
                    <label for="avance_paye" class="form-label">Avance payée</label>
                    <input type="number" name="avance_paye" id="avance_paye" class="form-control"
                           value="{{ old('avance_paye', $apprenti->avance_paye) }}" min="0">
                </div>

                {{-- Reste à payer (readonly) --}}
                <div class="col-md-6 mb-3">
                    <label for="reste_a_payer" class="form-label">Reste à payer</label>
                    <input type="number" id="reste_a_payer" class="form-control" 
                           value="{{ old('reste_a_payer', $apprenti->montant_contrat - ($apprenti->avance_paye ?? 0)) }}" readonly>
                </div>

                {{-- Numéro parent --}}
                <div class="col-md-6 mb-3">
                    <label for="numero_parent" class="form-label">Numéro du parent</label>
                    <input type="text" name="numero_parent" id="numero_parent" class="form-control"
                           value="{{ old('numero_parent', $apprenti->numero_parent) }}">
                </div>

                {{-- Photo --}}
                <div class="col-md-6 mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @if($apprenti->photo)
                        <img src="{{ asset('storage/' . $apprenti->photo) }}" alt="Photo apprenti" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>

                {{-- Status --}}
              

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
