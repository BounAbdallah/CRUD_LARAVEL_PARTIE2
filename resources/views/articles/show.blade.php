@extends('articles.layout')
  
@section('content')

<div class="container mt-5">
  <div class="card">
    <h2 class="card-header">Détails de l'article</h2>
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{ route('articles.index') }}"><i class="fa fa-arrow-left"></i> Retour</a>
      </div>
  
      <div class="row mt-3">
          <div class="col-md-12">
              <div class="form-group">
                  <h3 class="card-title"><strong>{{ $article->nom }}</strong></h3>
              </div>
          </div>
          <div class="col-md-12 mt-2">
              <div class="form-group">
                  <p class="card-text">{{ $article->description }}</p>
              </div>
          </div>
          <div class="col-md-12 mt-2">
              <div class="form-group text-center">
                  <img src="{{ $article->image_url }}" alt="Image de {{ $article->nom }}" class="img-fluid rounded">
              </div>
          </div>
          <div class="col-md-12 mt-2">
              <div class="form-group">
                  <strong>À la une:</strong> {{ $article->featured ? 'Oui' : 'Non' }}
              </div>
          </div>
          <div class="col-md-12 mt-2">
              <div class="form-group">
                  <p class="text-muted">Publié le {{ $article->created_at->format('d M Y') }} par {{ $article->author }}</p>
              </div>
          </div>
      </div>
  
    </div>
  </div>

  <!-- Section des commentaires -->
  <div class="comments mt-5">
      <h2>Commentaires</h2>

      <!-- Formulaire de nouveau commentaire -->
      <div class="card my-4">
          <h5 class="card-header">Laisser un commentaire:</h5>
          <div class="card-body">
              <form action="{{ route('comments.store', $article->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Votre nom">
                      @error('name')
                          <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="form-group mt-2">
                      <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="3" placeholder="Votre commentaire..."></textarea>
                      @error('content')
                          <div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Poster</button>
              </form>
          </div>
      </div>

      <!-- Affichage des commentaires -->
      @foreach($article->comments as $comment)
      <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="https://via.placeholder.com/50" alt="Avatar">
          <div class="media-body">
              <h5 class="mt-0">{{ $comment->name }}</h5>
              {{ $comment->content }}
          </div>
      </div>
      @endforeach
  </div>
</div>

@endsection
