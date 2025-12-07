
 @extends('back.layouts.master')
@section('title', 'Liste des achats')
@section('content')

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>
                    </div>

                    <div class="table-responsive"> <!-- Ajouté ici -->

                        <table  class="table align-middle table-nowrap mb-0 datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Réference</th>
                                    <th>Acheteur</th>
                                    <th>Numero</th>
                                    <th>forfait</th>
                                    <th>Montant</th>
                                    <th>statut</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($transactions as $transaction)

                                    <tr>
                                    <td>
                                        #{{ $transaction->transaction_reference}}
                                    </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($transaction->user->avatar)
                                                    <img src="{{ asset($transaction->user->avatar) }}" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
                                                @endif
                                                <span>{{ $transaction->user->firstname . ' ' . $transaction->user->lastname }}</span>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="badge bg-primary font-size-12">
                                                {{ ($transaction->number) }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="badge bg-success font-size-12">
                                                {{ $transaction->operatorPackageType()->operator->name }} : {{  $transaction->operatorPackageType()->typePackage->label }}
                                            </span>

                                        </td>

                                        <td>
                                            {{ $transaction->amount ?? 'N/A' }} Fcfca
                                        </td>

                                        <td>
                                            <span class="badge badge-pill {{ $transaction->status_badge_class }}">
                                                {{ $transaction->status_label }}
                                            </span>
                                        </td>


                                        <td>
                                            {{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y') }}
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- Bouton Détails -->
                                                    <a  up-target=".main" href="{{route('transactions.show',$transaction)}}" class=" text-primary d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Détails">
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
