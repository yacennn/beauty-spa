@extends('admin.layout')

@section('content')
<h1 class="h3 mb-4">Nouvel article</h1>

<form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm" style="max-width:720px">
    @csrf

    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}">
        @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Date de publication</label>
            <input type="date" name="date_publication" class="form-control @error('date_publication') is-invalid @enderror" value="{{ old('date_publication') }}">
            @error('date_publication') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col mb-3">
            <label class="form-label">Auteur</label>
            <input type="text" name="auteur" class="form-control @error('auteur') is-invalid @enderror" value="{{ old('auteur') }}">
            @error('auteur') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="6" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Image associée</label>
        <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-spa">Publier</button>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
