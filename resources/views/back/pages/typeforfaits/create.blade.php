@extends('back.layouts.master')
@section('title', 'Ajouter un type de forfait')
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">@yield('title')</h4>
                    <p class="card-title-desc">Remplissez les informations ci-dessous</p>

                    <form method="POST" action="{{ route('typepackages.store') }}" up-target=".main">
                       @csrf
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="mb-3">
                                    <label for="label">Nom</label>
                                    <input name="label" type="text" class="form-control @error('label') is-invalid @enderror" value="{{ old('label') }}" placeholder="Ex : Internet, Appel, SMS">
                                    @error('label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description">Description (optionnelle)</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection
