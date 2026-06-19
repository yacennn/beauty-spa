@extends('admin.layout')

@section('content')
<h1 class="h3 mb-3">Messages de Contact</h1>

<table class="table table-hover bg-white shadow-sm rounded">
    <thead class="table-light">
        <tr>
            <th>Nom complet</th>
            <th>Email</th>
            <th>Service</th>
            <th>Sujet</th>
            <th>Reçu le</th>
            <th style="width:160px">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($messages as $message)
        <tr>
            <td>{{ $message->prenom }} {{ $message->nom }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->service }}</td>
            <td>{{ $message->sujet }}</td>
            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
            <td>
                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-info btn-sm text-white">Voir</a>
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce message ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center text-muted py-4">Aucun message reçu.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $messages->links() }}
@endsection
