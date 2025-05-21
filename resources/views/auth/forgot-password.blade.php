@extends('auth.auth-layout')
@section('title', 'Page de réinitialisation du mot de passe')
@section('auth-form')



<h1>Mot de passe oublié ?</h1>
<p class="account-subtitle">Entrez votre email pour obtenir le lien de réinitialisation</p>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-group">
        <input name="email" class="form-control" type="email" placeholder="Email" value="{{ old('email') }}"  required autocomplete="email" autofocus>
        @error('email')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" type="submit">
            Recevoir le lien
        </button>
    </div>
</form>

<div class="text-center dont-have">
    Vous vous souvenez de votre mot de passe ? 
    <a href="{{ route('login') }}">Se connecter</a>
</div>

<div class="text-center dont-have">
    <a href="{{ route('register') }}">S'inscrire</a>
</div>

@endsection