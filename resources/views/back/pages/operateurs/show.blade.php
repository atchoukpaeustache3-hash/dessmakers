

@extends('back.layouts.master')
@section('title', "Détails d'un operateur")
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-lg-1">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-4">
                            <img src="{{ asset($operator->logo) }}" alt="{{ $operator->name }}" class="avatar-sm rounded-circle">
                        </div>

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15">{{ $operator->name }}</h5>
                            {{-- <p class="text-muted mb-0">Slug : {{ $operator->slug }}</p> --}}
                        </div>
                    </div>

                    <h5 class="font-size-15 mt-4">Détails de l’opérateur :</h5>

                    <div class="text-muted mt-3">
                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Statut :
                            @if ($operator->is_active)
                                <span class="badge bg-success">Actif</span>
                            @else
                                <span class="badge bg-danger">Inactif</span>
                            @endif
                        </p>

                        <p>
                            <i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Préfixes disponibles :
                            @php
                                $prefixes = json_decode($operator->prefix, true);
                            @endphp
                          <strong> {{ $prefixes ? implode(', ', $prefixes) : 'Aucun' }} </strong>
                        </p>
                    </div>

                    {{-- <div class="row task-dates mt-4">
                        <div class="col-sm-6 col-6">
                            <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Créé le</h5>
                            <p class="text-muted mb-0">{{ $operator->created_at->format('d M Y') }}</p>
                        </div>

                        <div class="col-sm-6 col-6">
                            <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Mis à jour le</h5>
                            <p class="text-muted mb-0">{{ $operator->updated_at->format('d M Y') }}</p>
                        </div>
                    </div> --}}

                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('operators.index') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Retour à la liste
                        </a>

                        <a  up-target=".main" href="{{ route('operators.edit', $operator) }}" class="btn btn-primary">
                            Modifier <i class="mdi mdi-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
   </div>

@endsection

