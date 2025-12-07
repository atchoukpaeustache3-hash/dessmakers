@extends('back.layouts.master')
@section('title', 'Modifier un forfait')
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">@yield('title')</h4>
                    <p class="card-title-desc">Remplissez les informations ci-dessous</p>

                    <form method="POST" action="{{ route('packages.update',$package->package_id) }}" up-target=".main">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name">Nom du forfait</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$package->package->name) }}" placeholder="Ex : Forfait Giga+">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="volume">Volume</label>
                                    <input name="volume" type="text" class="form-control @error('volume') is-invalid @enderror" value="{{ old('volume',$package->volume) }}" placeholder="Ex: 50Mo">
                                    @error('volume')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="mb-3">
                                    <label for="operator_id">Opérateur</label>
                                    <select name="operator" class="form-control @error('operator_id') is-invalid @enderror">

                                        @foreach($operators as $operator)
                                            <option value="{{ $operator->id }}" {{ old('operator_id',$package->operator->id) == $operator->id ? 'selected' : '' }} disabled>
                                                {{ $operator->name }}
                                            </option>
                                            @endforeach
                                            <input type="hidden" name="operator_id" value="{{ old('operator_id', $package->operator->id) }}">
                                    </select>


                                    @error('operator_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="price">Prix (FCFA)</label>
                                    <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price',$package->package->price) }}" placeholder="Ex : 2000">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="validity_days">Durée de validité</label>
                                    <select name="validity_days" class="form-control @error('validity_days') is-invalid @enderror">
                                        <option value="">-- Sélectionnez une durée --</option>
                                        <option value="24h" {{ old('validity_days', $package->validity_days) == '24h' ? 'selected' : '' }}>24 Heures</option>
                                        <option value="3j" {{ old('validity_days', $package->validity_days) == '3j' ? 'selected' : '' }}>3 Jours</option>
                                        <option value="7j" {{ old('validity_days', $package->validity_days) == '7j' ? 'selected' : '' }}>7 Jours</option>
                                        <option value="15j" {{ old('validity_days', $package->validity_days) == '15j' ? 'selected' : '' }}>15 Jours</option>
                                        <option value="20j" {{ old('validity_days', $package->validity_days) == '20j' ? 'selected' : '' }}>20 Jours</option>
                                        <option value="30j" {{ old('validity_days', $package->validity_days) == '30j' ? 'selected' : '' }}>30 Jours</option>

                                        <option value="illimité" {{ old('validity_days', $package->validity_days) == 'illimité' ? 'selected' : '' }}>Illimité</option>
                                    </select>
                                    @error('validity_days')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>




                                <div class="mb-3">
                                    <label for="type_package_id">Type de forfait</label>
                                    <select name="type_package" class="form-control @error('type_package_id') is-invalid @enderror">
                                        <option value="">-- Sélectionnez --</option>
                                        @foreach($typePackages as $type)
                                            <option value="{{ $type->id }}" {{ old('type_package_id',$package->typePackage->id) == $type->id ? 'selected' : '' }} disabled>
                                                {{ $type->label }}
                                            </option>


                                        @endforeach
                                    </select>

                                    <input type="hidden" name="type_package_id" value="{{ old('type_package_id', $package->typePackage->id) }}">
                                    @error('type_package_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description">Description (optionnel)</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Décrivez le forfait">{{ old('description',$package->package->description) }}</textarea>
                                    @error('description')
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

