

@extends('back.layouts.master')
@section('title', "Détails de la promotion")
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-truncate font-size-15">{{ $promotion->name }}</h5>
                    <p class="text-muted mb-0">Code promo : <strong>{{ $promotion->code_promo }}</strong></p>

                    <h5 class="font-size-15 mt-4">@yield('title') :</h5>

                    <div class="text-muted mt-3">
                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Statut :
                            @if ($promotion->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Réduction fixe :
                            <strong>{{ $promotion->amount ? number_format($promotion->amount) . ' FCFA' : 'Non défini' }}</strong>
                        </p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Bonus data :
                            <strong>{{ $promotion->data ? $promotion->data . ' Mo' : 'Non défini' }}</strong>
                        </p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Réduction en pourcentage :
                            <strong>{{ $promotion->percent ? $promotion->percent . '%' : 'Non défini' }}</strong>
                        </p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Valable du :
                            <strong>{{ \Carbon\Carbon::parse($promotion->start_date)->format('d/m/Y') }}</strong> au
                            <strong>{{ \Carbon\Carbon::parse($promotion->end_date)->format('d/m/Y') }}</strong>
                        </p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Description :
                            <strong>{{ $promotion->description ?: 'Aucune description' }}</strong>
                        </p>
                    </div>

                    <div class="text-end">
                        <a  up-target=".main" href="{{ route('promotions.index') }}" class="btn btn-secondary mb-3">
                            <i class="mdi mdi-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

