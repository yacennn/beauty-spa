@extends('layouts.site')

@section('title', 'Connexion — Beauty Spa')

@section('content')
<div class="section-head">
    <div class="eyebrow">Espace administrateur</div>
    <h1><strong>Connexion</strong></h1>
    <p>Connectez-vous pour accéder au dashboard d'administration.</p>
</div>

<div class="contact-wrap" style="grid-template-columns: 1fr; max-width: 520px; margin: 0 auto 70px; background-color: #E2F0D9 !important; padding: 30px; border-radius: 30px;">
    <form class="contact-form" action="{{ route('login.post') }}" method="POST">
        @csrf

        <div style="margin-bottom:18px">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom:18px">
            <input type="password" name="password" placeholder="Mot de passe">
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <label style="font-size:13px; display:block; margin: 0 0 6px 16px;">
            <input type="checkbox" name="remember" style="width:auto"> Se souvenir de moi
        </label>

        <div class="send">
            <button type="submit" class="btn" style="background-color: #4E8775 !important; border-color: #4E8775 !important; color: white !important;">Se connecter</button>
        </div>
    </form>
</div>
@endsection