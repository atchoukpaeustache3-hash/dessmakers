@extends('back.layouts.master')
@section('title', 'Ajouter un client')
@section('content')

 <div class="row">
                        <div class="col-xxl-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Form Grid</h4>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <p class="text-muted">More complex forms can be built using our grid classes. Use these for form layouts that require multiple columns, varied widths, and additional alignment options. <span class="fw-medium">Requires the <code>$enable-grid-classes</code> Sass variable to be enabled</span> (on by default).</p>
                                    <div class="live-preview">
                                       <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data" up-target=".main">
                                                     @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter your firstname" id="firstNameinput"name="name" :value="old('name')" required autofocus autocomplete="First name">
                                                     <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="lastNameinput" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter your lastname" id="lastNameinput"name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname">
                                                     <x-input-error :messages="$errors->get('lastname')" class="mt-2" />

                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="compnayNameinput" class="form-label">Adresse</label>
                                                        <input type="text" class="form-control" placeholder="Enter your adresse" id="compnayNameinput"name="adresse" :value="old('adresse')" required autofocus autocomplete="adresse">
                                                     <x-input-error :messages="$errors->get('adresse')" class="mt-2" />

                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                        <input type="tel" class="form-control" placeholder="+(245) 451 45123" id="phonenumberInput"name="phone" :value="old('phone')" required autofocus autocomplete="phone">
                                                     <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" placeholder="example@gamil.com" id="emailidInput" name="email" :value="old('email')" required autofocus autocomplete="email">
                                                     <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                     <div class="mb-3">
                                                <label for="EndleaveDate" class="form-label">Date d'arrivée</label>
                                                <input type="date" class="form-control" data-provider="flatpickr" id="EndleaveDate" name="date_venue" :value="old('date_venue')" required autofocus autocomplete="date_venue">
                                                     <x-input-error :messages="$errors->get('date_venue')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                     <div class="mb-3">
                                                <label for="EndleaveDate" class="form-label">End Leave Date</label>
                                                <input type="date" class="form-control" data-provider="flatpickr" id="EndleaveDate">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Sexe</label>
                                                        <select id="ForminputState" 
                                                                class="form-select" 
                                                                data-choices 
                                                                data-choices-sorting="true" 
                                                                name="sexe" 
                                                                required 
                                                                autocomplete="sexe">

                                                            <option value="">Choose sexe...</option>
                                                            <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>Femme</option>
                                                            <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>Homme</option>
                                                        </select>


                                                     <x-input-error :messages="$errors->get('sexe')" class="mt-2" />

                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div> <!-- end col -->

                       
</div>
@endsection