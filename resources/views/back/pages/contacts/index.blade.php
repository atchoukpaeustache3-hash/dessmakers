@extends('back.layouts.master')
@section('title', 'Liste des contact')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>

                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0 datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Date d'envoie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-success">
                                                {{ $contact->email}}
                                            </span>
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y')}}
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- Détails -->
                                                <a  up-target=".main" href="{{ route('contacts.show', $contact) }}" class="text-primary" data-bs-toggle="tooltip" title="Détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Bouton Supprimer -->
                                                   <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?');" up-target=".main">
                                                       @csrf
                                                       @method('DELETE')
                                                       <button type="submit" class="btn btn-link p-0 m-0 text-danger d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" title="Supprimer">
                                                           <i class="fas fa-trash-alt"></i>
                                                       </button>
                                                   </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>





@endsection
