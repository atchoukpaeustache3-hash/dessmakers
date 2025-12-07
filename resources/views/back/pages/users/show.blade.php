@extends('back.layouts.master')
@section('title', 'Détails')
@section('content')

    <div class="row">

        <div class="col-xl-4">

            <div class="card overflow-hidden">

                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Profil de {{ $user->firstname . ' ' . $user->lastname }}</h5>
                                <p>Informations personnelles</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>

                {{-- <div class="card-body pt-0">
                    <div class="d-flex align-items-center flex-wrap gap-4">

                        <div class="d-flex align-items-center">
                            <div class="avatar-md me-3">
                                <img src="{{ asset($user->avatar ? $user->avatar : 'storage/back/assets/images/users/user-default.jpg') }}"
                                    class="img-thumbnail rounded-circle"
                                    style="width: 80px; height: 80px; object-fit: cover;" />
                            </div>
                            <div>
                                <h5 class="font-size-15 mb-1">{{ $user->firstname }} {{ $user->lastname }}</h5>
                                <p class="text-muted mb-0">{{ $user->roles->first()->role ?? 'Aucun rôle' }}</p>
                            </div>
                        </div>


                        <div class="ms-auto">
                            <div class="row text-center text-md-start">
                                <div class="col">
                                    <h5 class="font-size-15">{{ number_format($user->balance, 0, ',', ' ') }} Fcfa</h5>
                                    <p class="text-muted mb-0">Solde </p>
                                </div>
                                <div class="col">
                                    <h5 class="font-size-15">{{ number_format($depot, 0, ',', '') }} Fcfa</h5>
                                    <p class="text-muted mb-0">Dépôts effectués.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ asset($user->avatar ? $user->avatar : 'storage/back/assets/images/users/user-default.jpg') }}"
                                    alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ $user->firstname }} {{ $user->lastname }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ $user->roles->first()->role ?? 'Aucun rôle' }}</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">{{ number_format($user->balance, 0, ',', ' ') }} Fcfa</h5>
                                        <p class="text-muted mb-0">Solde</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">{{ number_format($depot, 0, ',', '') }} Fcfa</h5>
                                        <p class="text-muted mb-0">Dépôts</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sommes des commissions et récompensens( non utilisé)</h4>

                    {{-- <p class="text-muted mb-4">Hi I'm Cynthia Price,has been the industry's standard
                        dummy text To an English person, it will seem like simplified English, as a
                        skeptical Cambridge.</p> --}}
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Commission Fcfa</th>
                                    <td>{{ $user->comissions->where('unite', 'Fcfa')->sum('value') }} Fcfa</td>
                                </tr>
                                <tr>
                                    <th scope="row">Récompenses Fcfa</th>
                                    <td>{{ $user->rewards->where('status', 'assigned')->where('unite', 'Fcfa')->sum('value') }}
                                        Fcfa</td>
                                </tr>
                                <tr>
                                    <th scope="row">Récompenses Mo</th>
                                    <td>{{ $user->rewards->where('status', 'assigned')->where('unite', 'Mo')->sum('value') }}
                                        Mo</td>
                                </tr>
                                <tr>
                                    <th scope="row">Récompenses Go</th>
                                    <td>{{ $user->rewards->where('status', 'assigned')->where('unite', 'Go')->sum('value') }}
                                        Go</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->


        </div>

        <div class="col-xl-8">

            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">Achats</p>
                                    <h4 class="mb-0">{{ $achat }} Fcfa</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-cart font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">Transferts</p>
                                    <h4 class="mb-0">{{ number_format($transfert, 0, ',', ' ') }} Fcfa</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-transfer-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">Retraires</p>
                                    <h4 class="mb-0">{{ number_format($retraire, 0, ',', '') }} Fcfa</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-wallet-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                {{-- <div class="card-body">
                    <h4 class="card-title mb-4">Revenue</h4>
                    <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                </div> --}}
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Informations personnelles</h4>

                    <p class="text-muted mb-4">
                        Bonjour, je suis {{ $user->firstname }} {{ $user->lastname }}. Voici mes informations personnelles
                        enregistrées.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Nom complet :</th>
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Téléphone :</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email :</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Solde :</th>
                                    <td>{{ number_format($user->balance, 0, ',', ' ') }} FCFA</td>
                                </tr>
                                <tr>
                                    <th scope="row">Code de parrainage :</th>
                                    <td>{{ $user->referral_code ?? 'N/A' }}</td>
                                </tr>

                                @if ($reffer)
                                    <tr>
                                        <th scope="row">Parrain</th>
                                        <td>{{ $reffer->firstname . ' ' . $reffer->lastname ?? 'N/A' }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th scope="row">Statut :</th>
                                    <td>
                                        @if ($user->is_active)
                                            <span class="badge bg-success">Actif</span>
                                        @else
                                            <span class="badge bg-danger">Inactif</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        

    </div>

@endsection
