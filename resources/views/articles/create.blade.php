@extends('articles.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Ajout d'article</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
        <a class="btn btn-primary btn-sm" href="{{ route('articles.index') }}"><i class="fa fa-arrow-left"></i> Retour</a>
    </div>

    <!-- Image en-tête -->
    <!-- <div class="text-center mb-4">
        <img src="#" alt="Image de l'article" class="img-fluid">
    </div> -->
  
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
  
        <div class="mb-3">
            <label for="inputNom" class="form-label"><strong>Nom:</strong></label>
            <input 
                type="text" 
                name="nom" 
                class="form-control @error('nom') is-invalid @enderror" 
                id="inputNom" 
                placeholder="Nom">
            @error('nom')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDescription" class="form-label"><strong>Description:</strong></label>
            <textarea 
                class="form-control @error('description') is-invalid @enderror" 
                style="height:150px" 
                name="description" 
                id="inputDescription" 
                placeholder="Description"></textarea>
            @error('description')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="inputImage_url" class="form-label"><strong>URL de l'image:</strong></label>
            <input 
                type="url" 
                class="form-control @error('image_url') is-invalid @enderror" 
                name="image_url" 
                id="inputImage_url" 
                placeholder="URL de l'image">
            @error('image_url')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3 form-check">
            <input 
                type="checkbox" 
                class="form-check-input" 
                name="featured" 
                id="inputFeatured">
            <label for="inputFeatured" class="form-check-label">À la une</label>
        </div>
        
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
    </form>
  
  </div>
</div>
@endsection
