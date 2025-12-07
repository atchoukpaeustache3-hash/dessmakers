

@extends('back.layouts.master')
@section('title', "Paramètres des Récompenses")
@section('content')
  <div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-truncate font-size-15">{{ $settingreward->setting_name }}</h5>
                <p class="text-muted mb-0">Type de critère : <strong>{{  $settingreward->critere_type_label }}</strong></p>

                <h5 class="font-size-15 mt-4">Détails de la récompense :</h5>

                <div class="text-muted mt-3">
                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Valeur du critère :
                        <strong>{{ number_format($settingreward->critere_value) }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Période :
                        <strong>
                            @switch($settingreward->periode_type)
                                @case('daily') Quotidienne @break
                                @case('weekly') Hebdomadaire @break
                                @case('monthly') Mensuelle @break
                                @default Non défini
                            @endswitch
                        </strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Type de bonus :
                        <strong>
                            @switch($settingreward->bonus_type)
                                @case('data') Données (internet) @break
                                @case('cashback') Cashback @break
                                @case('reduction') Réduction @break
                                @default Non défini
                            @endswitch
                        </strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Valeur du bonus :
                        <strong>{{ number_format($settingreward->bonus_value) }} {{ $settingreward->bonus_unite }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Valable du :
                        <strong>{{ \Carbon\Carbon::parse($settingreward->start_validity)->format('d/m/Y') }}</strong> au
                        <strong>{{ \Carbon\Carbon::parse($settingreward->end_validity)->format('d/m/Y') }}</strong>
                    </p>
                </div>

                <div class="text-end">
                    <a  up-target=".main" href="{{ route('settingrewards.index') }}" class="btn btn-secondary mb-3">
                        <i class="mdi mdi-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

