@extends('back.layouts.master')
@section('title', 'Liste des recompenses')
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
                                    <th>Récompense</th>
                                    <th>Critère</th>
                                    <th>Date d'obtention</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($rewards as $reward)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($reward->user->avatar)
                                                    <img src="{{ asset( $reward->user->avatar ? $reward->user->avatar :'storage/back/assets/images/users/user-default.jpg') }}" alt="Logo" class="rounded-circle me-2" width="40" height="40">
                                                @endif
                                                <span>{{$reward->user->firstname.' '.$reward->user->lastname }}</span>
                                            </div>

                                        </td>


                                        <td>
                                            <span class="badge bg-success font-size-12">
                                                {{ $reward->value }} {{ $reward->unite }}
                                            </span>
                                        </td>

                                        <td>
                                            {{ $reward->settingReward->setting_name ?? 'Non défini' }}
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($reward->date_obtained)->format('d/m/Y') }}
                                        </td>

                                        <td>
                                            <span class="badge badge-pill {{$reward->status_badge_class}}">
                                                {{$reward->status_label}}
                                            </span>
                                    </td>


                                        <td>
                                            <div class="d-flex gap-2">
                                                <a  up-target=".main" href="{{ route('rewards.show', $reward) }}" class="text-primary" data-bs-toggle="tooltip" title="Détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Supprimer -->
                                                {{-- <form action="{{ route('rewards.destroy', $reward) }}" method="POST" onsubmit="return confirm('Supprimer cette récompense ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0" data-bs-toggle="tooltip" title="Supprimer">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form> --}}
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
