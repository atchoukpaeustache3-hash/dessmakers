@extends('back.layouts.master')

@section('title', 'Modifier mesure')
@section('page-title', 'mesure')

@section('breadcrumb')
    <li class="breadcrumb-item active">Modification mesure </li>
    
@endsection
@section('content')

<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Modifier une Mesure</h4>
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

                    <form method="POST" action="{{ route('mesure.update', $mesure->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Encolure</label>
                                <input type="number" step="0.1" name="encolure"
                                       value="{{ $mesure->encolure }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Poitrine</label>
                                <input type="number" step="0.1" name="tr_poitrine"
                                       value="{{ $mesure->tr_poitrine }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Sous Poitrine</label>
                                <input type="number" step="0.1" name="tr_sous_poitrine"
                                       value="{{ $mesure->tr_sous_poitrine }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Taille</label>
                                <input type="number" step="0.1" name="tr_taille"
                                       value="{{ $mesure->tr_taille }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Bassin</label>
                                <input type="number" step="0.1" name="tr_bassin"
                                       value="{{ $mesure->tr_bassin }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Cuisse</label>
                                <input type="number" step="0.1" name="tr_cuisse"
                                       value="{{ $mesure->tr_cuisse }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Ceinture</label>
                                <input type="number" step="0.1" name="tr_ceinture"
                                       value="{{ $mesure->tr_ceinture }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Bras</label>
                                <input type="number" step="0.1" name="tr_bras"
                                       value="{{ $mesure->tr_bras }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Manche</label>
                                <input type="number" step="0.1" name="tr_manche"
                                       value="{{ $mesure->tr_manche }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Bas</label>
                                <input type="number" step="0.1" name="tr_bas"
                                       value="{{ $mesure->tr_bas }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tour Tête</label>
                                <input type="number" step="0.1" name="tr_tete"
                                       value="{{ $mesure->tr_tete }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Hauteur Poitrine</label>
                                <input type="number" step="0.1" name="hr_poitrine"
                                       value="{{ $mesure->hr_poitrine }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Hauteur Sous Poitrine</label>
                                <input type="number" step="0.1" name="hr_sous_poitrine"
                                       value="{{ $mesure->hr_sous_poitrine }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Épaule</label>
                                <input type="number" step="0.1" name="lg_epaule"
                                       value="{{ $mesure->lg_epaule }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Taille</label>
                                <input type="number" step="0.1" name="lg_taille"
                                       value="{{ $mesure->lg_taille }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Taille Dos</label>
                                <input type="number" step="0.1" name="lg_taille_dos"
                                       value="{{ $mesure->lg_taille_dos }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Manche</label>
                                <input type="number" step="0.1" name="lg_manche"
                                       value="{{ $mesure->lg_manche }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Pantalon</label>
                                <input type="number" step="0.1" name="lg_pantalon"
                                       value="{{ $mesure->lg_pantalon }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Genoux</label>
                                <input type="number" step="0.1" name="lg_genoux"
                                       value="{{ $mesure->lg_genoux }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Longueur Chemise</label>
                                <input type="number" step="0.1" name="lg_chemise"
                                       value="{{ $mesure->lg_chemise }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Carrure Devant</label>
                                <input type="number" step="0.1" name="carrure_devant"
                                       value="{{ $mesure->carrure_devant }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Carrure Dos</label>
                                <input type="number" step="0.1" name="carrure_dos"
                                       value="{{ $mesure->carrure_dos }}" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Demi Dos</label>
                                <input type="number" step="0.1" name="demi_dos"
                                       value="{{ $mesure->demi_dos }}" class="form-control">
                            </div>

                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Modifier la Mesure</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
