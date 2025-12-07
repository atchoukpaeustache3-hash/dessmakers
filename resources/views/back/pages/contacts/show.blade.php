

@extends('back.layouts.master')
@section('title', "Détails d'un contact")
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-truncate font-size-15">{{ $contact->name }}</h5>
                    <p class="text-muted mb-0">Date d'envoie: <strong>{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y')}}</strong></p>

                    <h5 class="font-size-15 mt-4">@yield('title') :</h5>

                    <div class="text-muted mt-3">
                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Email :
                            {{ $contact->email}}
                        </p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"> </i>
                            Message :
                           <strong>
                                {{ $contact->message}}
                            </strong>
                        </p>

                    </div>

                    <div class="text-end">
                        <a  up-target=".main" href="{{ route('contacts.index') }}" class="btn btn-secondary mb-3">
                            <i class="mdi mdi-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

