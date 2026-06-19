@extends('admin.layout')

@section('content')
<h1 class="h3 mb-4">Ajouter un produit</h1>

<form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm" style="max-width:640px">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nom du produit</label>
        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
        @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Prix ($)</label>
            <input type="number" step="0.01" name="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix') }}">
            @error('prix') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col mb-3">
            <label class="form-label">Ancien prix ($) <small class="text-muted">(optionnel)</small></label>
            <input type="number" step="0.01" name="ancien_prix" class="form-control @error('ancien_prix') is-invalid @enderror" value="{{ old('ancien_prix') }}">
            @error('ancien_prix') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Image du produit</label>
        <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-spa">Enregistrer</button>
    <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
