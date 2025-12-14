@extends('back.layouts.master')
@section('title', 'Liste des mesures')

@section('content')

@if ($mesures->isEmpty())
    <div class="alert alert-info">
        Ce client n’a encore aucune mesure enregistrée.
    </div>
@else

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Liste des mesures</h5>
            </div>

            <div class="card-body">

                <!-- FIX STYLE : TABLEAU FULL WIDTH + SCROLL HORIZONTAL -->
                <div class="table-responsive" style="overflow-x:auto; width:100%;">

                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll">
                                    </div>
                                </th>
                                <th>SR No.</th>
                                <th>Client</th>
                                <th>Encolure</th>
                                <th>Tr. Poitrine</th>
                                <th>Tr. Sous Poitrine</th>
                                <th>Tr. Taille</th>
                                <th>Tr. Bassin</th>
                                <th>Tr. Cuisse</th>
                                <th>Tr. Ceinture</th>
                                <th>Tr. Bras</th>
                                <th>Tr. Manche</th>
                                <th>Tr. Bas</th>
                                <th>Tr. Tête</th>
                                <th>Hr. Poitrine</th>
                                <th>Hr. Sous Poitrine</th>
                                <th>Lg. Épaule</th>
                                <th>Lg. Taille</th>
                                <th>Lg. Taille Dos</th>
                                <th>Lg. Manche</th>
                                <th>Lg. Pantalon</th>
                                <th>Lg. Genoux</th>
                                <th>Lg. Chemise</th>
                                <th>Carrure Devant</th>
                                <th>Carrure Dos</th>
                                <th>Demi Dos</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($mesures as $key => $mesure)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" value="{{ $mesure->id }}">
                                    </div>
                                </th>

                                <td>{{ $key + 1 }}</td>

                                <td>{{ $mesure->client->name ?? '' }} {{ $mesure->client->lastname ?? '' }}</td>

                                <td>{{ $mesure->encolure }}</td>
                                <td>{{ $mesure->tr_poitrine }}</td>
                                <td>{{ $mesure->tr_sous_poitrine }}</td>
                                <td>{{ $mesure->tr_taille }}</td>
                                <td>{{ $mesure->tr_bassin }}</td>
                                <td>{{ $mesure->tr_cuisse }}</td>
                                <td>{{ $mesure->tr_ceinture }}</td>
                                <td>{{ $mesure->tr_bras }}</td>
                                <td>{{ $mesure->tr_manche }}</td>
                                <td>{{ $mesure->tr_bas }}</td>
                                <td>{{ $mesure->tr_tete }}</td>
                                <td>{{ $mesure->hr_poitrine }}</td>
                                <td>{{ $mesure->hr_sous_poitrine }}</td>
                                <td>{{ $mesure->lg_epaule }}</td>
                                <td>{{ $mesure->lg_taille }}</td>
                                <td>{{ $mesure->lg_taille_dos }}</td>
                                <td>{{ $mesure->lg_manche }}</td>
                                <td>{{ $mesure->lg_pantalon }}</td>
                                <td>{{ $mesure->lg_genoux }}</td>
                                <td>{{ $mesure->lg_chemise }}</td>
                                <td>{{ $mesure->carrure_devant }}</td>
                                <td>{{ $mesure->carrure_dos }}</td>
                                <td>{{ $mesure->demi_dos }}</td>

                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                           
                                           <li>
                                                <a href="{{ route('mesure.edit', $mesure->id) }}" class="dropdown-item">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Modifier
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div> <!-- FIN RESPONSIVE -->

            </div>

        </div>
    </div>
</div>

@endif  {{-- ✅ fermeture du if --}}

@endsection
