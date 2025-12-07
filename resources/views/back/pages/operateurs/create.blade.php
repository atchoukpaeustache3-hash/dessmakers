@extends('back.layouts.master')
@section('title', 'Ajouter un opérateur')
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">@yield('title')</h4>
                    <p class="card-title-desc">Remplissez les informations ci-dessous</p>

                    <form method="POST" action="{{ route('operators.store') }}" enctype="multipart/form-data" up-target=".main">
                       @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name">Nom de l'opérateur</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Ex : Orange">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="prefix">Préfixes (séparés par des virgules)</label>
                                    <input name="prefix" type="text" class="form-control @error('prefix') is-invalid @enderror"
                                        value="{{ old('prefix') }}" placeholder="Ex : 07,08">
                                    @error('prefix')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="logo">Logo</label>
                                    <input name="logo" type="file" class="form-control @error('logo') is-invalid @enderror">
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>



@endsection
