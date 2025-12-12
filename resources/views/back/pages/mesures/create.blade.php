
@extends('back.layouts.master')
@section('title', 'Ajouter un forfait')
@section('content')
 <div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Ajouter une Mesure</h4>

                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="form-showcode" class="form-label text-muted">Show Code</label>
                        <input class="form-check-input code-switcher" type="checkbox" id="form-showcode">
                    </div>
                </div>
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
                <div class="live-preview">

                    <form method="POST" action="{{ route('mesure.store') }}">
                        @csrf
<input type="hidden" name="client_id" value="{{ $client_id }}">


                        <div class="row">

                            <!-- Encolure -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Encolure</label>
                                <input type="number" step="0.1" name="encolure" class="form-control" placeholder="Encolure">
                            </div>

                            <!-- Tour Poitrine -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Poitrine</label>
                                <input type="number" step="0.1" name="tr_poitrine" class="form-control" placeholder="Tour Poitrine">
                            </div>

                            <!-- Sous Poitrine -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Sous Poitrine</label>
                                <input type="number" step="0.1" name="tr_sous_poitrine" class="form-control" placeholder="Sous Poitrine">
                            </div>

                            <!-- Tour Taille -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Taille</label>
                                <input type="number" step="0.1" name="tr_taille" class="form-control" placeholder="Tour Taille">
                            </div>

                            <!-- Tour Bassin -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Bassin</label>
                                <input type="number" step="0.1" name="tr_bassin" class="form-control" placeholder="Tour Bassin">
                            </div>

                            <!-- Tour Cuisse -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Cuisse</label>
                                <input type="number" step="0.1" name="tr_cuisse" class="form-control" placeholder="Tour Cuisse">
                            </div>

                            <!-- Tour Ceinture -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Ceinture</label>
                                <input type="number" step="0.1" name="tr_ceinture" class="form-control" placeholder="Tour Ceinture">
                            </div>

                            <!-- Tour Bras -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Bras</label>
                                <input type="number" step="0.1" name="tr_bras" class="form-control" placeholder="Tour Bras">
                            </div>

                            <!-- Tour Manche -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Manche</label>
                                <input type="number" step="0.1" name="tr_manche" class="form-control" placeholder="Tour Manche">
                            </div>

                            <!-- Tour Bas -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Bas</label>
                                <input type="number" step="0.1" name="tr_bas" class="form-control" placeholder="Tour Bas">
                            </div>

                            <!-- Tour Tête -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Tête</label>
                                <input type="number" step="0.1" name="tr_tete" class="form-control" placeholder="Tour Tête">
                            </div>

                            <!-- Hauteur Poitrine -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Hauteur Poitrine</label>
                                <input type="number" step="0.1" name="hr_poitrine" class="form-control" placeholder="Hauteur Poitrine">
                            </div>

                            <!-- Hauteur Sous Poitrine -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Hauteur Sous Poitrine</label>
                                <input type="number" step="0.1" name="hr_sous_poitrine" class="form-control" placeholder="Hauteur Sous Poitrine">
                            </div>

                            <!-- Longueur Épaule -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Épaule</label>
                                <input type="number" step="0.1" name="lg_epaule" class="form-control" placeholder="Longueur Épaule">
                            </div>

                            <!-- Longueur Taille -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Taille</label>
                                <input type="number" step="0.1" name="lg_taille" class="form-control" placeholder="Longueur Taille">
                            </div>

                            <!-- Longueur Taille Dos -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Taille Dos</label>
                                <input type="number" step="0.1" name="lg_taille_dos" class="form-control" placeholder="Longueur Taille Dos">
                            </div>

                            <!-- Longueur Manche -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Manche</label>
                                <input type="number" step="0.1" name="lg_manche" class="form-control" placeholder="Longueur Manche">
                            </div>

                            <!-- Longueur Pantalon -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Pantalon</label>
                                <input type="number" step="0.1" name="lg_pantalon" class="form-control" placeholder="Longueur Pantalon">
                            </div>

                            <!-- Longueur Genoux -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Genoux</label>
                                <input type="number" step="0.1" name="lg_genoux" class="form-control" placeholder="Longueur Genoux">
                            </div>

                            <!-- Longueur Chemise -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Chemise</label>
                                <input type="number" step="0.1" name="lg_chemise" class="form-control" placeholder="Longueur Chemise">
                            </div>

                            <!-- Carrure Devant -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Carrure Devant</label>
                                <input type="number" step="0.1" name="carrure_devant" class="form-control" placeholder="Carrure Devant">
                            </div>

                            <!-- Carrure Dos -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Carrure Dos</label>
                                <input type="number" step="0.1" name="carrure_dos" class="form-control" placeholder="Carrure Dos">
                            </div>

                            <!-- Demi Dos -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Demi Dos</label>
                                <input type="number" step="0.1" name="demi_dos" class="form-control" placeholder="Demi Dos">
                            </div>

                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer la Mesure</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection