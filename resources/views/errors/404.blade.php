{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Page d'erreur</title>
@include('back.partials.styles')
</head>

<body class="error-page">

<div class="main-wrapper">
    <div class="error-box">
            <h1>404</h1>
            <h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i> Oops! La page n'existe pas pour le cei!</h3>
            <a href="/dashboard" class="btn btn-primary">Retounez a la page d'accueil</a>
    </div>
</div>

@include('back.partials.scripts')>
</body>
</html>
@section('message', __($exception->getMessage() ?: 'Forbidden'))
