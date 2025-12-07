@extends('back.layouts.master')
@section('title', 'Liste des commissions')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>
                    </div>

                    <div class="table-responsive">
                        <table  class="table align-middle table-nowrap mb-0 datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Bénéficiaire</th>
                                    <th>Montant</th>
                                    <th>Source</th>
                                    <th>Transaction</th>
                                    <th>Date</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($commissions as $commission)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($commission->user->avatar)
                                                    <img src="{{ asset($commission->user->avatar) }}" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
                                                @endif
                                                <span>{{ $commission->user->firstname . ' ' . $commission->user->lastname }}</span>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="badge bg-success font-size-12">
                                                {{ number_format($commission->value,0,',',' ') }} {{ $commission->unite }}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($commission->sourceUser->avatar)
                                                    <img src="{{ asset($commission->sourceUser->avatar) }}" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
                                                @endif
                                                <span>{{ $commission->sourceUser->firstname . ' ' . $commission->sourceUser->lastname }}</span>
                                            </div>
                                        </td>

                                        <td>
                                        <a  up-target=".main"  href="{{route('transactions.show',$commission->transaction->transaction_reference)}}">
                                            #{{ $commission->transaction->transaction_reference ?? 'N/A' }}
                                            </a>
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($commission->created_at)->format('d/m/Y') }}
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
