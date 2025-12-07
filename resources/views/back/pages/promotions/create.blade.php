@extends('back.layouts.master')
@section('title', 'Ajouter une promotion')
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">@yield('title')</h4>
                    <p class="card-title-desc">Remplissez les informations ci-dessous</p>

                    <form method="POST" action="{{ route('promotions.store') }}" up-target=".main">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">

                                <div class="mb-3">
                                    <label for="name">Nom de la promotion</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        placeholder="Ex : Promo rentrée">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="amount">Montant Fcfa </label>
                                    <input name="amount" type="number"
                                        class="form-control @error('amount') is-invalid @enderror"
                                        value="{{ old('amount') }}" placeholder="Ex : 2000">
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="start_date">Date de début</label>
                                    <input name="start_date" type="date"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                            </div>

                            <div class="col-sm-6">

                                <div class="mb-3">
                                    <label for="data">Donnée (Mo/Go)</label>
                                    <input name="data" type="text"
                                        class="form-control @error('data') is-invalid @enderror" value="{{ old('data') }}"
                                        placeholder="Ex : 500Mo">
                                    @error('data')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="percent">Pourcentage (%)</label>
                                    <input name="percent" type="number" step="0.1"
                                        class="form-control @error('percent') is-invalid @enderror"
                                        value="{{ old('percent') }}" placeholder="Ex : 10">
                                    @error('percent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="end_date">Date de fin</label>
                                    <input name="end_date" type="date"
                                        class="form-control @error('end_date') is-invalid @enderror"
                                        value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4"
                                        placeholder="Décrivez la promotion">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection
