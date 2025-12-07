@extends('back.layouts.master')
@section('title', 'Détails de la transaction')
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-md-1 offset-lg-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-truncate font-size-15">@yield('title')</h5>

                    <div class="text-muted mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Référence :
                                    <strong>{{ $transaction->transaction_reference }}</strong>
                                </p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Numéro de {{ $transaction->type == 'purchase' ? 'transaction' : 'transfert' }} :
                                    <strong>{{ $transaction->number }}</strong>
                                </p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Numéro de paiement :
                                    <strong>{{ $transaction->payment_number }}</strong>
                                </p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Opérateur :
                                    <strong>{{ $transaction->operatorPackageType()->operator->name }}</strong>
                                </p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Forfait :
                                    <strong>{{ $transaction->operatorPackageType()->typePackage->label }}</strong>
                                </p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Montant :
                                    <strong>{{ number_format($transaction->amount, 0, ',', ' ') }} FCFA</strong>
                                </p>

                                @if ($transaction->original_amount)
                                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                        Montant original :
                                        <strong>{{ number_format($transaction->original_amount, 0, ',', ' ') }} FCFA</strong>
                                    </p>
                                @endif

                                @if ($transaction->discount_applied)
                                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                       Montant de la reduction :
                                    <strong>{{ number_format($transaction->discount_applied, 0, ',', ' ') }} FCFA</strong>
                                </p>
                                @endif

                                 <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    volume :
                                    <strong>{{ $transaction->volume ?? 'Non spécifié' }} </strong>
                                </p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Type :
                                    @php
                                        $typeLabels = [
                                            'transfer' => 'Transfert',
                                            'purchase' => 'Achat',
                                        ];
                                    @endphp
                                    <strong>{{ $typeLabels[$transaction->type] ?? ucfirst($transaction->type) }}</strong>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Statut :
                                    <span class="badge badge-pill {{ $transaction->status_badge_class }}">
                                        {{ $transaction->status_label }}
                                    </span>
                                </p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Date de création :
                                    <strong>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y à H:i') }}</strong>
                                </p>

                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Client :
                                    <strong>{{ $transaction->user->firstname . ' ' . $transaction->user->lastname }}</strong>
                                </p>



                                <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                    Mode de paiement :
                                    <strong>{{ $transaction->paymentMode->label ?? 'Non spécifié' }}</strong>
                                </p>

                                @if ($transaction->promotion_id)
                                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                        Promotion appliquée :
                                        <strong>{{ $transaction->promotion->name ?? 'Non spécifiée' }}</strong>
                                    </p>
                                @endif

                                @if ($transaction->api_response)
                                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                                        Réponse API :
                                        <code class="d-block mt-2 p-2 bg-light">{{ $transaction->api_response }}</code>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="text-end">

                        <a  up-target=".main" href="{{ route($transaction->type == 'purchase' ? 'transactions.index' : 'transactions.transfert') }}"
                            class="btn btn-secondary mb-3">
                            <i class="mdi mdi-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
