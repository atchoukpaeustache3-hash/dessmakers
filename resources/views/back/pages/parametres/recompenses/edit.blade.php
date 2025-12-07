@extends('back.layouts.master')
@section('title', 'Paramètres des Récompenses')
@section('content')

    <div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('settingrewards.update', $settingreward) }}" up-target=".main">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label for="setting_name">Nom de la configuration</label>
                                <input name="setting_name" type="text" class="form-control @error('setting_name') is-invalid @enderror" value="{{ old('setting_name', $settingreward->setting_name) }}" placeholder="Ex : Récompense parrainage">
                                @error('setting_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="critere_type">Type de critère</label>
                                <select name="critere_type" class="form-control @error('critere_type') is-invalid @enderror">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="monthly_amount" {{ old('critere_type', $settingreward->critere_type) == 'monthly_amount' ? 'selected' : '' }}>Montant mensuel</option>
                                    <option value="number_referrals" {{ old('critere_type', $settingreward->critere_type) == 'number_referrals' ? 'selected' : '' }}>Nombre de parrainages</option>
                                </select>
                                @error('critere_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="critere_value">Valeur du critère</label>
                                <input name="critere_value" type="number" class="form-control @error('critere_value') is-invalid @enderror" value="{{ old('critere_value', $settingreward->critere_value) }}" placeholder="Ex : 10000">
                                @error('critere_value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="periode_type">Période</label>
                                <select name="periode_type" class="form-control @error('periode_type') is-invalid @enderror">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="daily" {{ old('periode_type', $settingreward->periode_type) == 'daily' ? 'selected' : '' }}>Quotidienne</option>
                                    <option value="weekly" {{ old('periode_type', $settingreward->periode_type) == 'weekly' ? 'selected' : '' }}>Hebdomadaire</option>
                                    <option value="monthly" {{ old('periode_type', $settingreward->periode_type) == 'monthly' ? 'selected' : '' }}>Mensuelle</option>
                                </select>
                                @error('periode_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label for="bonus_type">Type de bonus</label>
                                <select name="bonus_type" class="form-control @error('bonus_type') is-invalid @enderror">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="data" {{ old('bonus_type', $settingreward->bonus_type) == 'data' ? 'selected' : '' }}>Données (internet)</option>
                                    <option value="cashback" {{ old('bonus_type', $settingreward->bonus_type) == 'cashback' ? 'selected' : '' }}>Cashback</option>
                                    <option value="reduction" {{ old('bonus_type', $settingreward->bonus_type) == 'reduction' ? 'selected' : '' }}>Réduction</option>
                                </select>
                                @error('bonus_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="bonus_value">Valeur du bonus</label>
                                <input name="bonus_value" type="number" class="form-control @error('bonus_value') is-invalid @enderror" value="{{ old('bonus_value', $settingreward->bonus_value) }}" placeholder="Ex : 1000">
                                @error('bonus_value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="bonus_unite">Unité du bonus</label>
                                <select name="bonus_unite" class="form-control @error('bonus_unite') is-invalid @enderror">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="Fcfa" {{ old('bonus_unite', $settingreward->bonus_unite) == 'Fcfa' ? 'selected' : '' }}>Fcfa</option>
                                    <option value="Mo" {{ old('bonus_unite', $settingreward->bonus_unite) == 'Mo' ? 'selected' : '' }}>Mo</option>
                                    <option value="Go" {{ old('bonus_unite', $settingreward->bonus_unite) == 'Go' ? 'selected' : '' }}>Go</option>
                                </select>
                                @error('bonus_unite')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="start_validity">Date de début de validité</label>
                                <input name="start_validity" type="date" class="form-control @error('start_validity') is-invalid @enderror" value="{{ old('start_validity', $settingreward->start_validity ? $settingreward->start_validity->format('Y-m-d') : '') }}">
                                @error('start_validity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="end_validity">Date de fin de validité</label>
                                <input name="end_validity" type="date" class="form-control @error('end_validity') is-invalid @enderror" value="{{ old('end_validity', $settingreward->end_validity ? $settingreward->end_validity->format('Y-m-d') : '') }}">
                                @error('end_validity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Mettre à jour</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

