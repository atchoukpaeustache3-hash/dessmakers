@extends('back.layouts.master')
@section('title', 'Modifier un utilisateur')
@section('content')
<div class="row">
    <div class="col-lg-9 offset-lg-1">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center"> Formulaire de modification d'utilisateur</h4>
                <form class="outer-repeater"  method="post" action="{{ route('users.update', $user->email) }}">
                    @csrf
                    @method('put')
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">

                            <div class="form-group row mb-4">
                                <label class="col-form-label col-lg-2">Email</label>
                                <div class="col-lg-10">
                                    <input id="email" name="email" value="{{ old('email',$user->email) }} "type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrer votre email...">
                                </div>
                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-lg-2">Rôle utilisateur</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="role" id="role">
                                        <option value="">Sélectionner un rôle</option>
                                        @forelse ($roles as $role)
                                        @if ($role->name !== 'dev')
                                            <option value="{{ $role->name }}" {{ old('role', $user->roles->first()->name) == $role->name ? 'selected' : '' }}>
                                                {{ $role->role }}
                                            </option>
                                        @endif    
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Modifier </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

