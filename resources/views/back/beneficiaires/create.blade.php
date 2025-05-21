@extends('back.app')

@section('title', isset($beneficiaire) ? 'Modifier un bénéficiaire' : 'Ajouter un bénéficiaire')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">
            @if(isset($beneficiaire)) Modifier @else Ajouter @endif un bénéficiaire
        </h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <form 
                    action="{{ isset($beneficiaire) ? route('beneficiaires.update', $beneficiaire) : route('beneficiaires.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if(isset($beneficiaire))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom', $beneficiaire->nom ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $beneficiaire->prenom ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" name="ville" class="form-control" value="{{ old('ville', $beneficiaire->ville ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $beneficiaire->adresse ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $beneficiaire->telephone ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $beneficiaire->email ?? '') }}" required>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="photo" class="form-label">Photo (optionnelle)</label>
                            <input type="file" name="photo" class="form-control">
                            @if(isset($beneficiaire) && $beneficiaire->photo)
                                <div class="mt-2">
                                    <p class="mb-1">Photo actuelle :</p>
                                    <img src="{{ asset('storage/' . $beneficiaire->photo) }}" alt="Photo" width="120" class="img-thumbnail">
                                </div>
                            @endif
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            @if(isset($beneficiaire)) Mettre à jour @else Enregistrer @endif
                        </button>
                        <a href="{{ route('beneficiaires.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
