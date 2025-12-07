@extends('back.layouts.master')
@section('title', 'Liste des forfaits')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>
                         <a up-target=".main" href="{{ route('packages.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0 datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Opérateur</th>
                                    <th>Type de forfait</th>
                                    <th>Prix</th>
                                    <th>Volume</th>
                                    <th>Validité</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                                <tbody>
                                    @foreach ($packages as $pack)
                                    @foreach ($pack->operatorPackageTypes as $package)
                                        <tr>
                                            <td>{{ $package->operator->name }}</td>
                                            <td>{{ $package->typePackage->label}}</td>
                                            <td>{{ number_format($package->package->price, 0, ',', ' ') }} FCFA</td>
                                            <td>{{ $package->volume ? $package->volume :'-' }} </td>
                                            <td>{{ $package->validity_days }}</td>
                                            <td>
                                                <span class="{{ $package->package->is_active ? 'badge badge-pill badge-soft-success' : 'badge badge-pill badge-soft-danger' }}">
                                                    {{ $package->package->is_active ? 'Actif' : 'Inactif' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <!-- Détails -->
                                                    <a  up-target=".main"  href="{{ route('packages.show', $package->package->id) }}" class="text-primary" data-bs-toggle="tooltip" title="Détails">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <!-- Modifier -->
                                                    <a  up-target=".main"  href="{{ route('packages.edit', $package->package->id) }}" class="text-warning" data-bs-toggle="tooltip" title="Modifier">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <!-- Toggle Statut -->
                                                    @if ($package->package->is_active)
                                                        <a href="{{ route('packages.toggleStatus', $package->package->id) }}" class="text-secondary" data-bs-toggle="tooltip" title="Désactiver" onclick="return confirm('Voulez-vous vraiment désactiver ce forfait ?');">
                                                            <i class="fas fa-toggle-off"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('packages.toggleStatus', $package->package->id) }}" class="text-success" data-bs-toggle="tooltip" title="Activer" onclick="return confirm('Voulez-vous vraiment activer ce forfait ?');">
                                                            <i class="fas fa-toggle-on"></i>
                                                        </a>
                                                    @endif

                                                    <!-- Supprimer -->
                                                    {{-- <form action="{{ route('packages.destroy', $package) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce forfait ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link p-0 m-0 text-danger" data-bs-toggle="tooltip" title="Supprimer">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
