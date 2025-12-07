@extends('back.layouts.master')
@section('title', 'Assigner Rôle')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>
                        <a up-target=".main" href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table  class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                            <tr>
                                <th>Nom et Prénom(s)</th>
                                <th>Rôle</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>


                                @foreach($users as $user)


                                    @if (!$user->roles->contains('name', 'dev'))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($user->avatar)
                                                        <img src="{{ asset($user->avatar) }}" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
                                                    @endif
                                                    <span>{{ $user->firstname . ' ' . $user->lastname }}</span>
                                                </div>
                                            </td>

                                            <td>
                                            @foreach($user->roles as $role)
                                                    <span class="badge bg-primary">{{ $role->role }}</span>
                                                @endforeach
                                            </td>

                                            <td>


                                                <div class="text-sm-end d-flex gap-2">

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary">Assigner Role</button>
                                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @foreach ($roles as $role)
                                                                @if (!$user->roles->contains('id', $role->id))
                                                                        <form  action="{{ route('users.assignRole', $user->id) }}" method="POST" style="display: inline;">
                                                                            @csrf
                                                                            <input type="hidden" name="role_id" value="{{ $role->id }}">
                                                                            <a href="javascript:void(0)"
                                                                            class="dropdown-item"
                                                                            onclick="this.closest('form').submit();">
                                                                                {{ $role->role }}
                                                                            </a>
                                                                        </form>

                                                                @endif
                                                            @endforeach

                                                        </div>
                                                </div>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary">Retirer Role</button>
                                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @foreach ($user->roles as $role)  {{-- ici on boucle sur les rôles de l'utilisateur --}}
                                                                <form  action="{{ route('users.removeRole', $user->id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                                                                    <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Voulez-vous vraiment retirer ce rôle ?')"
                                                                            {{ $user->roles->count() <= 1 ? 'disabled' : '' }}>
                                                                            {{ $role->role }}
                                                                        </button>
                                                                </form>
                                                            @endforeach
                                                        </div>
                                                    </div>


                                                </div>


                                            </td>

                                        </tr>

                                    @endif



                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
