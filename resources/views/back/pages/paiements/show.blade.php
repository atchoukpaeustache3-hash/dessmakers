

@extends('back.layouts.master')
@section('title', "Détails d'un paiement")
@section('content')

   <div class="row">
    <div class="col-lg-10 offset-lg-1">
       <div class="card">
            <div class="card-body">
                <h5 class="text-truncate font-size-15">@yield('title')</h5>

                <div class="text-muted mt-3">
                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Référence :
                        <strong>#{{ $wallet->reference }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Client :
                        <strong>{{ $wallet->user->firstname . ' ' . $wallet->user->lastname }}</strong>
                    </p>


                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Montant :
                        <strong>{{ number_format($wallet->amount, 0, ',', ' ') }} FCFA</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Numéro :
                        <strong>{{ $wallet->number }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Type :
                        <strong class="text-uppercase">{{ $wallet->type_label }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Opérateur :
                        <strong>{{ $wallet->operator->name ?? 'Non défini' }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Statut :
                        <span class="badge badge-pill {{ $wallet->status_badge_class }}">
                                        {{ ($wallet->status_label) }}
                        </span>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Date :
                        <strong>{{ \Carbon\Carbon::parse($wallet->created_at)->format('d/m/Y à H:i') }}</strong>
                    </p>
                </div>

                <div class="text-end">
                    <a  up-target=".main" href="{{ route( $wallet->type == 'deposit' ? 'wallets.index' : 'wallet.withdraw') }}" class="btn btn-secondary mb-3">
                        <i class="mdi mdi-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

