@extends('back.layouts.master')
@section('title', 'Liste des promotions')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>
                         <a  up-target=".main" href="{{ route('promotions.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0 datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Code Promo</th>
                                    <th>Période</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>{{ $promotion->name }}</td>
                                        <td>
                                            <span class="badge bg-info font-size-12">{{ $promotion->code_promo }}</span>
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($promotion->start_date)->format('d/m/Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($promotion->end_date)->format('d/m/Y') }}
                                        </td>
                                        <td>
                                            <span class="{{ $promotion->status ? 'badge badge-pill badge-soft-success' : 'badge badge-pill badge-soft-danger' }}">
                                                {{ $promotion->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- Détails -->
                                                <a  up-target=".main" href="{{ route('promotions.show', $promotion) }}" class="text-primary" data-bs-toggle="tooltip" title="Détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Bouton Modifier -->
                                                <a  up-target=".main" href="{{ route('promotions.edit', $promotion) }}" class="text-warning d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Toggle Statut -->
                                                @if ($promotion->status)
                                                    <a up-target=".main" href="{{ route('promotions.toggleStatus', $promotion) }}" class="text-secondary" data-bs-toggle="tooltip" title="Désactiver"  onclick="return confirm('Voulez-vous vraiment désactiver cette promotion ?');">
                                                        <i class="fas fa-toggle-off"></i>
                                                    </a>
                                                @else
                                                    <a up-target=".main" href="{{ route('promotions.toggleStatus', $promotion) }}" class="text-success" data-bs-toggle="tooltip" title="Activer"  onclick="return confirm('Voulez-vous vraiment activer cette promotion ?');">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                @endif

                                                <!-- Bouton Supprimer -->
                                                <form action="{{ route('promotions.destroy', $promotion) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette promotion ?');" up-target=".main">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link p-0 m-0 text-danger d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" title="Supprimer">
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
