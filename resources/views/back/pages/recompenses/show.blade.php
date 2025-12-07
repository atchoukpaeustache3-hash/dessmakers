

@extends('back.layouts.master')
@section('title', "Détail de la récompense")
@section('content')

   <div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-truncate font-size-15">@yield('title')</h5>

                {{-- <h5 class="font-size-15 mt-4">@yield('title') :</h5> --}}

                <div class="text-muted mt-3">
                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Valeur :
                        <strong>{{ $reward->value . ' ' . $reward->unite }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Statut :
                        <span class="badge badge-pill {{$reward->status_badge_class}}">
                            {{$reward->status_label}}
                        </span>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Date d'obtention :
                        <strong>{{ \Carbon\Carbon::parse($reward->date_obtained)->format('d/m/Y') }}</strong>
                    </p>

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Bénéficiaire :
                        <strong>{{$reward->user->firstname.' '.$reward->user->lastname}}</strong>
                    </p>

                    @if ($reward->transaction)
                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Transaction associée :
                            <strong>
                                <a href="{{route('transactions.show',$reward->transaction->transaction_reference)}}">
                                #{{ $reward->transaction->transaction_reference ?? 'Non liée' }}
                                </a>

                            </strong>
                        </p>
                    @endif

                    <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                        Règle de récompense :
                        <strong>{{ $reward->settingReward->setting_name ?? 'Inconnue' }}</strong>
                    </p>
                </div>

                <div class="text-end">
                    <a  up-target=".main" href="{{ route('rewards.index') }}" class="btn btn-secondary mb-3">
                        <i class="mdi mdi-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

