@extends('back.layouts.master')
@section('title', 'Modifier une actualité')
@section('content')

    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">@yield('title')</h4>
                <p class="card-title-desc">Modifiez les informations ci-dessous</p>

                    <form method="POST" action="{{ route('articles.update',$article) }}" enctype="multipart/form-data" up-target=".main">
                        @csrf

                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title">Titre de l’article</label>
                                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$article->title) }}" placeholder="Ex : Comment rester connecté sans 4G">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-sm-6">
                                 <div class="mb-3">
                                    <label for="summary">Résumé</label>
                                    <input name="summary" type="text" class="form-control @error('summary') is-invalid @enderror" value="{{ old('summary',$article->summary) }}" placeholder="Court résumé de l’article (optionnel)">
                                    @error('summary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="thumbnail">Image</label>
                                    <input name="thumbnail" type="file" class="form-control @error('thumbnail') is-invalid @enderror">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="content">Contenu</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="6" placeholder="Rédigez le contenu de l’article ici...">{{ old('content',$article->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="is_published" class="form-label">Publier maintenant ?</label>
                                    <div class="form-check form-switch">
                                        <input name="is_published" type="checkbox" class="form-check-input" id="is_published" value="1" {{ old('is_published',$article->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_published">Oui</label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>

@endsection

