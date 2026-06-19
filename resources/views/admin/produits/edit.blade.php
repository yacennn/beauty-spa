@extends('admin.layout')

@section('content')
<h1 class="h3 mb-4">Modifier le produit</h1>

<form action="{{ route('admin.produits.update', $produit) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm" style="max-width:640px">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nom du produit</label>
        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $produit->nom) }}">
        @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Prix ($)</label>
            <input type="number" step="0.01" name="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix', $produit->prix) }}">
            @error('prix') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col mb-3">
            <label class="form-label">Ancien prix ($)</label>
            <input type="number" step="0.01" name="ancien_prix" class="form-control @error('ancien_prix') is-invalid @enderror" value="{{ old('ancien_prix', $produit->ancien_prix) }}">
            @error('ancien_prix') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Image du produit</label>
        @if($produit->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $produit->image) }}" width="90" class="rounded border">
                <small class="text-muted d-block">Image actuelle — choisir un fichier pour la remplacer.</small>
            </div>
        @endif
        <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-spa">Mettre à jour</button>
    <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
