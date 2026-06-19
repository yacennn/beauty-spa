@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Gestion du Blog</h1>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-spa">+ Nouvel article</a>
</div>

<table class="table table-hover bg-white shadow-sm rounded">
    <thead class="table-light">
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date de publication</th>
            <th style="width:180px">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($articles as $article)
        <tr>
            <td>
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" width="55" height="55" class="rounded object-fit-cover">
                @else
                    <span class="text-muted">—</span>
                @endif
            </td>
            <td>{{ $article->titre }}</td>
            <td>{{ $article->auteur }}</td>
            <td>{{ $article->date_publication->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted py-4">Aucun article publié.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $articles->links() }}
@endsection
