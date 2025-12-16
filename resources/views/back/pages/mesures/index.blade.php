@extends('back.layouts.master')

@section('title', 'Détail mesure')
@section('page-title', 'mesures')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="">Mesures  </a>
    </li>
    <li class="breadcrumb-item active">
    </li>
@endsection
@section('content')
 

@if ($mesures->isEmpty())
    <div class="alert alert-info text-center">
        Ce client n’a encore aucune mesure enregistrée.
    </div>
@else

<div class="d-flex justify-content-center flex-wrap gap-3 py-4">

    @foreach($mesures as $mesure)
    <div class="card shadow-lg h-100" style="width: 350px;">

        {{-- HEADER --}}
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold text-truncate">
                Mesures du client
            </h5>

            <div class="dropdown">
                <button class="btn btn-soft-secondary btn-sm" data-bs-toggle="dropdown">
                    <i class="ri-more-fill"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a href="{{ route('mesure.edit', $mesure->id) }}" class="dropdown-item">
                            <i class="ri-pencil-fill me-2"></i> Modifier
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- BODY --}}
        <div class="card-body p-4">

            <div class="mb-4 text-center">
                <h6 class="fw-bold mb-1">
                    <i class="ri-user-3-line me-1"></i>
                    {{ $mesure->client->name ?? '' }} {{ $mesure->client->lastname ?? '' }}
                </h6>
            </div>

            <div class="row g-3">

                <div class="col-md-6"><strong>Encolure :</strong> {{ $mesure->encolure }}</div>
                <div class="col-md-6"><strong>Tr. Poitrine :</strong> {{ $mesure->tr_poitrine }}</div>

                <div class="col-md-6"><strong>Tr. Sous Poitrine :</strong> {{ $mesure->tr_sous_poitrine }}</div>
                <div class="col-md-6"><strong>Tr. Taille :</strong> {{ $mesure->tr_taille }}</div>

                <div class="col-md-6"><strong>Tr. Bassin :</strong> {{ $mesure->tr_bassin }}</div>
                <div class="col-md-6"><strong>Tr. Cuisse :</strong> {{ $mesure->tr_cuisse }}</div>

                <div class="col-md-6"><strong>Tr. Ceinture :</strong> {{ $mesure->tr_ceinture }}</div>
                <div class="col-md-6"><strong>Tr. Bras :</strong> {{ $mesure->tr_bras }}</div>

                <div class="col-md-6"><strong>Tr. Manche :</strong> {{ $mesure->tr_manche }}</div>
                <div class="col-md-6"><strong>Tr. Bas :</strong> {{ $mesure->tr_bas }}</div>

                <div class="col-md-6"><strong>Tr. Tête :</strong> {{ $mesure->tr_tete }}</div>
                <div class="col-md-6"><strong>Hr. Poitrine :</strong> {{ $mesure->hr_poitrine }}</div>

                <div class="col-md-6"><strong>Hr. Sous Poitrine :</strong> {{ $mesure->hr_sous_poitrine }}</div>
                <div class="col-md-6"><strong>Lg. Épaule :</strong> {{ $mesure->lg_epaule }}</div>

                <div class="col-md-6"><strong>Lg. Taille :</strong> {{ $mesure->lg_taille }}</div>
                <div class="col-md-6"><strong>Lg. Taille Dos :</strong> {{ $mesure->lg_taille_dos }}</div>

                <div class="col-md-6"><strong>Lg. Manche :</strong> {{ $mesure->lg_manche }}</div>
                <div class="col-md-6"><strong>Lg. Pantalon :</strong> {{ $mesure->lg_pantalon }}</div>

                <div class="col-md-6"><strong>Lg. Genoux :</strong> {{ $mesure->lg_genoux }}</div>
                <div class="col-md-6"><strong>Lg. Chemise :</strong> {{ $mesure->lg_chemise }}</div>

                <div class="col-md-6"><strong>Carrure Devant :</strong> {{ $mesure->carrure_devant }}</div>
                <div class="col-md-6"><strong>Carrure Dos :</strong> {{ $mesure->carrure_dos }}</div>

                <div class="col-md-6"><strong>Demi Dos :</strong> {{ $mesure->demi_dos }}</div>

            </div>

        </div>
    </div>
 
    @endforeach

</div>


@endif

@endsection
