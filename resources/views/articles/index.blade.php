@extends('articles.layout')

@section('content')

<div class="container mt-5">
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mon Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('articles.index') }}">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- En-tête -->
    <header class="jumbotron text-center my-4">
        <h1 class="display-4">Bienvenue sur Mon Blog</h1>
        <p class="lead">Découvrez les dernières nouvelles et articles.</p>
    </header>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
        <a class="btn btn-success btn-sm" href="{{ route('articles.create') }}">
            <i class="fa fa-plus"></i> Enregistrer un article
        </a>
    </div>

    <div class="row">
        @forelse ($articles as $article)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $article->image_url }}" class="card-img-top" alt="Image de {{ $article->nom }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->nom }}</h5>
                        <p class="card-text">{{ Str::limit($article->description, 150) }}</p>
                        <p class="card-text"><small class="text-muted">{{ $article->featured ? 'À la une' : '' }}</small></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-info btn-sm" href="{{ route('articles.show', $article->id) }}">
                                <i class="fa-solid fa-list"></i> Voir
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ route('articles.edit', $article->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Mod
                            </a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i> Supp
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info" role="alert">
                Pas d'article pour le moment !
            </div>
        @endforelse
    </div>

    {{ $articles->links() }}
</div>

@endsection
