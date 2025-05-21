<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    
    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- iziToast CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">

    <title>@yield('title')</title>
    @include('back.partials.styles')
</head>

<body>
<div class="main-wrapper">
    @include('back.partials.header')
    @include('back.partials.sidebar')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                @yield('dashboard-header')
            </div>
            @yield('dashboard-content')
        </div>
    </div>
</div>

@include('back.partials.scripts')

<!-- iziToast JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

<!-- Tagify JS -->

<!-- Affichage des notifications si présentes -->
@if(session()->get('error'))
    <script>
        iziToast.error({
            title: "Erreur",
            position: 'topRight',
            timeout: 5000,
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif
@if(session()->get('success'))
    <script>
        iziToast.success({
            title: "Succès",
            position: 'topRight',
            timeout: 5000,
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

<!-- Bootstrap JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0vjX1gu6g23pAOt30ZV6r1RGhMhzXY9/J6ftVJFxF07eERHG" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
