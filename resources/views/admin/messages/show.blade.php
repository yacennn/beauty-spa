@extends('admin.layout')

@section('content')
<h1 class="h3 mb-4">Detail du message</h1>

<div class="bg-white p-4 rounded shadow-sm" style="max-width:720px">
    <dl class="row mb-0">
        <dt class="col-sm-3">Prenom</dt>      <dd class="col-sm-9">{{ $message->prenom }}</dd>
        <dt class="col-sm-3">Nom</dt>         <dd class="col-sm-9">{{ $message->nom }}</dd>
        <dt class="col-sm-3">Telephone</dt>   <dd class="col-sm-9">{{ $message->telephone }}</dd>
        <dt class="col-sm-3">Email</dt>       <dd class="col-sm-9">{{ $message->email }}</dd>
        <dt class="col-sm-3">Service</dt>     <dd class="col-sm-9">{{ $message->service }}</dd>
        <dt class="col-sm-3">Sujet</dt>       <dd class="col-sm-9">{{ $message->sujet }}</dd>
        <dt class="col-sm-3">Message</dt>     <dd class="col-sm-9">{{ $message->message }}</dd>
        <dt class="col-sm-3">Recu le</dt>     <dd class="col-sm-9">{{ $message->created_at->format('d/m/Y à H:i') }}</dd>
    </dl>

    <hr>

    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Supprimer ce message ?')">Supprimer</button>
    </form>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
