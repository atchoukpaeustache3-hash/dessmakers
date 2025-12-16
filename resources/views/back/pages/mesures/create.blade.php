@extends('back.layouts.master')
@section('title', 'Ajouter une mesure')
@section('content')

<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Ajouter une Mesure</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">

                <form id="mesureForm" method="POST" action="{{ route('mesure.store') }}">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ $client_id }}">

                    {{-- Étapes --}}
                    <div class="tab-stepper">
                        <div class="tab" style="display: block;">
                            <h5 class="mb-3">Mesures principales</h5>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Encolure</label>
                                    <input type="number" step="0.1" name="encolure" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Poitrine</label>
                                    <input type="number" step="0.1" name="tr_poitrine" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Sous Poitrine</label>
                                    <input type="number" step="0.1" name="tr_sous_poitrine" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Taille</label>
                                    <input type="number" step="0.1" name="tr_taille" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="tab" style="display: none;">
                            <h5 class="mb-3">Mesures jambes et bras</h5>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Bassin</label>
                                    <input type="number" step="0.1" name="tr_bassin" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Cuisse</label>
                                    <input type="number" step="0.1" name="tr_cuisse" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Ceinture</label>
                                    <input type="number" step="0.1" name="tr_ceinture" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Bras</label>
                                    <input type="number" step="0.1" name="tr_bras" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="tab" style="display: none;">
                            <h5 class="mb-3">Mesures manches et bas</h5>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Manche</label>
                                    <input type="number" step="0.1" name="tr_manche" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Bas</label>
                                    <input type="number" step="0.1" name="tr_bas" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tour Tête</label>
                                    <input type="number" step="0.1" name="tr_tete" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Hauteur Poitrine</label>
                                    <input type="number" step="0.1" name="hr_poitrine" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="tab" style="display: none;">
                            <h5 class="mb-3">Mesures dos et chemise</h5>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Hauteur Sous Poitrine</label>
                                    <input type="number" step="0.1" name="hr_sous_poitrine" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Longueur Épaule</label>
                                    <input type="number" step="0.1" name="lg_epaule" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Longueur Taille</label>
                                    <input type="number" step="0.1" name="lg_taille" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Longueur Taille Dos</label>
                                    <input type="number" step="0.1" name="lg_taille_dos" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="tab" style="display: none;">
                            <h5 class="mb-3">Mesures finales</h5>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Longueur Manche</label>
                                    <input type="number" step="0.1" name="lg_manche" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Longueur Pantalon</label>
                                    <input type="number" step="0.1" name="lg_pantalon" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Longueur Genoux</label>
                                    <input type="number" step="0.1" name="lg_genoux" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Longueur Chemise</label>
                                    <input type="number" step="0.1" name="lg_chemise" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Carrure Devant</label>
                                    <input type="number" step="0.1" name="carrure_devant" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Carrure Dos</label>
                                    <input type="number" step="0.1" name="carrure_dos" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Demi Dos</label>
                                    <input type="number" step="0.1" name="demi_dos" class="form-control">
                                </div>
                            </div>
                        </div>

                        {{-- Navigation --}}
                      <div class="d-flex justify-content-between mt-4">
                            <!-- Précédent à gauche -->
                            <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Précédent</button>

                            <!-- Suivant/Enregistrer à droite -->
                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                        </div>




                    </form>
            </div>
        </div>
    </div>
</div>

{{-- Script step by step --}}
<script>
let currentTab = 0;
showTab(currentTab);

function showTab(n) {
    let x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    document.getElementById("prevBtn").style.display = n === 0 ? "none" : "inline-block";
    document.getElementById("nextBtn").innerHTML = n === (x.length - 1) ? "Enregistrer" : "Suivant";
}

function nextPrev(n) {
    let x = document.getElementsByClassName("tab");
    // Validation simple (optionnel)
    // if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab += n;
    if (currentTab >= x.length) {
        document.getElementById("mesureForm").submit();
        return false;
    }
    showTab(currentTab);
}
</script>

@endsection
