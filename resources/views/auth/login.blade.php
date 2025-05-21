@extends('auth.auth-layout')
@section('title', 'Page de connexion')

@section('auth-form')


<h1>Connexion</h1>
<p class="account-subtitle">Accéder au dashboard</p>

<form action="{{ route('login') }}" method="POST">
    @csrf

    <div class="form-group">
        <input name="email" class="form-control" type="email" placeholder="Email" value="{{old("email")}}"required>
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="form-group">
        <input name="password" class="form-control" type="password" placeholder="Mot de passe" required>
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">Se connecter</button>

    </div>
</form>

<div class="text-center forgotpass">
    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
</div>

<div class="text-center dont-have">
    Vous n'avez pas de compte ? <a href="{{ route('register') }}">S'inscrire</a>
</div>
<div class="text-center dont-have">
    <a href="{{ route('dashboard') }}">Retour à l'accueil</a>






@endsection