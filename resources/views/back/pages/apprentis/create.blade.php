@extends('back.layouts.master')

@section('title', 'Ajout Apprenti')
@section('page-title', 'Ajouter Apprenti')

@section('breadcrumb')
    <li class="breadcrumb-item active">Ajout Apprenti</li>
@endsection
@section('content')

<div class="row justify-content-center">
    <div class="col-xxl-10">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title mb-0">Ajouter un Apprenti</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger m-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">

                <form id="apprentiForm" method="POST"
                      action="{{ route('apprentis.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- STEP 1 --}}
                    <div class="tab">
                        <h5 class="mb-3">Informations personnelles</h5>
                        <div class="row form-section">
                            <div class="col-md-4 mb-3">
                                <label>Nom</label>
                                <input type="text" name="nom" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Prénom</label>
                                <input type="text" name="prenom" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Sexe</label>
                                <select name="sexe" class="form-control">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Date de naissance</label>
                                <input type="date" name="date_naissance" class="form-control">
                            </div>

                            <div class="col-md-8 mb-3">
                                <label>Adresse</label>
                                <input type="text" name="adresse" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- STEP 2 --}}
                    <div class="tab">
                        <h5 class="mb-3">Formation</h5>
                        <div class="row form-section">
                            <div class="col-md-4 mb-3">
                                <label>Option</label>
                                <select name="option" class="form-control">
                                    <option value="">-- Choisir --</option>
                                    <option value="stage">Stage</option>
                                    <option value="perfectionnement">Perfectionnement</option>
                                    <option value="formation">Formation</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Niveau d’étude</label>
                                <input type="text" name="niveau_etude" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Durée formation (mois)</label>
                                <input type="number" id="duree_formation"
                                       name="duree_formation" min="2"
                                       class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Date début</label>
                                <input type="date" id="date_debut"
                                       name="date_debut_apprentissage"
                                       class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Date fin (auto)</label>
                                <input type="date" id="date_fin"
                                       name="date_fin_apprentissage"
                                       class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 3 --}}
                    <div class="tab">
                        <h5 class="mb-3">Informations financières</h5>
                        <div class="row form-section">
                            <div class="col-md-4 mb-3">
                                <label>Montant contrat</label>
                                <input type="number" id="montant_contrat"
                                       name="montant_contrat"
                                       class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Avance payée</label>
                                <input type="number" id="avance_paye"
                                       name="avance_paye"
                                       class="form-control">
                                <small class="text-danger d-none" id="avanceError">
                                    L’avance ne peut pas dépasser le montant du contrat
                                </small>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Numéro parent</label>
                                <input type="text" name="numero_parent" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- STEP 4 --}}
                    <div class="tab">
                        <h5 class="mb-3">Photo & statut</h5>
                        <div class="row form-section">
                            <div class="col-md-6 mb-3">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Statut</label>
                                <select name="status" class="form-control">
                                    <option value="1">Actif</option>
                                    <option value="0">Inactif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- NAVIGATION --}}
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary"
                                id="prevBtn" onclick="nextPrev(-1)">Précédent</button>
                        <button type="button" class="btn btn-primary"
                                id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script>
let currentTab = 0;
const tabs = document.getElementsByClassName("tab");

showTab(currentTab);

function showTab(n) {
    // Cacher tous les tabs
    for (let i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
    }
    // Afficher le tab courant
    tabs[n].style.display = "block";

    document.getElementById("prevBtn").style.display = (n === 0) ? "none" : "inline-block";
    document.getElementById("nextBtn").innerHTML =
        (n === tabs.length - 1) ? "Enregistrer" : "Suivant";
}

function nextPrev(n) {
    currentTab += n;
    if (currentTab >= tabs.length) {
        document.getElementById("apprentiForm").submit();
        return;
    }
    if (currentTab < 0) currentTab = 0;
    showTab(currentTab);
}

/* DATE LOGIC */
const today = new Date().toISOString().split('T')[0];
date_debut.min = today;

function calculerDateFin() {
    const debut = new Date(date_debut.value);
    const duree = parseInt(duree_formation.value);

    if (!isNaN(debut) && duree >= 2) {
        debut.setMonth(debut.getMonth() + duree);
        date_fin.value = debut.toISOString().split('T')[0];
    }
}

date_debut.addEventListener('change', calculerDateFin);
duree_formation.addEventListener('input', calculerDateFin);

/* AVANCE <= MONTANT */
avance_paye.addEventListener('input', () => {
    if (parseFloat(avance_paye.value) > parseFloat(montant_contrat.value)) {
        avanceError.classList.remove('d-none');
        avance_paye.value = '';
    } else {
        avanceError.classList.add('d-none');
    }
});
</script>

@endsection
