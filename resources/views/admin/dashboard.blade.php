@extends('admin.layout')

@section('content')
<h1 class="h3 mb-4">TableaU</h1>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small">Produits</div>
                    <div class="display-6 fw-bold" style="color:#4e8775">{{ $stats['produits'] }}</div>
                </div>
                <div style="font-size:42px"></div>
            </div>
            <a href="{{ route('admin.produits.index') }}" class="card-footer text-decoration-none small" style="color:#4e8775">
                les produits >>
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small">Articles du blog</div>
                    <div class="display-6 fw-bold" style="color:#4e8775">{{ $stats['articles'] }}</div>
                </div>
                <div style="font-size:42px"></div>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="card-footer text-decoration-none small" style="color:#4e8775">
                le blog >>
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small">Messages</div>
                    <div class="display-6 fw-bold" style="color:#4e8775">{{ $stats['messages'] }}</div>
                </div>
                
            </div>
            <a href="{{ route('admin.messages.index') }}" class="card-footer text-decoration-none small" style="color:#4e8775">
                les messages >>
            </a>
        </div>
    </div>
</div>

<div class="mb-4">
    <a href="{{ route('admin.produits.create') }}" class="btn me-2" style="background-color: #4e8775; color: white; border-radius: 999px; padding: 9px 30px; font-size: 14px; text-decoration: none;">+ Ajouter un produit</a>
    <a href="{{ route('admin.articles.create') }}" class="btn" style="background-color: #4e8775; color: white; border-radius: 999px; padding: 9px 30px; font-size: 14px; text-decoration: none;">+ Publier un article</a>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold">Derniers messages</div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr><th>De</th><th>Sujet</th><th>Reçu le</th><th></th></tr>
                    </thead>
                    <tbody>
                        @forelse($derniersMessages as $message)
                        <tr>
                            <td>{{ $message->prenom }} {{ $message->nom }}</td>
                            <td>{{ Str::limit($message->sujet, 30) }}</td>
                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td><a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-secondary">Voir</a></td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">Aucun message pour le moment</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold">Derniers produits ajoutes</div>
            <ul class="list-group list-group-flush">
                @forelse($derniersProduits as $produit)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        @if($produit->image)
                            <img src="{{ asset('storage/' . $produit->image) }}" width="38" height="38" class="rounded object-fit-cover">
                        @endif
                        {{ $produit->nom }}
                    </div>
                    <span class="badge rounded-pill" style="background:#4e8775; color: white; padding: 6px 12px;">${{ number_format($produit->prix, 2) }}</span>
                </li>
                @empty
                <li class="list-group-item text-center text-muted py-4">Aucun produit pour le moment.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection