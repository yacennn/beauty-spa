@extends('admin.layout')

@section('content')
<h1 class="h3 mb-4">Modifier l'article</h1>

<form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm" style="max-width:720px">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre', $article->titre) }}">
        @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Date de publication</label>
            <input type="date" name="date_publication" class="form-control @error('date_publication') is-invalid @enderror"
                   value="{{ old('date_publication', $article->date_publication->format('Y-m-d')) }}">
            @error('date_publication') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col mb-3">
            <label class="form-label">Auteur</label>
            <input type="text" name="auteur" class="form-control @error('auteur') is-invalid @enderror" value="{{ old('auteur', $article->auteur) }}">
            @error('auteur') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="6" class="form-control @error('description') is-invalid @enderror">{{ old('description', $article->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Image associée</label>
        @if($article->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $article->image) }}" width="120" class="rounded border">
                <small class="text-muted d-block">Image actuelle — choisir un fichier pour la remplacer.</small>
            </div>
        @endif
        <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-spa">Mettre à jour</button>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
