@extends('auth.auth-layout')
@section('title', 'Page d\'inscription')

@section('auth-form')
<h1 class="mb-3">S'inscrire</h1>

<form action="{{ route('register') }}" method="POST">
    @csrf
    
    <div class="form-group">
        <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Nom"> 
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email"> 
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Mot de passe"> 
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirmer Mot de passe"> 
        @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" type="submit">S'inscrire</button>
    </div>
</form>

<div class="text-center dont-have">
    Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
</div>
@endsection
