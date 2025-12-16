@extends('back.layouts.master')

@section('title', 'Détail Apprenti')
@section('page-title', 'Apprentis')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('apprentis.index') }}">Apprentis</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $apprenti->nom }} {{ $apprenti->prenom }}
    </li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="card shadow">

        {{-- HEADER --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                Détail de l’apprenti :
                <strong>{{ $apprenti->nom }} {{ $apprenti->prenom }}</strong>
            </h4>

            <a href="{{ route('apprentis.index') }}" class="btn btn-secondary btn-sm">
                <i class="ri-arrow-left-line"></i> Retour
            </a>
        </div>

        {{-- BODY --}}
        <div class="card-body">
            <div class="row">

                {{-- PHOTO --}}
                <div class="col-md-4 text-center">
                    @if($apprenti->photo)
                        <img src="{{ asset('storage/'.$apprenti->photo) }}"
                             class="img-fluid rounded shadow mb-3"
                             style="max-height: 300px;">
                    @else
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                             class="img-fluid rounded shadow mb-3"
                             style="max-height: 300px;">
                    @endif

                    <span class="badge {{ $apprenti->status ? 'bg-success' : 'bg-danger' }}">
                        {{ $apprenti->status ? 'Actif' : 'Inactif' }}
                    </span>
                </div>

                {{-- INFORMATIONS --}}
                <div class="col-md-8">
                    <div class="row g-3">

                        <div class="col-md-6"><strong>Nom :</strong> {{ $apprenti->nom }}</div>
                        <div class="col-md-6"><strong>Prénom :</strong> {{ $apprenti->prenom }}</div>
                        <div class="col-md-6"><strong>Sexe :</strong> {{ $apprenti->sexe }}</div>
                        <div class="col-md-6"><strong>Date de naissance :</strong> {{ $apprenti->date_naissance ?? '—' }}</div>
                        <div class="col-md-6"><strong>Adresse :</strong> {{ $apprenti->adresse ?? '—' }}</div>
                        <div class="col-md-6"><strong>Numéro du parent :</strong> {{ $apprenti->numero_parent ?? '—' }}</div>

                        <hr>

                        <div class="col-md-6"><strong>Option :</strong> {{ ucfirst($apprenti->option) }}</div>
                        <div class="col-md-6"><strong>Niveau d’étude :</strong> {{ $apprenti->niveau_etude ?? '—' }}</div>
                        <div class="col-md-6"><strong>Durée de formation :</strong>
                            {{ $apprenti->duree_formation ? $apprenti->duree_formation.' mois' : '—' }}
                        </div>
                        <div class="col-md-6"><strong>Date début :</strong> {{ $apprenti->date_debut_apprentissage ?? '—' }}</div>
                        <div class="col-md-6"><strong>Date fin :</strong> {{ $apprenti->date_fin_apprentissage ?? '—' }}</div>

                        <hr>

                        <div class="col-md-4">
                            <strong>Montant contrat :</strong><br>
                            {{ number_format($apprenti->montant_contrat, 0, ',', ' ') }} FCFA
                        </div>

                        <div class="col-md-4">
                            <strong>Avance payée :</strong><br>
                            {{ number_format($apprenti->avance_paye ?? 0, 0, ',', ' ') }} FCFA
                        </div>

                        {{-- RESTE A PAYER --}}
                        <div class="col-md-4">
                            <strong>Reste à payer :</strong><br>

                            @if($apprenti->reste_a_payer == 0)
                                <span class="fw-bold text-success">
                                    0 FCFA (Payé)
                                </span>
                            @else
                                <span class="fw-bold text-danger">
                                    {{ number_format($apprenti->reste_a_payer, 0, ',', ' ') }} FCFA
                                </span>

                                <form action="{{ route('apprentis.payer', $apprenti->id) }}"
                                      method="POST" class="mt-2">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="ri-money-dollar-circle-line me-1"></i>
                                        Payer le reste
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
