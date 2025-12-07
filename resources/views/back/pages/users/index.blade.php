@extends('back.layouts.master')
@section('title', 'liste des  utilisateurs')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">Liste des utilisateurs</h4>
                        <a  up-target=".main" href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table  class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                            <tr>
                                <th>Nom & Prénom(s)</th>
                                <th>Adresse email</th>
                                <th>Téléphone</th>
                                <th>Rôle</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>


                                @foreach($users as $user)

                                    @if (Auth::user()->id != $user->id)

                                    @if (!$user->roles->contains('name', 'dev'))
                                            <tr>

                                                <td>{{ $user->firstname.' '.$user->lastname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                        <span class="badge bg-primary">{{ $user->roles->last()->role }}</span>
                                                </td>
                                                <td>
                                                    <span class="{{ $user->is_active  ? 'badge bg-success' : 'badge bg-danger' }} ">
                                                        {{ $user->is_active  ? 'Actif' : 'Inactif' }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="text-sm-end d-flex gap-2">

                                                        <!-- Bouton Modifier -->
                                                        <a href="#"  class="text-warning d-inline-flex align-items-center gap-1"  data-bs-placement="right"  title="Modifier" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$user->id}}">
                                                            <i class="fas fa-pen-square"></i>
                                                        </a>

                                                        <!-- Bouton Détails -->
                                                        <a   href="{{route('users.show',$user)}}" class=" text-primary d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Détails">
                                                            <i class="fas fa-eye"></i>
                                                        </a>




                                                        @if ($user->is_active)
                                                            <!-- Bouton pour désactiver le compte -->
                                                            <a up-target=".main" href="{{ route('users.updateStatus', $user->id) }}" class="text-secondary d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Désactivé" onclick="return confirm('Voulez-vous vraiment désactiver cet utilisateur ?');">
                                                                <i class="fas fa-toggle-off"></i>
                                                            </a>
                                                        @else
                                                            <!-- Bouton pour activer le compte -->
                                                            <a up-target=".main" href="{{ route('users.updateStatus', $user->id) }}" class="text-success d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" data-bs-placement="right"  title="Activé" onclick="return confirm('Voulez-vous vraiment activer cet utilisateur ?');">
                                                                <i class="fas fa-toggle-on"></i>
                                                            </a>
                                                        @endif



                                                    </div>
                                                </td>

                                            </tr>

                                        @endif


                                    @endif


                                    <div class="modal fade" id="staticBackdrop{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ route('users.update',$user) }} ">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel{{ $user->id }}">Modifier un utilisateur</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="mb-3">
                                                                    <label>Prénom</label>
                                                                    <input name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname',$user->firstname) }}" placeholder="Prénom">
                                                                    @error('firstname')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label>Email</label>
                                                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$user->email) }}" placeholder="Adresse e-mail">
                                                                    @error('email')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="mb-3">
                                                                    <label>Nom</label>
                                                                    <input name="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname',$user->lastname) }}" placeholder="Nom">
                                                                    @error('lastname')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label>Téléphone</label>
                                                                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$user->phone) }}" placeholder="Numéro de téléphone">
                                                                    @error('phone')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
