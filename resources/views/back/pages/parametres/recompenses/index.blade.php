@extends('back.layouts.master')
@section('title', 'Paramètres des Récompenses')
@section('content')
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">@yield('title')</h4>
                    <a  up-target=".main" href="{{ route('settingrewards.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                        </a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0 datatable">
                        <thead class="table-light">
                            <tr>
                                <th>Nom</th>
                                <th>Critère</th>
                                <th>Bonus</th>
                                <th>Période</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($settingrewards as $settingreward)
                                <tr>
                                    <td>{{ $settingreward->setting_name }}</td>

                                    <td>
                                        <span class="badge bg-info font-size-12">
                                            {{ $settingreward->critere_type_label  }} : {{ $settingreward->critere_value }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $settingreward->bonus_value }} {{ $settingreward->bonus_unite }} ({{ ucfirst($settingreward->bonus_type) }})
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($settingreward->start_validity)->format('d/m/Y') }}
                                        -
                                        {{ \Carbon\Carbon::parse($settingreward->end_validity)->format('d/m/Y') }}
                                    </td>

                                    <td>
                                        <span class="{{ $settingreward->is_active ? 'badge badge-pill badge-soft-success' : 'badge badge-pill badge-soft-danger' }}">
                                            {{ $settingreward->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- Détails -->
                                            <a  up-target=".main" href="{{ route('settingrewards.show', $settingreward) }}" class="text-primary" data-bs-toggle="tooltip" title="Détails">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Modifier -->
                                            <a  up-target=".main" href="{{ route('settingrewards.edit', $settingreward) }}" class="text-warning" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Activer/Désactiver -->
                                            <a up-target=".main" href="{{ route('settingrewards.toggleStatus', $settingreward) }}"
                                            class="{{ $settingreward->is_active ? 'text-secondary' : 'text-success' }}"
                                            data-bs-toggle="tooltip"
                                            title="{{ $settingreward->is_active ? 'Désactiver' : 'Activer' }}">
                                                <i class="fas fa-toggle-{{ $settingreward->is_active ? 'off' : 'on' }}"></i>
                                            </a>

                                            <!-- Supprimer -->
                                            <form action="{{ route('settingrewards.destroy', $settingreward) }}" method="POST"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette récompense ?');" up-target=".main">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0 m-0 text-danger" data-bs-toggle="tooltip" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
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
