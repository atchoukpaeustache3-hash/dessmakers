@extends('back.layouts.master')
@section('title', 'Liste des dépots')
@section('content')
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">@yield('title')</h4>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0 datatable">
                        <thead class="table-light">
                            <tr>
                                <th>Réference</th>
                                <th>Client</th>
                                <th>Montant</th>
                                <th>Numéro(dépot)</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($wallets as $wallet)
                                <tr>

                                    <td>
                                        {{$wallet->reference}}
                                    </td>
                                    <!-- Utilisateur -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($wallet->user->avatar)
                                                <img src="{{ asset($wallet->user->avatar) }}" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
                                            @endif
                                            <span>{{ $wallet->user->firstname . ' ' . $wallet->user->lastname }}</span>
                                        </div>
                                    </td>

                                    <!-- Montant -->
                                    <td>
                                        <span class="badge bg-info font-size-12">
                                            {{ number_format($wallet->amount, 0, ',', ' ') }} FCFA
                                        </span>
                                    </td>

                                    <!-- Numéro -->
                                    <td>{{ $wallet->number }}</td>

                                    <!-- Type -->
                                    {{-- <td>
                                        <span class="badge bg-light text-dark text-uppercase">{{ $wallet->type }}</span>
                                    </td> --}}

                                    <!-- Statut -->
                                    <td>

                                        <span class="badge badge-pill {{ $wallet->status_badge_class }}">
                                            {{ ($wallet->status_label) }}
                                        </span>
                                    </td>

                                    <!-- Date -->
                                    <td>{{ \Carbon\Carbon::parse($wallet->created_at)->format('d/m/Y à H:i') }}</td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- Détails -->
                                            <a  up-target=".main" href="{{ route('wallets.show', $wallet) }}" class="text-primary" data-bs-toggle="tooltip" title="Détails">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>



@endsection
