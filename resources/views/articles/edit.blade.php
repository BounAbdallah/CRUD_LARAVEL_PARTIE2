
    

  
<div class="card mt-5">
  <h2 class="card-header">Modifier l'article</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('articles.index') }}"><i class="fa fa-arrow-left"></i> Retour</a>
    </div>
  
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $article->id }}">

        <div class="mb-3">
            <label for="inputNom" class="form-label"><strong>Nom:</strong></label>
            <input 
                type="text" 
                name="nom" 
                value="{{ old('nom', $article->nom) }}"
                class="form-control @error('nom') is-invalid @enderror" 
                id="inputNom" 
                placeholder="Nom">
            @error('nom')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDescription" class="form-label"><strong>Detail:</strong></label>
            <textarea 
                class="form-control @error('description') is-invalid @enderror" 
                style="height:150px" 
                name="description" 
                id="inputDescription" 
                placeholder="Detail">{{ old('description', $article->description) }}</textarea>
            @error('description')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="inputImage_url" class="form-label"><strong>Url de l'image:</strong></label>
            <textarea 
                class="form-control @error('image_url') is-invalid @enderror" 
                style="height:150px" 
                name="image_url" 
                id="inputImage_url" 
                placeholder="Url de l'image">{{ old('image_url', $article->image_url) }}</textarea>
            @error('image_url')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="featured" name="featured" {{ $article->featured ? 'checked' : '' }}>
            <label class="form-check-label" for="featured">À la une</label>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Mettre à jour</button>
    </form>
  
  </div>
</div>
