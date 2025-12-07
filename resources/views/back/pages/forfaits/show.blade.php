

@extends('back.layouts.master')
@section('title', "Détails d'un forfait")
@section('content')

    <div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-truncate font-size-15">{{ $package->package->name }}</h5>
                <p class="text-muted mb-0">Opérateur : <strong>{{ $package->operator->name ?? 'Non défini' }}</strong></p>

                <h5 class="font-size-15 mt-4">@yield('title') :</h5>

                <div class="text-muted mt-3">
                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Statut :
                        @if ($package->package->is_active)
                            <span class="badge bg-success">Actif</span>
                        @else
                            <span class="badge bg-danger">Inactif</span>
                        @endif
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Volume de données :
                        <strong>{{ $package->volume }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Validité :
                        <strong>{{ $package->validity_days }} </strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Prix :
                        <strong>{{ number_format($package->package->price, 0, ',', ' ') }} FCFA</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Type de forfait :
                        <strong>{{ $package->typePackage->label ?? 'Non défini' }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Description :
                        <strong>{{ $package->package->description ?: 'Aucune description' }}</strong>
                    </p>
                </div>

                <div class="text-end">
                    <a  up-target=".main"  href="{{ route('packages.index') }}" class="btn btn-secondary mb-3">
                        <i class="mdi mdi-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

