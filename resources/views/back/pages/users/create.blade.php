@extends('back.layouts.master')
@section('title', 'Ajouter un utilisateur')
@section('content')


         <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-body">

                       <h4 class="card-title">Ajouter un utilisateur</h4>
                       <p class="card-title-desc">Remplissez les informations ci-dessous</p>

                        <form up-target=".main" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>Prénom</label>
                                        <input name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" placeholder="Prénom">
                                        @error('firstname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Adresse e-mail">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>

                                <div class="col-sm-6">

                                     <div class="mb-3">
                                        <label>Nom</label>
                                        <input name="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" placeholder="Nom">
                                        @error('lastname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label>Téléphone</label>
                                        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Numéro de téléphone">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Rôle</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="">Sélectionner un rôle</option>
                                        @foreach ($roles as $role)
                                        
                                            <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                                {{ ucfirst($role->role) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                            </div>

                        </form>


                    </div>
                </div>


            </div>
        </div>

@endsection





