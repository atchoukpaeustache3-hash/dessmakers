@extends('back.layouts.master')
@section('title', 'Liste des promotions')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>
                         <a  up-target=".main" href="{{ route('articles.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0 datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Titre</th>
                                    {{-- <th>Résumé</th> --}}
                                    <th>Publié</th>
                                    <th>Date d'ajout</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($article->thumbnail)
                                                    <img src="{{ asset( $article->thumbnail) }}" alt="{{ $article->title }}" class="rounded-circle me-2" width="40" height="40">
                                                @endif
                                                <span>{{ $article->title }}</span>
                                            </div>
                                        </td>

                                        {{-- <td>
                                            {{ $article->summary }}
                                        </td> --}}

                                        <td>
                                            <span class="{{ $article->is_published ? 'badge badge-pill badge-soft-success' : 'badge badge-pill badge-soft-danger' }}">
                                                {{ $article->is_published ? 'Oui' : 'Non' }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- Détails -->
                                                <a  up-target=".main" href="{{ route('articles.show', $article) }}" class="text-primary" data-bs-toggle="tooltip" title="Détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Bouton Modifier -->
                                                <a  up-target=".main" href="{{ route('articles.edit', $article) }}" class="text-warning d-inline-flex align-items-center gap-1" data-bs-toggle="tooltip" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Bouton Supprimer -->
                                                <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette article ?');" up-target=".main">
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
