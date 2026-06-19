@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Gestion des Produits</h1>
    <a href="{{ route('admin.produits.create') }}" class="btn btn-spa">+ Nouveau produit</a>
</div>

<table class="table table-hover bg-white shadow-sm rounded">
    <thead class="table-light">
        <tr>
            <th>Image</th>
            <th>Nom du produit</th>
            <th>Prix</th>
            <th>Ancien prix</th>
            <th style="width:180px">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($produits as $produit)
        <tr>
            <td>
                @if($produit->image)
                    <img src="{{ asset('storage/' . $produit->image) }}" width="55" height="55" class="rounded object-fit-cover">
                @else
                    <span class="text-muted">—</span>
                @endif
            </td>
            <td>{{ $produit->nom }}</td>
            <td>${{ number_format($produit->prix, 2) }}</td>
            <td>
                @if($produit->ancien_prix)
                    <s class="text-muted">${{ number_format($produit->ancien_prix, 2) }}</s>
                @else
                    —
                @endif
            </td>
            <td>
                <a href="{{ route('admin.produits.edit', $produit) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('admin.produits.destroy', $produit) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted py-4">Aucun produit enregistré.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $produits->links() }}
@endsection
