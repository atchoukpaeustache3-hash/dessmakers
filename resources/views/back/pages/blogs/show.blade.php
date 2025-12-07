

@extends('back.layouts.master')
@section('title', "Détails de la promotion")
@section('content')

    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">
                     <div class="d-flex">
                        <div class="flex-shrink-0 me-4">
                            <img src="{{ asset( $article->thumbnail)  }}" alt="" height="50">
                        </div>

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15">{{  $article->title }} </h5>
                        </div>
                    </div>

                    <div class="text-muted mt-3">
                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Résumé :
                            <strong>{{ $article->summary }}</strong>
                        </p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Contenu :
                            <strong>{{ $article->content }}</strong>
                        </p>

                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                            Publié :
                            @if ($article->is_published)
                                <span class="badge bg-success">Oui</span>
                            @else
                                <span class="badge bg-danger">Non</span>
                            @endif
                        </p>



                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                           Date d'ajout :
                            <strong>{{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}}</strong>
                        </p>

                         <p><i class="mdi mdi-chevron-right text-primary me-1"></i>
                           Date de publication :
                            <strong>{{ \Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</strong>
                        </p>

                    </div>

                    <div class="text-end">
                        <a  up-target=".main" href="{{ route('articles.index') }}" class="btn btn-secondary mb-3">
                            <i class="mdi mdi-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

