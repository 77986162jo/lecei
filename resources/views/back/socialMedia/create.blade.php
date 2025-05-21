@extends('back.app')

@section('title', isset($socialMedia) ? 'Modifier un réseau social' : 'Ajouter un réseau social')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">
            {{ isset($socialMedia) ? 'Modifier' : 'Ajouter' }} un réseau social
        </h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <form 
            action="{{ isset($socialMedia) ? route('socialMedia.update', $socialMedia) : route('socialMedia.store') }}" 
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @if (isset($socialMedia))
                @method('PUT')
            @endif

            {{-- Affichage des erreurs --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulaire --}}
            <div class="row formtype">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nom du réseau</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name', $socialMedia->name ?? '') }}" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Lien</label>
                        <input class="form-control" type="text" name="lien" value="{{ old('lien', $socialMedia->lien ?? '') }}" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Icône ex: fab fa-facebook</label>
                        <input class="form-control" type="text" name="icon" value="{{ old('icon', $socialMedia->icon ?? '') }}" />
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary buttonedit1">
                Enregistrer
            </button>
        </form>
    </div>
</div>
@endsection

