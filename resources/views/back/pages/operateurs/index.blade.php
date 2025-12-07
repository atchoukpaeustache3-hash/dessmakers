@extends('back.layouts.master')
@section('title', 'Liste des operateurs')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>
                         <a  up-target=".main" href="{{ route('operators.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                        </a>

                    </div>

                    <div class="table-responsive">
                        <table  class="table align-middle table-nowrap mb-0 datatable">
                            <thead class="table-light">
                            <tr>
                                <th>Libellé</th>
                                <th>Préfixes</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>


                                @foreach ($operators as $index => $operator)

                                    <tr>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($operator->logo)
                                                    <img src="{{ asset( $operator->logo) }}" alt="Logo" class="rounded-circle me-2" width="40" height="40">
                                                @endif
                                                <span>{{ $operator->name }}</span>
                                            </div>
                                        </td>

                                        <td>
                                            @php
                                                $prefixes = json_decode($operator->prefix, true);
                                                $limited = array_slice($prefixes ?? [], 0, 3);
                                            @endphp
                                            {{ implode(', ', $limited) }}
                                        </td>

                                        <td>
                                            <span class="{{ $operator->is_active  ? 'badge badge-pill badge-soft-success font-size-11' : 'badge badge-pill badge-soft-danger font-size-11' }} ">
                                                {{ $operator->is_active  ? 'Actif' : 'Inactif' }}
                                            </span>
                                        </td>

                                        <td>


                                            <div class="text-sm-end d-flex gap-2">

                                                <!-- Bouton Détails -->
                                                <a  up-target=".main" href="{{route('operators.show',$operator)}}" class=" text-primary d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Détails" >
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a  up-target=".main" href="{{route('operators.edit',$operator)}}" class="text-warning d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Modifier les préfixes" >
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                @if ($operator->is_active)
                                                    <!-- Bouton pour désactiver le compte -->
                                                    <a up-target=".main" href="{{ route('operators.toggleStatus', $operator) }}" class="text-secondary d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Désactivé" onclick="return confirm('Voulez-vous vraiment désactiver ce réseau ?');">
                                                        <i class="fas fa-toggle-off"></i>
                                                    </a>
                                                @else
                                                    <!-- Bouton pour activer le compte -->
                                                    <a up-target=".main" href="{{ route('operators.toggleStatus', $operator) }}" class="text-success d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Activé" onclick="return confirm('Voulez-vous vraiment activer ce réseau ?');">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                @endif

                                            </div>


                                        </td>

                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
