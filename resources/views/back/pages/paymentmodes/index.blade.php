@extends('back.layouts.master')
@section('title', 'Liste des modes de paiement')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>
                        <a  up-target=".main" href="{{ route('paymentmodes.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                        </a>

                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0 datatable">
                            <thead class="table-light">
                            <tr>
                                <th class="align-middle">Libellé</th>

                                <th class="align-middle">Statut</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                            </thead>

                            <tbody>


                                @foreach ($paymentmodes as $index => $mode)

                                    <tr>

                                        <td>{{ $mode->label }}</td>
                                        <td>
                                            <span class="{{ $mode->status  ? 'badge badge-pill badge-soft-success font-size-11' : 'badge badge-pill badge-soft-danger font-size-11' }} ">
                                                {{ $mode->status  ? 'Actif' : 'Inactif' }}
                                            </span>
                                        </td>

                                        <td>


                                            <div class="text-sm-end d-flex gap-2">

                                            <a  up-target=".main"  href="{{ route('paymentmodes.edit', $mode) }}" class="text-warning d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                @if ($mode->status)
                                                    <!-- Bouton pour désactiver le compte -->
                                                    <a up-target=".main" href="{{ route('paymentmodes.toggleStatus', $mode) }}" class="text-secondary d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Désactivé" onclick="return confirm('Voulez-vous vraiment désactiver ce moyen de paiement ?');">
                                                        <i class="fas fa-toggle-off"></i>
                                                    </a>
                                                @else
                                                    <!-- Bouton pour activer le compte -->
                                                    <a up-target=".main" href="{{ route('paymentmodes.toggleStatus', $mode) }}" class="text-success d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Activé" onclick="return confirm('Voulez-vous vraiment activer ce moyen de paiement ?');">
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
